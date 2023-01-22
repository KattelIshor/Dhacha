<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\OrderDetails;
use App\Models\Setting;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SslCommerzPaymentController extends Controller
{
    public function index(Request $request)
    {
        $charge = Setting::select('shipping_charge', 'vat')->first();

        if (Session::has('coupon')) {
            $total = $charge->shipping_charge + $charge->vat + Session::get('coupon')['balance'];
        } else {
            $total = Cart::Subtotal() + $charge->shipping_charge + $charge->vat;
        }

        $post_data = array();
        $post_data['total_amount'] = $total; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = mt_rand(10000000, 99999999);

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = 'Customer Name';
        $post_data['cus_email'] = 'customer@mail.com';
        $post_data['cus_add1'] = 'Customer Address';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = '8801XXXXXXXXX';
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        if (Session::has('coupon')) {
            $update_product = DB::table('orders')
                ->where('transaction_id', $post_data['tran_id'])
                ->updateOrInsert([
                    'user_id' => Auth::id(),
                    'shipping' => $charge->shipping_charge,
                    'vat' => $charge->vat,
                    'payment_type' => $request->paymentMethod,
                    'amount' => $post_data['total_amount'],
                    'currency' => $post_data['currency'],
                    'status' => 'Pending',
                    'transaction_id' => $post_data['tran_id'],
                    'subtotal' => Session::get('coupon')['balance'],
                    'status_code' => uniqid(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        } else {
            $update_product = DB::table('orders')
                ->where('transaction_id', $post_data['tran_id'])
                ->updateOrInsert([
                    'user_id' => Auth::id(),
                    'shipping' => $charge->shipping_charge,
                    'vat' => $charge->vat,
                    'payment_type' => $request->paymentMethod,
                    'amount' => $post_data['total_amount'],
                    'currency' => $post_data['currency'],
                    'status' => 'Pending',
                    'transaction_id' => $post_data['tran_id'],
                    'subtotal' => Cart::Subtotal(),
                    'status_code' => uniqid(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
        }

        $order_id = DB::getPdo()->lastInsertId();

        // Insert Shipping Table
        $shipping = new Shipping();
        $shipping->order_id = $order_id;
        $shipping->ship_name = $request->name;
        $shipping->ship_phone = $request->phone;
        $shipping->ship_email = $request->email;
        $shipping->ship_address = $request->address;
        $shipping->ship_city = $request->city;
        $shipping->post_code = $request->post_code;

        $shipping->save();

        // Insert Order Details Table

        $content = Cart::content();
        $order_details = new OrderDetails();

        foreach ($content as $row) {
            $order_details->order_id = $order_id;
            $order_details->product_id = $row->id;
            $order_details->product_name = $row->name;
            $order_details->color = $row->options->color;
            $order_details->size = $row->options->size;
            $order_details->quantity = $row->qty;
            $order_details->singleprice = $row->price;
            $order_details->totalprice = ($row->qty * $row->price) + $charge->shipping_charge + $charge->vat;
            $order_details->save();
        }

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
    }

    public function success(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency);

            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Processing']);

                $notification = array(
                    'message' => 'Transaction is Successful, Transaction is successfully Completed',
                    'alert-type' => 'success',
                );

                return redirect()->to('/')->with($notification);
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = DB::table('orders')
                    ->where('transaction_id', $tran_id)
                    ->update(['status' => 'Failed']);

                $notification = array(
                    'message' => 'validation Fail',
                    'alert-type' => 'error',
                );

                return redirect()->to('/')->with($notification);
            }
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            $notification = array(
                'message' => 'Transaction is successfully Completed',
                'alert-type' => 'success',
            );

            return redirect()->to('/')->with($notification);
        } else {
            $notification = array(
                'message' => 'Invalid Transaction',
                'alert-type' => 'error',
            );

            return redirect()->to('/')->with($notification);
        }
    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);

            $notification = array(
                'message' => 'Transaction is Falied',
                'alert-type' => 'error',
            );

            return redirect()->to('/')->with($notification);
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {

            $notification = array(
                'message' => 'Transaction is already Successful',
                'alert-type' => 'error',
            );

            return redirect()->to('/')->with($notification);
        } else {

            $notification = array(
                'message' => 'Transaction is Invalid',
                'alert-type' => 'error',
            );

            return redirect()->to('/')->with($notification);
        }
    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            echo "Transaction is Cancel";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }
    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }
            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }
}
