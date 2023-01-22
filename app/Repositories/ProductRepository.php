<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class ProductRepository
{
    public function index()
    {
        return Product::with('category')
            ->select('id', 'product_title', 'product_quantity', 'image_one', 'category_id', 'product_code', 'status')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    public function getCategories()
    {
        return Category::where('category_id', NULL)->select('id', 'name')->orderBy('name', 'ASC')->get();
    }

    public function getBrands()
    {
        return Brand::select('id', 'name')->orderBy('name', 'ASC')->get();
    }

    public function getSubCategory($category_id)
    {
        return Category::with('child_category')
            ->select('id', 'name')
            ->where('category_id', $category_id)
            ->get();
    }

    public function store($request)
    {
        $product = new Product();

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        $product->product_title = $request->product_title;
        $product->product_code = $request->product_code;
        $product->product_quantity = $request->product_quantity;
        $product->discount_price = $request->discount_price;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->product_details = $request->product_details;
        $product->video_link = $request->video_link;

        if ($request->hot_deal == 'on') {
            $product->hot_deal = 1;
        }

        if ($request->best_seller == 'on') {
            $product->best_seller = 1;
        }

        if ($request->special_offer == 'on') {
            $product->special_offer = 1;
        }

        if ($request->trand == 'on') {
            $product->trand = 1;
        }

        if ($request->new_arrival == 'on') {
            $product->new_arrival = 1;
        }

        if ($image_one) {
            $image_one_name = uniqid('product_', true) . Str::random(10) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->save('media/products/' . $image_one_name);
            $product->image_one = 'media/products/' . $image_one_name;
        }

        if ($image_two) {
            $image_two_name = uniqid('product_', true) . Str::random(10) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->save('media/products/' . $image_two_name);
            $product->image_two = 'media/products/' . $image_two_name;
        }

        if ($image_three) {
            $image_three_name = uniqid('product_', true) . Str::random(10) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->save('media/products/' . $image_three_name);
            $product->image_three = 'media/products/' . $image_three_name;
        }

        $product->save();
    }

    public function show($id)
    {
        return Product::with('category', 'subcategory', 'brand')->find($id);
    }

    public function edit($id)
    {
        return Product::find($id);
    }

    public function update($request, $product)
    {
        $old_image_one = $product->image_one;
        $old_image_two = $product->image_two;
        $old_image_three = $product->image_three;

        $image_one = $request->image_one;
        $image_two = $request->image_two;
        $image_three = $request->image_three;

        $product->product_title = $request->product_title;
        $product->product_code = $request->product_code;
        $product->product_quantity = $request->product_quantity;
        $product->discount_price = $request->discount_price;
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;
        $product->product_size = $request->product_size;
        $product->product_color = $request->product_color;
        $product->selling_price = $request->selling_price;
        $product->product_details = $request->product_details;
        $product->video_link = $request->video_link;

        if ($request->hot_deal == 'on') {
            $product->hot_deal = 1;
        } else {
            $product->hot_deal = 0;
        }

        if ($request->best_seller == 'on') {
            $product->best_seller = 1;
        } else {
            $product->best_seller = 0;
        }

        if ($request->special_offer == 'on') {
            $product->special_offer = 1;
        } else {
            $product->special_offer = 0;
        }

        if ($request->trand == 'on') {
            $product->trand = 1;
        } else {
            $product->trand = 0;
        }

        if ($request->new_arrival == 'on') {
            $product->new_arrival = 1;
        } else {
            $product->new_arrival = 0;
        }

        if ($image_one) {
            unlink($old_image_one);
            $image_one_name = uniqid('product_', true) . Str::random(10) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->save('media/products/' . $image_one_name);
            $product->image_one = 'media/products/' . $image_one_name;
        }

        if ($image_two) {
            unlink($old_image_two);
            $image_two_name = uniqid('product_', true) . Str::random(10) . '.' . $image_two->getClientOriginalExtension();
            Image::make($image_two)->save('media/products/' . $image_two_name);
            $product->image_two = 'media/products/' . $image_two_name;
        }

        if ($image_three) {
            unlink($old_image_three);
            $image_three_name = uniqid('product_', true) . Str::random(10) . '.' . $image_three->getClientOriginalExtension();
            Image::make($image_three)->save('media/products/' . $image_three_name);
            $product->image_three = 'media/products/' . $image_three_name;
        }

        $product->update();
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if ($product->image_one) {
            unlink($product->image_one);
        }

        if ($product->image_two) {
            unlink($product->image_two);
        }

        if ($product->image_three) {
            unlink($product->image_three);
        }

        $product->delete();
    }

    public function inactive($id)
    {
        $product = Product::find($id);

        $product->status = 0;
        $product->update();
    }

    public function active($id)
    {
        $product = Product::find($id);

        $product->status = 1;
        $product->update();
    }
}
