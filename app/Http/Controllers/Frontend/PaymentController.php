<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Repositories\PaymentRepository;

class PaymentController extends Controller
{
    protected $payment;

    public function __construct(PaymentRepository $payment)
    {
        $this->middleware('auth');
        $this->payment = $payment;
    }

    public function payment(PaymentRequest $request)
    {
        $data = $request;

        if ($request->paymentMethod == "cashon") {

            $this->payment->payment($request);

            $notification = array(
                'message' => 'Order process successfully done',
                'alert-type' => 'success'
            );

            return Redirect()->to('/')->with($notification);
        } elseif ($request->paymentMethod == "stripe") {

            return view('frontend.payment.stripe', compact('data'));
        } elseif ($request->paymentMethod == "bdpayment") {

            return view('frontend.exampleHosted', compact('data'));
        } else {
            $notification = array(
                'message' => 'Please select the appropriate payment method',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function stripe(PaymentRequest $request)
    {
        // Stripe payment
        $this->payment->stripe($request);

        $notification = array(
            'message' => 'Order process successfully done',
            'alert-type' => 'success'
        );

        return Redirect()->to('/')->with($notification);
    }
}
