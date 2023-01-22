@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'view-orders')

@section('pagename', 'View Orders')

@section('content')

    @include('backend.partials._message')

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Order Details</h6>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><strong>Order</strong> Details</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Name:</th>
                                    <th>{{ $order->user->name }}</th>
                                </tr>

                                <tr>
                                    <th>Phone:</th>
                                    <th>{{ $order->user->phone_number }}</th>
                                </tr>

                                <tr>
                                    <th>Payment type:</th>
                                    <th>{{ $order->payment_type }}</th>
                                </tr>

                                <tr>
                                    <th>Payment Id:</th>
                                    <th>
                                        @if ($order->blnc_transection)
                                            {{ $order->blnc_transection }}
                                        @endif

                                        @if ($order->transaction_id)
                                            {{ $order->transaction_id }}
                                        @endif
                                    </th>
                                </tr>

                                <tr>
                                    <th>Total:</th>
                                    <th>{{ $order->amount }}</th>
                                </tr>

                                <tr>
                                    <th>Date:</th>
                                    <th>{{ $order->created_at }}</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><strong>Sipping</strong> Details</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th>Name:</th>
                                    <th>{{ $shipping->ship_name }}</th>
                                </tr>

                                <tr>
                                    <th>Phone:</th>
                                    <th>{{ $shipping->ship_phone }}</th>
                                </tr>

                                <tr>
                                    <th>E-mail:</th>
                                    <th>{{ $shipping->ship_email }}</th>
                                </tr>

                                <tr>
                                    <th>Address</th>
                                    <th>{{ $shipping->ship_address }}</th>
                                </tr>

                                <tr>
                                    <th>City:</th>
                                    <th>{{ $shipping->ship_city }}</th>
                                </tr>

                                <tr>
                                    <th>Status</th>
                                    <th>
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
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card pd-20 pd-sm-40">
                        <h6 class="card-body-title">Product Details</h6>
                        <br>

                        <div class="table-wrapper">
                            <table class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Product Id</th>
                                        <th class="wd-15p">Product Name</th>
                                        <th class="wd-15p">Image</th>
                                        <th class="wd-15p">Color</th>
                                        <th class="wd-15p">Size</th>
                                        <th class="wd-15p">Quantity</th>
                                        <th class="wd-15p">Unit Price</th>
                                        <th class="wd-20p">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($details as $item)
                                        <tr>
                                            <td>{{ $item->product->product_code }}</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td>
                                                <img src="{{ URL::to($item->product->image_one) }}" height="50px" width="50px" alt="Product img">
                                            </td>
                                            <td>{{ $item->color }}</td>
                                            <td>{{ $item->size }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->singleprice }}</td>
                                            <td>{{ $item->totalprice }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->

                        @if ($order->status_op == 0)
                            {{ Form::open(['route' => ['order.accept', $order->id],'method' => 'PUT']) }}
                                {{ Form::submit('Order Accept', ['class' => 'btn btn-info mb-2 btn-block']) }}
                            {{ Form::close() }}

                            {{ Form::open(['route' => ['order.cancel', $order->id],'method' => 'PUT']) }}
                                {{ Form::submit('Order Cancel', ['class' => 'btn btn-danger btn-block']) }}
                            {{ Form::close() }}

                        @elseif($order->status_op == 1)
                            {{ Form::open(['route' => ['proccess.payment', $order->id],'method' => 'PUT']) }}
                                {{ Form::submit('Payment Accept', ['class' => 'btn btn-info mb-2 btn-block']) }}
                            {{ Form::close() }}

                        @elseif($order->status_op == 2)
                            {{ Form::open(['route' => ['delivery.done', $order->id],'method' => 'PUT']) }}
                                {{ Form::submit('Delevery Done', ['class' => 'btn btn-success mb-2 btn-block']) }}
                            {{ Form::close() }}

                        @elseif($order->status_op == 4)
                            <strong class="text-center">This order are not valid</strong>

                        @else
                            <strong class="text-center">This product are successfully deleverd</strong>

                        @endif

                    </div><!-- card -->
                </div>
            </div>

        </div>

@endsection
