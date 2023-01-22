<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = "settings";

    protected $fillable = [
        'vat', 'shipping_charge', 'logo'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
