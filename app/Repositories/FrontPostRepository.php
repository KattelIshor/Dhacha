<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Facades\Session;

class FrontPostRepository
{
    public function postIndex()
    {
        return Post::where('status', 1)->orderBy('created_at', 'DESC')
            ->select('title_en', 'title_bn', 'slug', 'description_en', 'description_bn', 'image', 'created_at')->paginate(12);
    }

    public function english()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang', 'english');
    }

    public function bangla()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session::put('lang', 'bangla');
    }

    public function singlePost($slug)
    {
        return Post::with('admin', 'postcategory')
            ->where('status', 1)
            ->where('slug', $slug)->first();
    }
}
