<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $order;

    public function __construct(OrderRepository $order)
    {
        $this->middleware('auth:admin');
        $this->order = $order;
    }

    public function orderPandding()
    {
        $orders = $this->order->orderPandding();
        return view('backend.order.pandding', compact('orders'));
    }

    public function viewOrder($id)
    {
        $order = $this->order->order($id);
        $shipping = $this->order->shipping($id);
        $details = $this->order->details($id);

        return view('backend.order.view-order', compact('order', 'shipping', 'details'));
    }

    public function orderAccept(Request $request, $id)
    {
        $this->order->orderAccept($request, $id);

        $notification = array(
            'message' => 'Order Accepted',
            'alert-type' => 'success'
        );
        return Redirect()->route('orders.pandding')->with($notification);
    }

    public function acceptPayment()
    {
        $orders = $this->order->acceptPayment();
        return view('backend.order.pandding', compact('orders'));
    }

    public function proccessPayment($id)
    {
        $this->order->proccessPayment($id);

        $notification = array(
            'message' => 'Order Payment Proccess Done',
            'alert-type' => 'success'
        );
        return Redirect()->route('accept.payment')->with($notification);
    }

    public function proccessDelivery()
    {
        $orders = $this->order->proccessDelivery();
        return view('backend.order.pandding', compact('orders'));
    }

    public function deliveryDone($id)
    {
        $this->order->deliveryDone($id);

        $notification = array(
            'message' => 'Product Delevery Done',
            'alert-type' => 'success'
        );
        return Redirect()->route('proccess.delivery')->with($notification);
    }

    public function deleverd()
    {
        $orders = $this->order->deleverd();
        return view('backend.order.pandding', compact('orders'));
    }

    public function orderCancel(Request $request, $id)
    {
        $this->order->orderCancel($request, $id);

        $notification = array(
            'message' => 'Order Accept',
            'alert-type' => 'success'
        );
        return Redirect()->route('orders.pandding')->with($notification);
    }

    public function cancelList()
    {
        $orders = $this->order->cancelList();
        return view('backend.order.pandding', compact('orders'));
    }
}
