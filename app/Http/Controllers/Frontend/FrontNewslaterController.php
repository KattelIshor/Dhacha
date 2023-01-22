<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewslaterRequest;
use App\Repositories\NewslaterRepository;

class FrontNewslaterController extends Controller
{
    protected $news;

    public function __construct(NewslaterRepository $news)
    {
        $this->news = $news;
    }

    public function store(NewslaterRequest $request)
    {
        $this->news->store($request);

        $notification = array(
            'message' => 'Your subscription successfully done !',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }
}
