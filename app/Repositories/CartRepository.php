<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\Setting;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartRepository
{
    public function showCart()
    {
        return Cart::content();
    }

    public function updateCartItem($request)
    {
        $rowId = $request->productId;
        $qty = $request->qty;

        Cart::update($rowId, $qty);
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
    }

    public function showSetting()
    {
        return Setting::select('shipping_charge', 'vat')->first();
    }
}
