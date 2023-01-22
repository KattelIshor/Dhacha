@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

    <section class="product-cart spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Your product wishlist
                </div>
                <div class="card-body">
                    @if ($wishlist->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlist as $item)
                                    <tr>
                                        <td>
                                            <div class="item-img">
                                                <a href="{{ route('products.details', $item->product->slug) }}">
                                                    <img src="{{ asset($item->product->image_one) }}" alt="{{ $item->product->product_title }}">
                                                </a>
                                            </div>
                                            <div class="item-detail">
                                                <h6>
                                                    <a href="{{ route('products.details', $item->product->slug) }}">
                                                        {{ $item->product->product_title }}
                                                    </a>
                                                </h6>
                                                @if ($item->product->discount_price == null)
                                                    <p>Rs{{ $item->product->selling_price }}</p>
                                                @else
                                                    <p>Rs{{ $item->product->discount_price }}</p>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            {{ Form::open(['route' => ['remove.wishlist', $item->id], 'method' => 'DELETE']) }}
                                                <button type="submit" class="btn btn-sm btn-danger mt-1 btn-action">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            {{ Form::close() }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else
                        <div class="alert alert-primary" role="alert">
                            Product not here in wishlist
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center my-4">
            {{ $wishlist->links() }}
        </div>
    </section>

@endsection
