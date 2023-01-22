@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'product')

@section('pagename', $product->product_title)

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">{{ $product->product_title }}
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning mg-b-10 float-right mx-3">
                 Edit <i class="fa fa-pencil-square-o mg-r-10"></i>
            </a>

            <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary mg-b-10 float-right">
                 All Products <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="card-body">
            <div class="row mg-b-25">
                <div class="col-sm-4">
                    @if ($product->image_one)
                        <img src="{{ asset($product->image_one) }}" alt="Product Image one" class="img-thumbnail mb-3">
                    @endif

                    @if ($product->image_two)
                        <img src="{{ asset($product->image_two) }}" alt="Product Image one" class="img-thumbnail mb-3">
                    @endif

                    @if ($product->image_three)
                        <img src="{{ asset($product->image_three) }}" alt="Product Image one" class="img-thumbnail mb-3">
                    @endif

                </div><!-- col-4 -->
                <div class="col-sm offset-sm-1">
                    <h2 class="card-body-title">Product Details</h2>
                    <span class="tx-uppercase tx-medium tx-12 d-block mg-b-15">{{ $product->created_at->format('F d, Y h:s A') }}</span>

                    <dl class="row">
                        <dt class="col-sm-3 tx-inverse">Product Description</dt>
                        <dd class="col-sm-9">{!! $product->product_details !!}</dd>

                        <dt class="col-sm-3 tx-inverse">Category</dt>
                        <dd class="col-sm-9">{{ $product->category->name }}</dd>

                        <dt class="col-sm-3 tx-inverse">Sub Category</dt>
                        <dd class="col-sm-9">{{ $product->subcategory->name }}</dd>

                        <dt class="col-sm-3 tx-inverse">Brand</dt>
                        <dd class="col-sm-9">{{ $product->brand->name }}</dd>

                        <dt class="col-sm-3 tx-inverse">Product Code</dt>
                        <dd class="col-sm-9">{{ $product->product_code }}</dd>

                        <dt class="col-sm-3 tx-inverse">Product Quantity</dt>
                        <dd class="col-sm-9">{{ $product->product_quantity }}</dd>

                        <dt class="col-sm-3 tx-inverse">Product Color</dt>
                        <dd class="col-sm-9">{{ $product->product_color }}</dd>

                        <dt class="col-sm-3 tx-inverse">Product Size</dt>
                        <dd class="col-sm-9">{{ $product->product_size }}</dd>

                        <dt class="col-sm-3 tx-inverse">Selling Price</dt>
                        <dd class="col-sm-9">BDT {{ $product->selling_price }}</dd>

                        <dt class="col-sm-3 tx-inverse">Discount Price</dt>
                        <dd class="col-sm-9">BDT {{ $product->discount_price }}</dd>

                        <dt class="col-sm-3 tx-inverse">Video Link</dt>
                        <dd class="col-sm-9"><a href="{{ $product->video_link }}">View product related video</a></dd>

                        <dt class="col-sm-3 tx-inverse">Status</dt>
                        <dd class="col-sm-9">
                            @if ($product->status == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3 tx-inverse">Main Slider</dt>
                        <dd class="col-sm-9">
                            @if ($product->main_slider == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3 tx-inverse">Hot Deal</dt>
                        <dd class="col-sm-9">
                            @if ($product->hot_deal == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3 tx-inverse">Best Rated</dt>
                        <dd class="col-sm-9">
                            @if ($product->best_rated == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3 tx-inverse">Hot New</dt>
                        <dd class="col-sm-9">
                            @if ($product->hot_new == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </dd>

                        <dt class="col-sm-3 tx-inverse">Trand</dt>
                        <dd class="col-sm-9">
                            @if ($product->trand == 1)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div><!-- card -->

    <!-- Delete Modal -->
    <x-delete>
        <x-slot name="form">
            {{ Form::open(['method' => 'DELETE', 'id' => 'deleteForm']) }}
        </x-slot>
    </x-delete>
    <!--End Delete Modal -->

    {{-- For Dashboard operations --}}
    <script src="{{ mix('js/dashboard.js') }}"></script>
@endsection

