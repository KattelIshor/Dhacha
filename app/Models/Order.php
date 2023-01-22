<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        'user_id', 'payment_type', 'payment_id', 'paying_amount', 'blnc_transection', 'stripe_order_id', 'subtotal', 'shipping', 'vat', 'total', 'status', 'status_code'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
