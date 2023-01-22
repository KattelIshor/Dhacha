<?php

namespace App\Interface;

interface OrderInterface
{
    public function orderPandding();
    public function order($id);
    public function shipping($id);
    public function details($id);
    public function orderAccept($request, $id);
    public function acceptPayment();
    public function proccessPayment($id);
    public function proccessDelivery();
    public function deliveryDone($id);
    public function deleverd();
    public function orderCancel($request, $id);
    public function cancelList();
}
