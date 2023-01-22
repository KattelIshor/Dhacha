<?php

namespace App\Interface;

interface CouponInterface
{
    public function index();
    public function store($request);
    public function destroy($id);
}
