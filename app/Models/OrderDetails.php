<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    protected $table = "order_details";

    protected $fillable = [
        'order_id', 'product_id', 'product_name', 'color', 'size', 'quantity', 'singleprice', 'totalprice'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
