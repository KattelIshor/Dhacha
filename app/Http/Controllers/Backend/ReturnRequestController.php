<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use App\Repositories\ReturnRequestRepository;

class ReturnRequestController extends Controller
{
    public $order;
    public $returnProduct;

    public function __construct(OrderRepository $order, ReturnRequestRepository $returnProduct)
    {
        $this->middleware('auth:admin');
        $this->returnProduct = $returnProduct;
        $this->order = $order;
    }

    public function returnRequest()
    {
        $orders = $this->returnProduct->returnRequest();
        return view('backend.return.request', compact('orders'));
    }

    public function returnRequestView($id)
    {
        $order = $this->order->order($id);
        $shipping = $this->order->shipping($id);
        $details = $this->order->details($id);

        return view('backend.return.request_view', compact('order', 'shipping', 'details'));
    }

    public function returnRequestAccept($id)
    {
        $this->returnProduct->returnRequestAccept($id);

        $notification = array(
            'message' => 'Product return request accepted',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.return.request')->with($notification);
    }

    public function returnAcceptAll()
    {
        $orders = $this->returnProduct->returnAcceptAll();
        return view('backend.return.request', compact('orders'));
    }

    public function returnRequestCancel($id)
    {
        $this->returnProduct->returnRequestCancel($id);

        $notification = array(
            'message' => 'Product return request cancel',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.return.request')->with($notification);
    }

    public function returnCancelAll()
    {
        $orders = $this->returnProduct->returnCancelAll();
        return view('backend.return.request', compact('orders'));
    }
}
