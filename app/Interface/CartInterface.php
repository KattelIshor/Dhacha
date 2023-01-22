<?php

namespace App\Interface;

interface CartInterface
{
    public function showCart();
    public function showSetting();
    public function removeCart($rowId);
    public function updateCartItem($request);
}
