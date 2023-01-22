@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

    <section class="blog spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    {{ Request::segment(2) }}
                </div>
                <div class="card-body">
                    @if ($products->count() > 0)
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4 col-xl-3">
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
                                                        rs {{ intval($product->discount_price) }}
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
                                                        <button class="wishlistSubmit btn btn-sm btn-success btn-wish"
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
                    @else
                        <div class="alert alert-primary" role="alert">
                            {{ $title }} product not found
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $products->links() }}
        </div>
    </section>

    <!-- Modal -->
    <x-cart></x-cart>

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
                    $('#productImage').attr('src', window.location.origin + '/' + data.product.image_one);
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

