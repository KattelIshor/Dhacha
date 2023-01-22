@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

<div class="container mt-5 mb-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                @include('frontend.partials.profile-sidebar')
            </div>
            <div class="col-md-8">
                <div class="card customCard mb-3">
                    <div class="card-header customCard__header">
                        Your Order Lists
                        <a href="javascript:void(0)" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modaldemo2">
                            Track Order
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover tablr-border">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->status_code }}</td>
                                            <td>{{ $order->payment_type }}</td>
                                            <td>
                                                @if ($order->status_op == 0)
                                                    <span class="badge badge-warning">Pending</span>

                                                @elseif($order->status_op == 1)
                                                    <span class="badge badge-info">Payment Accept</span>

                                                @elseif($order->status_op == 2)
                                                    <span class="badge badge-warning">Proccess to delivery</span>

                                                @elseif($order->status_op == 3)
                                                    <span class="badge badge-success">Delevered</span>

                                                @else
                                                    <span class="badge badge-danger">Cencel</span>

                                                @endif
                                            </td>
                                            <td>{{ $order->created_at->format('F d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- Category Insert Modal --}}
    <x-insert>
        <x-slot name="title">
            Search Product
        </x-slot>

        <x-slot name="form">
            {{ Form::open(['route' => 'order.tracking']) }}
        </x-slot>

        <x-slot name="body">
            <div class="form-group">
                {{ Form::label('order_id', 'Order Id', ['class' => 'form-control-label']) }}
                {{ Form::text('order_id', null, ['class' => 'form-control','id' => 'order_id', 'placeholder' => 'Enter Order ID']) }}
            </div>
        </x-slot>
    </x-insert>
    {{-- End Category Insert Modal --}}

@endsection
