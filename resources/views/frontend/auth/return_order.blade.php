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
                        Your delivery order lists
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
                                        <th scope="col">Action</th>
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
                                            <td>
                                                @if ($order->return_status == 0)
                                                    <a href="{{ route('return.request', $order->status_code) }}" class="btn btn-sm btn-danger" id="return">Return</a>
                                                @elseif($order->return_status == 1)
                                                    <span class="badge badge-info">Panding</span>
                                                @elseif($order->return_status == 2)
                                                    <span class="badge badge-warning">
                                                        Product Returned
                                                    </span>
                                                @elseif($order->return_status == 3)
                                                    <span class="badge badge-danger">
                                                        Product Return Request Cancel
                                                    </span>
                                                @endif
                                            </td>
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

@endsection
