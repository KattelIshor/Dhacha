<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class PostRepository
{
    public function index()
    {
        return Post::with('postcategory')->select('id', 'postcategory_id', 'title_en', 'image', 'status')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    public function create()
    {
        return PostCategory::select('id', 'name_en', 'name_bn')->get();
    }

    public function store($request)
    {
        $post = new Post();
        $image = $request->image;

        $post->postcategory_id  = $request->postcategory_id;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->title_en = $request->title_en;
        $post->title_bn = $request->title_bn;
        $post->description_en = $request->description_en;
        $post->description_bn = $request->description_bn;

        if ($image->isValid()) {
            $file_name = uniqid('post_', true) . Str::random(10) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(780, 520)->save('media/posts/' . $file_name);
            $post->image = 'media/posts/' . $file_name;
        }

        $post->save();
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function edit($id)
    {
        return Post::find($id);
    }

    public function update($request, $post)
    {
        $old_image = $post->image;
        $image = $request->image;

        $post->postcategory_id  = $request->postcategory_id;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->title_en = $request->title_en;
        $post->title_bn = $request->title_bn;
        $post->description_en = $request->description_en;
        $post->description_bn = $request->description_bn;

        if ($image) {
            unlink($old_image);
            $file_name = uniqid('post_', true) . Str::random(10) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(780, 520)->save('media/posts/' . $file_name);
            $post->image = 'media/posts/' . $file_name;
        }

        $post->update();
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if ($post->image) {
            unlink($post->image);
        }

        $post->delete();
    }

    public function inactive($id)
    {
        $post = Post::find($id);

        $post->status = 0;
        $post->update();
    }

    public function active($id)
    {
        $post = Post::find($id);

        $post->status = 1;
        $post->update();
    }
}
