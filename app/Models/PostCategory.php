<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = "post_categories";

    protected $fillable = [
        'name_en', 'name_bn', 'slug'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($postCategory) {
            $postCategory->slug = Str::slug($postCategory->name_en);
        });
    }
}
