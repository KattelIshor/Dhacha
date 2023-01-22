<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use App\Models\Shipping;

class OrderRepository
{
    public function orderPandding()
    {
        return Order::where('status_op', 0)->paginate(10);
    }

    public function order($id)
    {
        return Order::with('user')->where('id', $id)->first();
    }

    public function shipping($id)
    {
        return Shipping::with('order')->where('order_id', $id)->first();
    }

    public function details($id)
    {
        return OrderDetails::with('product', 'order')->where('order_id', $id)->get();
    }

    public function orderAccept($request, $id)
    {
        $order = Order::find($id);
        $order->status_op = 1;
        $order->update();
    }

    public function acceptPayment()
    {
        return Order::where('status_op', 1)->paginate(10);
    }

    public function proccessPayment($id)
    {
        $order = Order::find($id);
        $order->status_op = 2;
        $order->update();
    }

    public function proccessDelivery()
    {
        return Order::where('status_op', 2)->paginate(10);
    }

    public function deliveryDone($id)
    {
        $order_details = OrderDetails::where('order_id', $id)->get();

        foreach ($order_details as $order_item) {
            $product = Product::find($order_item->product_id);
            $product->product_quantity = $product->product_quantity - $order_item->quantity;
            $product->update();
        }

        $order = Order::find($id);
        $order->status_op = 3;
        $order->update();
    }

    public function deleverd()
    {
        return Order::where('status_op', 3)->paginate(10);
    }

    public function orderCancel($request, $id)
    {
        $order = Order::find($id);
        $order->status_op = 4;
        $order->update();
    }

    public function cancelList()
    {
        return Order::where('status_op', 4)->paginate(10);
    }
}
