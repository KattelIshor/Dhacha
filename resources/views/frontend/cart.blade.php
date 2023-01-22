@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

    <section class="product-cart spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Shopping Cart Product
                </div>
                <div class="card-body">
                    @if ($shopcarts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Item</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($shopcarts as $item)
                                    <tr>
                                        <td>
                                            <div class="item-img">
                                                <img src="{{ asset($item->options->image) }}" alt="{{ $item->name }}">
                                            </div>
                                            <div class="item-detail">
                                                <h6>{{ $item->name }}</h6>
                                                @if ($item->options->color)
                                                    <span>Color: {{ $item->options->color }}</span>
                                                @endif
                                                @if ($item->options->size)
                                                    <span>Size: {{ $item->options->size }}</span>
                                                @endif
                                                <p>Rs{{ $item->price }}</p>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('update.cartitem') }}" method="POST">
                                                @csrf
                                                <div class="input-group mb-3 btn-qty">
                                                    <input type="hidden" name="productId" value="{{ $item->rowId }}">
                                                    <input type="number" class="form-control" min="1" max="10" value="{{ $item->qty }}" name="qty">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-success input-group-text" id="basic-addon2"><i class="fa fa-check-square"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            {{ Form::open(['route' => ['remove.cart', $item->rowId], 'method' => 'DELETE']) }}
                                                <button type="submit" class="btn btn-sm btn-danger mt-1 btn-action">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            {{ Form::close() }}
                                        </td>
                                        <td>Rs {{ $item->price*$item->qty }}</td>
                                    </tr>
                                @endforeach
                                    <tr class="total-bg">
                                        <td></td>
                                        <td></td>
                                        <td>Total</td>
                                        <td>
                                            Rs{{ Cart::subtotal() }}
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('checkout') }}" class="btn btn-success pull-right btn-checkout">Checkout</a>

                    @else
                        <div class="alert alert-primary" role="alert">
                            Product not here in cart
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

@endsection
