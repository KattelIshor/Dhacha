<?php

namespace App\Repositories;

use App\Models\Coupon;

class CouponRepository
{
    public function index()
    {
        return Coupon::select('id', 'coupon', 'discount')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }
    public function store($request)
    {
        $coupon = new Coupon();

        $coupon->coupon = $request->coupon;
        $coupon->discount = $request->discount;
        $coupon->save();
    }

    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
    }
}
