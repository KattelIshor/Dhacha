<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductRepository $product)
    {
        $this->middleware('auth:admin');
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->index();
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->product->getCategories();
        $brands = $this->product->getBrands();

        return view('backend.products.create', compact('categories', 'brands'));
    }

    public function getSubCategory($category_id)
    {
        $subcategories = $this->product->getSubCategory($category_id);
        return json_encode($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $this->product->store($request);

        $notification = array(
            'message' => 'Product Added',
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
        $product = $this->product->show($id);

        return view('backend.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->edit($id);
        $categories = $this->product->getCategories();
        $brands = $this->product->getBrands();
        $subcategories = $this->product->getSubCategory($product->category_id);
        return view('backend.products.edit', compact('product', 'categories', 'brands', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->product->update($request, $product);

        $notification = array(
            'message' => 'Product Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->destroy($id);

        $notification = array(
            'message' => 'Product Deleted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        $this->product->inactive($id);

        $notification = array(
            'message' => 'Product is inactive',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function active($id)
    {
        $this->product->active($id);

        $notification = array(
            'message' => 'Product is active',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }
}
