@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'return-request')

@section('pagename', 'Return Request')

@section('content')

    @include('backend.partials._message')

    <div class="row">
        <div class="col-md-12">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Return Request Pandding List</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Order Id</th>
                                <th class="wd-15p">Customer Name</th>
                                <th class="wd-15p">Total</th>
                                <th class="wd-15p">Status</th>
                                <th class="wd-20p">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->status_code }}</td>
                                    <td>{{ $order->user->name }} </td>
                                    <td>{{ $order->total }}</td>
                                    <td>
                                        @if ($order->return_status == 1)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($order->return_status == 2)
                                            <span class="badge badge-success">Request Accept</span>
                                        @elseif($order->return_status == 3)
                                            <span class="badge badge-success">Request Cancel</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('return.request.view', $order->id) }}" class="btn btn-sm btn-info">View</a>
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
        </div>
    </div>

    {{-- For Dashboard operations --}}
    <script src="{{ mix('js/dashboard.js') }}"></script>
@endsection
