@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'pandding-orders')

@section('pagename', 'Pandding Orders')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Pandding Order List</h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-15p">Payment type</th>
                        <th class="wd-15p">Transaction ID</th>
                        <th class="wd-15p">Subtotal</th>
                        <th class="wd-15p">Shipping</th>
                        <th class="wd-15p">Total</th>
                        <th class="wd-15p">Date</th>
                        <th class="wd-15p">Status</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->payment_type }}</td>
                            <td>
                                @if ($order->blnc_transection)
                                    {{ $order->blnc_transection }}
                                @endif

                                @if ($order->transaction_id)
                                    {{ $order->transaction_id }}
                                @endif
                            </td>
                            <td>{{ $order->subtotal }} </td>
                            <td>{{ $order->shipping }} </td>
                            <td>{{ $order->amount }} </td>
                            <td>{{ $order->created_at }} </td>
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
                            <td>
                                <a href="{{ route('order.view', $order->id) }}" class="btn btn-sm btn-info">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $orders->links() }}
            </div>

        </div><!-- table-wrapper -->
    </div><!-- card -->

    {{-- For Dashboard operations --}}
    <script src="{{ mix('js/dashboard.js') }}"></script>
@endsection
