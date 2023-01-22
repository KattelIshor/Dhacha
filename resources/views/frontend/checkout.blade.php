@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

    @php
        $vat = $setting->vat;
        $shipping_charge = $setting->shipping_charge;
    @endphp

    <section class="checkout spad">
        <div class="container">
            <div class="card customCard">
                <div class="card-header customCard__header">
                    Checkout
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 order-md-2 mb-4">
                            <h4 class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-muted">Your cart</span>
                                <span class="badge badge-success badge-pill">
                                    {{ $cart->count() }}
                                </span>
                            </h4>
                            <ul class="list-group mb-3 checkout-list-group">
                                @foreach ($cart as $product)
                                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                                        <div>
                                            <h6 class="my-0">{{ $product->name }}</h6>
                                            <small class="text-muted">Quantity: {{ $product->qty }}</small>
                                        </div>
                                        <span class="text-muted">Rs{{ $product->price*$product->qty }}</span>
                                    </li>
                                @endforeach
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Shipping Charge</h6>
                                    </div>
                                    <span class="text-muted">Rs{{ $shipping_charge }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between lh-condensed">
                                    <div>
                                        <h6 class="my-0">Vat</h6>
                                    </div>
                                    <span class="text-muted">Rs{{ $vat }}</span>
                                </li>

                                @if (Session::has('coupon'))
                                    <li class="list-group-item d-flex justify-content-between bg-light">
                                        <div class="text-success">
                                            <h6 class="my-0">Promo code</h6>
                                            <small style="text-transform: uppercase">
                                                {{ Session::get('coupon')['name'] }}
                                            </small>
                                        </div>
                                        <span class="text-success">
                                            -Rs{{ Session::get('coupon')['discount'] }}
                                        </span>
                                    </li>
                                @endif

                                <li class="list-group-item d-flex justify-content-between">
                                    <span>Total (NRP)</span>
                                    @if (Session::has('coupon'))
                                        <strong>
                                            Rs{{ Session::get('coupon')['balance'] + $shipping_charge + $vat}}
                                        </strong>
                                    @else
                                        <strong>Rs{{ Cart::subtotal() + $shipping_charge + $vat}}</strong>
                                    @endif
                                </li>
                            </ul>

                            @if (!Session::has('coupon'))
                                {{ Form::open(['route' => 'apply.coupon', 'class' => 'card p-2']) }}
                                    <div class="input-group">
                                        {{ Form::text('coupon', null, ['class' => 'form-control', 'placeholder' => 'Promo code']) }}
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success">Redeem</button>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                            @endif
                        </div>
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Billing address</h4>
                            {{ Form::open(['route' => 'payment.proccess', 'class' => 'needs-validation']) }}
                                <div class="mb-3">
                                    {{ Form::label('name', 'Name') }}
                                    <div class="input-group">
                                        {{ Form::text('name',null,['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Full Name']) }}
                                    </div>
                                </div>

                                <div class="mb-3">
                                    {{ Form::label('email', 'Email') }}
                                    {{ Form::email('email',null,['class' => 'form-control', 'id' => 'email', 'placeholder' => 'you@example.com']) }}
                                </div>

                                <div class="mb-3">
                                    {{ Form::label('phone', 'Phone') }}
                                    {{ Form::text('phone',null,['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Your phone number']) }}
                                </div>

                                <div class="mb-3">
                                    {{ Form::label('address', 'Address') }}
                                    {{ Form::text('address',null,['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Your Address']) }}
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        {{ Form::label('province', 'Province') }}
                                        {{ Form::select('province', [
                                            
                                            'province no.1'=> 'Province no.1',
                                               'madesh'=>  'Madesh',
                                              'bagmati'=> 'Bagmati',
                                               'gandaki'=> 'Gandaki',
                                                  'lumbini'=> 'Lumbini',
                                                 'karnali'=>'Karnali',
                                                  'mahakali'=> 'Mahakali'
                                        ],null,
                                        [
                                            'class' => 'custom-select d-block w-100',
                                            'id' => 'city'
                                        ]
                                        ) }}
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        {{ Form::label('post_code', 'Post Code') }}
                                        {{ Form::text('post_code',null,['class' => 'form-control', 'id' => 'post_code', 'placeholder' => 'Your post code']) }}
                                    </div>
                                </div>

                                <hr class="mb-4">
                                <h4 class="mb-3">Payment</h4>

                                <div class="my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="stripe" checked required>
                                        {{ Form::label('credit', 'Esewa',['class' => 'custom-control-label']) }}
                                        {{-- <label class="custom-control-label" for="credit">Esewa</label> --}}
                                    </div>
                                 
                                    <div class="custom-control custom-radio">
                                        <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="cashon" required>
                                        {{ Form::label('debit', 'Cash On Delivery',['class' => 'custom-control-label']) }}
                                    </div>
                                </div>
                                <hr class="mb-4">
                                {{  Form::submit('Continue to checkout',['class' => 'btn btn-primary btn-lg btn-block']) }}
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
