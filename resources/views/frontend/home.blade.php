@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

    {{-- Banner --}}
  
   
    {{--End Banner --}}

    {{-- Main Container --}}
    <div class="container">
        <div class="row">
            <div class="col-md-4">
              

                {{-- Categories --}}
                @if ($parentCategories->count() > 0)
                    <section class="category spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Categories
                            </div>
                            <div class="card-body">
                                @foreach ($parentCategories as $category)
                                    <a href="{{ route('products.categories', $category->slug) }}"
                                        class="btn btn-sm btn-secondary category-btn mb-2">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @endif
                {{-- End Categories --}}


                  {{-- Hot Deal --}}
                  @if ($hotDeals->count() > 0)
                  <section class="hotdeal spad">
                      <div class="card customCard">
                          <div class="card-header customCard__header">
                              Hot Deal
                              <a href="{{ route('products.hotdeal') }}" class="btn btn-sm btn-success">View All</a>
                          </div>
                          <div class="card-body">
                              <div class="row sidebar-slider">
                                  @foreach ($hotDeals as $product)
                                      <div class="col-12">
                                          <div class="card ProductCard">
                                              <a href="{{ route('products.details', $product->slug) }}">
                                                  <img src="{{ asset($product->image_one) }}"
                                                       class="card-img-top productCard__img"
                                                       alt="{{ $product->product_title }}">
                                              </a>
                                              <div class="ProductCard__label bg-warning">
                                                  @if ($product->discount_price == NULL)
                                                      <span>Hot</span>
                                                  @else
                                                      <span>
                                                          @php
                                                              $amount = $product->selling_price - $product->discount_price;
                                                              $discount = $amount/$product->selling_price*100;
                                                          @endphp
                                                          {{ intval($discount) }}%
                                                      </span>
                                                  @endif
                                              </div>
                                              <div class="card-body productCard__body">
                                                  <h5 class="card-title productCard__title">
                                                      <a href="{{ route('products.details', $product->slug) }}">{{ $product->product_title }}</a>
                                                  </h5>
                                                  <div class="productCard__price">
                                                      @if ($product->discount_price == NULL)
                                                          <span class="price">
                                                              Rs {{ intval($product->selling_price) }}
                                                          </span>
                                                      @else
                                                          <span class="price">
                                                              Rs {{ intval($product->discount_price) }}
                                                          </span>
                                                          <span class="price-before-discount">
                                                              Rs {{ intval($product->selling_price) }}
                                                          </span>
                                                      @endif
                                                  </div>
                                                  <div class="productCard__btn">
                                                      <div class="btn-group" role="group" aria-label="Basic example">
                                                          <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                  id="{{ $product->slug }}" data-toggle="modal"
                                                                  data-target="#cartmodal" title="Add Cart"
                                                                  onclick="productview(this.id)"><i
                                                                  class="fa fa-shopping-cart"></i></button>

                                                          <form action="javascript:void(0)" method="POST">
                                                              <button
                                                                  class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                  data-id="{{ $product->id }}" title="Add Wishlist"><i
                                                                      class="fa fa-heart-o"></i></button>
                                                          </form>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  @endforeach
                              </div>
                          </div>
                      </div>
                  </section>
              @endif
              {{-- End Hot Deal --}}
                {{-- Special Offer --}}
                @if ($specialOffer->count() > 0)
                    <section class="hotdeal spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Special Offer
                                <a href="{{ route('products.specialoffer') }}" class="btn btn-sm btn-success">View
                                    All</a>
                            </div>
                            <div class="card-body">
                                <div class="row sidebar-slider">
                                    @foreach ($specialOffer as $product)
                                        <div class="col-12">
                                            <div class="card ProductCard">
                                                <a href="{{ route('products.details', $product->slug) }}">
                                                    <img src="{{ asset($product->image_one) }}"
                                                         class="card-img-top productCard__img"
                                                         alt="{{ $product->product_title }}">
                                                </a>
                                                <div class="ProductCard__label bg-success">
                                                    @if ($product->discount_price == NULL)
                                                        <span></span>
                                                    @else
                                                        <span>
                                                            @php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = $amount/$product->selling_price*100;
                                                            @endphp
                                                            {{ intval($discount) }}%
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="card-body productCard__body">
                                                    <h5 class="card-title productCard__title">
                                                        <a href="{{ route('products.details', $product->slug) }}">{{ $product->product_title }}</a>
                                                    </h5>
                                                    <div class="productCard__price">
                                                        @if ($product->discount_price == NULL)
                                                            <span class="price">
                                                                Rs {{ intval($product->selling_price) }}
                                                            </span>
                                                        @else
                                                            <span class="price">
                                                                Rs {{ intval($product->discount_price) }}
                                                            </span>
                                                            <span class="price-before-discount">
                                                                Rs {{ intval($product->selling_price) }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="productCard__btn">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                    id="{{ $product->slug }}" data-toggle="modal"
                                                                    data-target="#cartmodal" title="Add Cart"
                                                                    onclick="productview(this.id)"><i
                                                                    class="fa fa-shopping-cart"></i></button>

                                                            <form action="javascript:void(0)" method="POST">
                                                                <button
                                                                    class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                    data-id="{{ $product->id }}" title="Add Wishlist"><i
                                                                        class="fa fa-heart-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                {{-- End Special Offer --}}
            </div>

            <div class="col-md-8">
                {{-- Products --}}
                @if ($products->count() > 0)
                    <section class="product spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Products
                                <a href="{{ route('products') }}" class="btn btn-sm btn-success">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="row product-slider">
                                    @foreach ($products as $product)
                                        <div class="col-12">
                                            <div class="card ProductCard">
                                                <a href="{{ route('products.details', $product->slug) }}">
                                                    <img src="{{ asset($product->image_one) }}"
                                                         class="card-img-top productCard__img"
                                                         alt="{{ $product->product_title }}">
                                                </a>
                                                @if ($product->discount_price == NULL)

                                                    @if ($product->hot_deal == 1)
                                                        <div class="ProductCard__label bg-warning">
                                                            <span>Hot</span>
                                                        </div>
                                                    @endif

                                                    @if ($product->best_seller == 1)
                                                        <div class="ProductCard__label bg-info">
                                                            <span>Top</span>
                                                        </div>
                                                    @endif

                                                    @if ($product->special_offer == 1)
                                                        <div class="ProductCard__label bg-success">
                                                            <span>Special</span>
                                                        </div>
                                                    @endif

                                                    @if ($product->trand == 1)
                                                        <div class="ProductCard__label bg-secondary">
                                                            <span>Trend</span>
                                                        </div>
                                                    @endif

                                                    @if ($product->new_arrival == 1)
                                                        <div class="ProductCard__label bg-primary">
                                                            <span>New</span>
                                                        </div>
                                                    @endif

                                                @else
                                                    <div class="ProductCard__label bg-success">
                                                        <span>
                                                            @php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = $amount/$product->selling_price*100;
                                                            @endphp
                                                            {{ intval($discount) }}%
                                                        </span>
                                                    </div>
                                                @endif

                                                <div class="card-body productCard__body">
                                                    <h5 class="card-title productCard__title">
                                                        <a href="{{ route('products.details', $product->slug) }}">{{ $product->product_title }}</a>
                                                    </h5>
                                                    <div class="productCard__price">
                                                        @if ($product->discount_price == NULL)
                                                            <span class="price">
                                                                Rs {{ intval($product->selling_price) }}
                                                            </span>
                                                        @else
                                                            <span class="price">
                                                                Rs {{ intval($product->discount_price) }}
                                                            </span>
                                                            <span class="price-before-discount">
                                                                Rs {{ intval($product->selling_price) }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="productCard__btn">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                    id="{{ $product->slug }}" data-toggle="modal"
                                                                    data-target="#cartmodal" title="Add Cart"
                                                                    onclick="productview(this.id)"><i
                                                                    class="fa fa-shopping-cart"></i></button>

                                                            <form action="javascript:void(0)" method="POST">
                                                                <button
                                                                    class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                    data-id="{{ $product->id }}" title="Add Wishlist"><i
                                                                        class="fa fa-heart-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                {{-- End Products --}}

                {{-- Best Seller --}}
                @if ($bestSellers->count() > 0)
                    <section class="product spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Best Seller
                                <a href="{{ route('products.bestseller') }}" class="btn btn-sm btn-success">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="row product-slider">
                                    @foreach ($bestSellers as $product)
                                        <div class="col-12">
                                            <div class="card ProductCard">
                                                <a href="{{ route('products.details', $product->slug) }}">
                                                    <img src="{{ asset($product->image_one) }}"
                                                         class="card-img-top productCard__img"
                                                         alt="{{ $product->product_title }}">
                                                </a>
                                                <div class="ProductCard__label bg-info">
                                                    @if ($product->discount_price == NULL)
                                                        <span>Top</span>
                                                    @else
                                                        <span>
                                                            @php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = $amount/$product->selling_price*100;
                                                            @endphp
                                                            {{ intval($discount) }}%
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="card-body productCard__body">
                                                    <h5 class="card-title productCard__title">
                                                        <a href="{{ route('products.details', $product->slug) }}">{{ $product->product_title }}</a>
                                                    </h5>
                                                    <div class="productCard__price">
                                                        @if ($product->discount_price == NULL)
                                                            <span class="price">
                                                                Rs {{ intval($product->selling_price) }}
                                                            </span>
                                                        @else
                                                            <span class="price">
                                                                Rs {{ intval($product->discount_price) }}
                                                            </span>
                                                            <span class="price-before-discount">
                                                                Rs {{ intval($product->selling_price) }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="productCard__btn">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                    id="{{ $product->slug }}" data-toggle="modal"
                                                                    data-target="#cartmodal" title="Add Cart"
                                                                    onclick="productview(this.id)"><i
                                                                    class="fa fa-shopping-cart"></i></button>

                                                            <form action="javascript:void(0)" method="POST">
                                                                <button
                                                                    class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                    data-id="{{ $product->id }}" title="Add Wishlist"><i
                                                                        class="fa fa-heart-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                {{-- End Best Seller --}}

                {{-- Trand --}}
                @if ($trand->count() > 0)
                    <section class="product spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Trend
                                <a href="{{ route('products.trand') }}" class="btn btn-sm btn-success">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="row product-slider">
                                    @foreach ($trand as $product)
                                        <div class="col-12">
                                            <div class="card ProductCard">
                                                <a href="{{ route('products.details', $product->slug) }}">
                                                    <img src="{{ asset($product->image_one) }}"
                                                         class="card-img-top productCard__img"
                                                         alt="{{ $product->product_title }}">
                                                </a>
                                                <div class="ProductCard__label bg-secondary">
                                                    @if ($product->discount_price == NULL)
                                                        <span>Trend</span>
                                                    @else
                                                        <span>
                                                            @php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = $amount/$product->selling_price*100;
                                                            @endphp
                                                            {{ intval($discount) }}%
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="card-body productCard__body">
                                                    <h5 class="card-title productCard__title">
                                                        <a href="#">{{ $product->product_title }}</a>
                                                    </h5>
                                                    <div class="productCard__price">
                                                        @if ($product->discount_price == NULL)
                                                            <span class="price">
                                                                Rs {{ intval($product->selling_price) }}
                                                            </span>
                                                        @else
                                                            <span class="price">
                                                                Rs {{ intval($product->discount_price) }}
                                                            </span>
                                                            <span class="price-before-discount">
                                                                Rs {{ intval($product->selling_price) }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="productCard__btn">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                    id="{{ $product->slug }}" data-toggle="modal"
                                                                    data-target="#cartmodal" title="Add Cart"
                                                                    onclick="productview(this.id)"><i
                                                                    class="fa fa-shopping-cart"></i></button>

                                                            <form action="javascript:void(0)" method="POST">
                                                                <button
                                                                    class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                    data-id="{{ $product->id }}" title="Add Wishlist"><i
                                                                        class="fa fa-heart-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                {{-- End Trand --}}

                {{-- Blog --}}
                @if ($posts->count() > 0)
                    <section class="blog spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                Blogs
                                <a href="{{ route('blog.posts') }}" class="btn btn-sm btn-success">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="row blog-slider">
                                    @foreach ($posts as $post)
                                        <div class="col-md-12">
                                            <div class="blog__single__latest">
                                                <a href="{{ route('blog.single', $post->slug) }}">
                                                    <img src="{{ asset($post->image) }}"
                                                         alt="{{ $post->title_en }}">
                                                </a>
                                                <div class="blog__single__latest__text p-2">
                                                    <div class="blog__single__latest__text__tag">
                                                        <div class="blog__single__latest__text__tag__item">
                                                            <i class="fa fa-calendar-o"></i>
                                                            {{ $post->created_at->format('F d, Y') }}
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('blog.single', $post->slug) }}">
                                                        <h4>{{ $post->title_en }}</h4></a>
                                                    <p>{!! Str::limit($post->description_en, 80) !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                {{-- End Blog --}}

                {{-- New Arraivals --}}
                @if ($newArrival->count() > 0)
                    <section class="product spad">
                        <div class="card customCard">
                            <div class="card-header customCard__header">
                                new Arrival
                                <a href="{{ route('products.newarrival') }}" class="btn btn-sm btn-success">View All</a>
                            </div>
                            <div class="card-body">
                                <div class="row product-slider">
                                    @foreach ($newArrival as $product)
                                        <div class="col-12">
                                            <div class="card ProductCard">
                                                <a href="{{ route('products.details', $product->slug) }}">
                                                    <img src="{{ asset($product->image_one) }}"
                                                         class="card-img-top productCard__img"
                                                         alt="{{ $product->product_title }}">
                                                </a>
                                                <div class="ProductCard__label bg-primary">
                                                    @if ($product->discount_price == NULL)
                                                        <span>New</span>
                                                    @else
                                                        <span>
                                                            @php
                                                                $amount = $product->selling_price - $product->discount_price;
                                                                $discount = $amount/$product->selling_price*100;
                                                            @endphp
                                                            {{ intval($discount) }}%
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="card-body productCard__body">
                                                    <h5 class="card-title productCard__title">
                                                        <a href="{{ route('products.details', $product->slug) }}">{{ $product->product_title }}</a>
                                                    </h5>
                                                    <div class="productCard__price">
                                                        @if ($product->discount_price == NULL)
                                                            <span class="price">
                                                                Rs {{ intval($product->selling_price) }}
                                                            </span>
                                                        @else
                                                            <span class="price">
                                                                Rs {{ intval($product->discount_price) }}
                                                            </span>
                                                            <span class="price-before-discount">
                                                                Rs {{ intval($product->selling_price) }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="productCard__btn">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="cartSubmit btn btn-sm btn-success btn-wish"
                                                                    id="{{ $product->slug }}" data-toggle="modal"
                                                                    data-target="#cartmodal" title="Add Cart"
                                                                    onclick="productview(this.id)"><i
                                                                    class="fa fa-shopping-cart"></i></button>

                                                            <form action="javascript:void(0)" method="POST">
                                                                <button
                                                                    class="wishlistSubmit btn btn-sm btn-success btn-wish"
                                                                    data-id="{{ $product->id }}" title="Add Wishlist"><i
                                                                        class="fa fa-heart-o"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                {{-- End New Arraivals --}}
            </div>
        </div>
    </div>
    {{-- End Container --}}

    <!-- Modal -->
    <x-cart></x-cart>

    {{-- Partner Logo --}}
    @if ($brands->count() > 0)
        <div class="partner">
            <div class="container">
                <div class="row partner-slider">
                    @foreach ($brands as $brand)
                        <div class="col-md-12">
                            <a href="#" class="partner__logo">
                                <img src="{{ asset($brand->logo) }}" alt="Parner Logo">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    {{-- End Partner Logo --}}

    <script>
        // Add To Wishlist
        $(document).ready(function () {
            $('.wishlistSubmit').on('click', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                if (id) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('add.wishlist') }}",
                        method: 'post',
                        data: {
                            id: id,
                        },
                        success: function (data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }
                        },
                    });
                } else {
                    alert('Danger...!');
                }
            });
        });

        function productview(slug) {
            var url = '{{ route("products.queck", ":slug") }}';
            url = url.replace(':slug', slug);
            var postUrl = '{{ route("products.details", ":slug") }}';
            postUrl = postUrl.replace(':slug', slug);
            $.ajax({
                url: url,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('#productImage').attr('src', data.product.image_one);
                    $('#productCategory').text(data.product.category.name);
                    $('#productSubcategory').text(data.product.subcategory.name);
                    $('#productName').text(data.product.product_title);
                    $('#productBrand').text(data.product.brand.name);
                    $('#productUrl').attr('action', postUrl);

                    if (data.product.discount_price == null) {
                        $('#productPrice').text(data.product.selling_price);
                    } else {
                        $('#productPrice').text(data.product.discount_price);
                    }

                    var d = $('select[name="color"]').empty();
                    $.each(data.product_color, function (key, value) {
                        $('select[name="color"]').append('<option value="' + value + '">' + value + '</option>');
                    });

                    var d = $('select[name="size"]').empty();
                    $.each(data.product_size, function (key, value) {
                        $('select[name="size"]').append('<option value="' + value + '">' + value + '</option>');
                    });
                }
            })
        }
    </script>
@endsection
