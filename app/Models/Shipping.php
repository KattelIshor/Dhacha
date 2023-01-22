<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = "shippings";

    protected $fillable = [
        'order_id', 'ship_name', 'ship_phone', 'ship_email', 'ship_address', 'post_code'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
