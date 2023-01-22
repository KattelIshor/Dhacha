<?php

namespace App\Repositories;

use App\Models\PostCategory;

class PostCategoryRepository
{
    public function index()
    {
        return PostCategory::select('id', 'name_en', 'name_bn')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    public function store($request)
    {
        $postCategory = new PostCategory();

        $postCategory->name_en = $request->name_en;
        $postCategory->name_bn = $request->name_bn;
        $postCategory->save();
    }

    public function edit($id)
    {
        return PostCategory::find($id);
    }

    public function update($request, $postCategory)
    {
        $postCategory->name_en = $request->name_en;
        $postCategory->name_bn = $request->name_bn;

        $postCategory->update();
    }

    public function destroy($id)
    {
        $postCategory = PostCategory::find($id);
        $postCategory->delete();
    }
}
