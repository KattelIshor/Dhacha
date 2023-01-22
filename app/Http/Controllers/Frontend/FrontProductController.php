<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\FrontProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class FrontProductController extends Controller
{
    protected $frontProduct;

    public function __construct(FrontProductRepository $frontProduct)
    {
        $this->frontProduct = $frontProduct;
    }

    public function productView($slug)
    {
        $product = $this->frontProduct->productView($slug);

        $product_color = explode(',', $product->product_color);
        $product_size = explode(',', $product->product_size);

        return view('frontend.single-product', compact('product', 'product_color', 'product_size'));
    }

    public function addProductCart(Request $request, $slug)
    {
        $this->frontProduct->addProductCart($request, $slug);

        $notification = array(
            'message' => 'Product Successfuly Added',
            'alert-type' => 'success'
        );

        if ($request->header('referer') == $request->header('origin') . "/products/search") {
            return Redirect()->route('show.cart')->with($notification);
        }

        return Redirect()->back()->with($notification);
    }

    public function productQueckView($slug)
    {
        $product = $this->frontProduct->productView($slug);

        $product_color = explode(',', $product->product_color);
        $product_size = explode(',', $product->product_size);

        return Response::json([
            'product' => $product,
            'product_color' => $product_color,
            'product_size' => $product_size
        ]);
    }

    public function category($slug)
    {
        $categories = $this->frontProduct->category($slug);
        return view('frontend.categories-products', compact('categories'));
    }

    public function subcategory($slug)
    {
        $subcategories = Category::with('product_subcategory')->where('slug', $slug)->first();
        return view('frontend.subcategories-products', compact('subcategories'));
    }

    public function products()
    {
        $products = $this->frontProduct->products();
        return view('frontend.products', compact('products'));
    }

    public function hotDeal()
    {
        $products = $this->frontProduct->hotDeal();
        return view('frontend.products', compact('products'));
    }

    public function bestSeller()
    {
        $products = $this->frontProduct->bestSeller();
        return view('frontend.products', compact('products'));
    }

    public function specialOffer()
    {
        $products = $this->frontProduct->specialOffer();
        return view('frontend.products', compact('products'));
    }

    public function trand()
    {
        $products = $this->frontProduct->trand();
        return view('frontend.products', compact('products'));
    }

    public function newArrival()
    {
        $products = $this->frontProduct->newArrival();
        return view('frontend.products', compact('products'));
    }

    public function search(Request $request)
    {
        $title = $request->product_title;
        $products = $this->frontProduct->search($request);

        return view('frontend.search', compact('products', 'title'));
    }
}
