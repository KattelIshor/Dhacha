<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    protected $post;

    public function __construct(PostRepository $post)
    {
        $this->middleware('auth:admin');
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->post->index();
        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postCategories = $this->post->create();
        return view('backend.posts.create', compact('postCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $this->post->store($request);

        $notification = array(
            'message' => 'Post Added Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->show($id);
        return view('backend.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postCategories = $this->post->create();
        $post = $this->post->edit($id);

        return view('backend.posts.edit', compact('postCategories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $this->post->update($request, $post);

        $notification = array(
            'message' => 'Post Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('posts.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->destroy($id);

        $notification = array(
            'message' => 'Post Deleted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        $this->post->inactive($id);

        $notification = array(
            'message' => 'Post is inactive',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function active($id)
    {
        $this->post->active($id);

        $notification = array(
            'message' => 'Post is active',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }
}
