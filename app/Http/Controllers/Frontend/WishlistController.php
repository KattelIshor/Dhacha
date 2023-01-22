<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\WishlistRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WishlistController extends Controller
{
    protected $wishlist;

    public function __construct(WishlistRepository $wishlist)
    {
        $this->middleware('auth', ['only' => 'wishlist']);
        $this->wishlist = $wishlist;
    }

    public function storeWishlist(Request $request)
    {
        $check = $this->wishlist->storeWishlist($request);

        if ($check == 1) {

            return Response::json(['error' => 'Product Already Has on your wishlist']);
        } elseif ($check == 2) {

            return Response::json(['success' => 'Product Added on wishlist']);
        } elseif ($check == 0) {

            return Response::json(['error' => 'At first logging your account']);
        }
    }

    public function wishlist()
    {
        $wishlist = $this->wishlist->wishlist();

        return view('frontend.wishlist', compact('wishlist'));
    }

    public function removeWishlist($id)
    {
        $wishlist = $this->wishlist->removeWishlist($id);
        $wishlist->delete();

        $notification = array(
            'message' => 'your product successfuly remove from wishlist',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
