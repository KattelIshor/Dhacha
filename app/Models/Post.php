<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, Commentable;

    protected $table = "posts";

    protected $fillable = [
        'postcategory_id', 'title_en', 'title_bn', 'slug', 'description_en', 'description_bn', 'image'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title_en);
        });
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function postcategory()
    {
        return $this->belongsTo(PostCategory::class);
    }
}
