<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCouponRequest;
use App\Models\Coupon;
use App\Repositories\CartRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
        $this->middleware('auth', ['only' => 'checkout']);
    }

    public function showCart()
    {
        $shopcarts = $this->cart->showCart();
        return view('frontend.cart', compact('shopcarts'));
    }

    public function updateCartItem(Request $request)
    {
        $this->cart->updateCartItem($request);

        $notification = array(
            'message' => 'Product Quantity Updated',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function removeCart($rowId)
    {
        $this->cart->removeCart($rowId);

        $notification = array(
            'message' => 'Product remove form cart',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function checkout()
    {
        if ($this->cart->showCart()->count() > 0) {
            if (Auth::check()) {
                $cart = $this->cart->showCart();
                $setting = $this->cart->showSetting();

                return view('frontend.checkout', compact('cart', 'setting'));
            } else {
                $notification = array(
                    'message' => 'At first logging your account',
                    'alert-type' => 'error'
                );
                return Redirect()->back()->with($notification);
            }
        } else {
            return Redirect()->route('show.cart');
        }
    }

    public function storeCoupon(UserCouponRequest $request)
    {
        $coupon = $request->coupon;
        $check = Coupon::where('coupon', $coupon)->first();

        if ($check) {
            Session::put('coupon', [
                'name' => $check->coupon,
                'discount' => $check->discount,
                'balance' => Cart::subtotal() - $check->discount,
            ]);

            $notification = array(
                'message' => 'Successfully coupon applied',
                'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Invalid Coupon',
                'alert-type' => 'success',
            );

            return Redirect()->back()->with($notification);
        }
    }
}
