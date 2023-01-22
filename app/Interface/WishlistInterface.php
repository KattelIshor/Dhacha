<?php

namespace App\Interface;

interface WishlistInterface
{
    public function storeWishlist($request);
    public function removeWishlist($id);
    public function wishlist();
}
