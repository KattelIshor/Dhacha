<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newslater extends Model
{
    use HasFactory;

    protected $table = "newslaters";

    protected $fillable = [
        'email'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
