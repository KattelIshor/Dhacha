<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\FrontPostRepository;

class FrontPostController extends Controller
{
    protected $posts;

    public function __construct(FrontPostRepository $posts)
    {
        $this->posts = $posts;
    }

    public function postIndex()
    {
        $posts = $this->posts->postIndex();
        return view('frontend.post', compact('posts'));
    }

    public function english()
    {
        $this->posts->english();
        return redirect()->back();
    }

    public function bangla()
    {
        $this->posts->bangla();
        return redirect()->back();
    }

    public function singlePost($slug)
    {
        $post = $this->posts->singlePost($slug);
        return view('frontend.post-single', compact('post'));
    }
}
