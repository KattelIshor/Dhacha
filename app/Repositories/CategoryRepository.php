<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class CategoryRepository
{
    public function index()
    {
        return  Category::with('child_category')
            ->where('category_id', NUll)
            ->select('id', 'name', 'slug', 'category_id')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    public function store($request)
    {
        $category = new Category();

        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->save();
    }

    public function edit($id)
    {
        return Category::find($id);
    }

    public function update($request, $category)
    {
        $category->name = $request->name;
        $category->category_id = $request->category_id;
        $category->update();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function subcategories()
    {
        return Category::with('child_category')
            ->whereNotNull('category_id')
            ->select('id', 'name', 'slug', 'category_id')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }
}
