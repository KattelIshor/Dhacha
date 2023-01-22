@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

    <section class="product-details spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Product
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-12">
                            <img src="{{ asset($product->image_one) }}" alt="{{ $product->product_title }}" class="img-fluid w-100 pb-1" id="mainImg">

                            <div class="small-img-group">
                                @if ($product->image_one)
                                    <div class="small-img-col">
                                        <img src="{{ asset($product->image_one) }}" alt="{{ $product->product_title }}" width="100%" class="small-img">
                                    </div>
                                @endif

                                @if ($product->image_two)
                                    <div class="small-img-col">
                                        <img src="{{ asset($product->image_two) }}" alt="{{ $product->product_title }}" width="100%" class="small-img">
                                    </div>
                                @endif

                                @if ($product->image_three)
                                    <div class="small-img-col">
                                        <img src="{{ asset($product->image_three) }}" alt="{{ $product->product_title }}" width="100%" class="small-img">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 col-12">
                        {{ Form::open(['route' => ['products.details', $product->slug]]) }}
                            <h6>
                                <a href="{{ route('products.categories', $product->category->slug) }}">
                                    {{ $product->category->name }}
                                </a> |
                                <a href="{{ route('products.subcategories', $product->subcategory->slug) }}">
                                    {{ $product->subcategory->name }}
                                </a>
                            </h6>
                            <h3 class="py-4">{{ $product->product_title }}</h3>
                            <h2>
                                @if ($product->discount_price == null)
                                    Rs {{ intval($product->selling_price) }}
                                @else
                                    Rs {{ intval($product->discount_price) }}
                                    <span class="price-before-discount">
                                        Rs {{ intval($product->selling_price) }}
                                    </span>
                                @endif
                            </h2>
                            @if ($product->product_size != null)
                                <select class="my-3" name="size">
                                    <option value="">Select Size</option>
                                    @foreach ($product_size as $size)
                                        <option value="{{ $size }}">{{ $size }}</option>
                                    @endforeach
                                </select>
                            @endif

                            @if ($product->product_color != null)
                                <select class="my-3" name="color">
                                    <option value="">Select Color</option>
                                    @foreach ($product_color as $color)
                                        <option value="{{ $color }}">{{ $color }}</option>
                                    @endforeach
                                </select>
                            @endif
                            <input type="number" value="1" min="1" max="10" name="qty">

                            <button type="submit" class="btn btn-success buy-btn">Add To Cart</button>
                            <h4 class="my-3">Product Details <i class="fa fa-indent" aria-hidden="true"></i></h4>
                            <p>{!! $product->product_details !!}</p>
                        {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="viewed spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-home" aria-selected="true">Reviews</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                                aria-controls="nav-profile" aria-selected="false">Video</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show p-3 active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="product-comment">
                                @comments(['model' => $product])
                            </div>
                        </div>
                        <div class="tab-pane p-3 fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            @if ($product->video_link)
                                <div class="product-video">
                                    <iframe width="100%" height="315" src="{{ $product->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            @else

                                <h2>No Video Here</h2>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
