<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    protected $fillable = [
        'name', 'slug', 'category_id'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    public function parent_category()
    {
        return $this->belongsTo(__CLASS__);
    }

    public function child_category()
    {
        return $this->hasMany(__CLASS__);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function product_subcategory()
    {
        return $this->hasMany(Product::class, 'subcategory_id');
    }
}
