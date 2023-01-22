<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Models\PostCategory;
use App\Repositories\PostCategoryRepository;

class PostCategoryController extends Controller
{
    protected $postCategory;

    public function __construct(PostCategoryRepository $postCategory)
    {
        $this->middleware('auth:admin');
        $this->postCategory = $postCategory;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postCategory = $this->postCategory->index();
        return  view('backend.posts.post_categories.index', compact('postCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostCategoryRequest $request)
    {
        $this->postCategory->store($request);

        $notification = array(
            'message' => 'Post Category Added Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $postCategory = $this->postCategory->edit($id);
        return view('backend.posts.post_categories.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostCategoryRequest $request, PostCategory $post_category)
    {
        $this->postCategory->update($request, $post_category);

        $notification = array(
            'message' => 'Post Category Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('post-categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->postCategory->destroy($id);

        $notification = array(
            'message' => 'Post Category Deleted!',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }
}
