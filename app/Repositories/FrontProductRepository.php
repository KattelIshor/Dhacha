<?php

namespace App\Repositories;

use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;

class FrontProductRepository
{
    public function productView($slug)
    {
        return Product::with('category', 'subcategory', 'brand')
            ->where('slug', $slug)
            ->get()->first();
    }

    public function addProductCart($request, $slug)
    {
        $product = Product::select('id', 'product_title', 'discount_price', 'selling_price', 'image_one')
            ->where('slug', $slug)->first();

        $data = [];
        $data['id'] = $product->id;
        $data['name'] = $product->product_title;
        $data['qty'] = $request->qty;

        if ($product->discount_price == NULL) {
            $data['price'] = $product->selling_price;
        } else {
            $data['price'] = $product->discount_price;
        }

        $data['weight'] = 1;
        $data['options']['image'] = $product->image_one;
        $data['options']['color'] = $request->color;
        $data['options']['size'] = $request->size;
        Cart::add($data);
    }

    public function category($slug)
    {
        return Category::with('product')->where('slug', $slug)->first();
    }

    public function products()
    {
        return Product::where('status', 1)
            ->select('id', 'product_title', 'slug', 'selling_price', 'discount_price', 'image_one', 'hot_deal', 'best_seller', 'special_offer', 'trand', 'new_arrival')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
    }

    public function hotDeal()
    {
        return Product::where('status', 1)->where('hot_deal', 1)
            ->select('id', 'product_title', 'slug', 'selling_price', 'discount_price', 'image_one', 'hot_deal')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
    }

    public function bestSeller()
    {
        return Product::where('status', 1)->where('best_seller', 1)
            ->select('id', 'product_title', 'slug', 'selling_price', 'discount_price', 'image_one', 'best_seller')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
    }

    public function specialOffer()
    {
        return Product::where('status', 1)->where('special_offer', 1)
            ->select('id', 'product_title', 'slug', 'selling_price', 'discount_price', 'image_one', 'special_offer')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
    }

    public function trand()
    {
        return Product::where('status', 1)->where('trand', 1)
            ->select('id', 'product_title', 'slug', 'selling_price', 'discount_price', 'image_one', 'trand')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
    }

    public function newArrival()
    {
        return Product::where('status', 1)->where('new_arrival', 1)
            ->select('id', 'product_title', 'slug', 'selling_price', 'discount_price', 'image_one', 'new_arrival')
            ->orderBy('created_at', 'DESC')
            ->paginate(12);
    }

    public function search($request)
    {
        return Product::where('status', 1)
            ->select('id', 'product_title', 'slug', 'selling_price', 'discount_price', 'image_one', 'hot_deal')
            ->where("product_title", "LIKE", "%{$request->product_title}%")
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
