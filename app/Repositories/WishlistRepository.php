<?php

namespace App\Repositories;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class WishlistRepository
{
    public function storeWishlist($request)
    {
        $id = $request->id;
        $user_id = Auth::id();
        $check = Wishlist::where('user_id', $user_id)->where('product_id', $id)->first();

        $wishlist = new Wishlist();

        $wishlist->user_id = $user_id;
        $wishlist->product_id = $id;

        if (Auth::check()) {
            if ($check) {

                return 1;
            } else {

                $wishlist->save();
                return 2;
            }
        } else {

            return 0;
        }
    }

    public function wishlist()
    {
        return Wishlist::with('product')->where('user_id', Auth::id())->paginate(10);
    }

    public function removeWishlist($id)
    {
        return Wishlist::find($id);
    }
}
