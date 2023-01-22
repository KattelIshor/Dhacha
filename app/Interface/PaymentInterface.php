<?php

namespace App\Interface;

interface PaymentInterface
{
    public function payment($request);
    public function stripe($request);
}
