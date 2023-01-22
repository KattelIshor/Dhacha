@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'coupons')

@section('pagename', 'Coupons')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Coupons Table
            <a href="javascript:void(0)" class="btn btn-sm btn-primary mg-b-10 float-right" data-toggle="modal" data-target="#modaldemo2">
                 Add New <i class="fa fa-plus mg-r-10"></i>
            </a>
        </h6>

        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
                <thead>
                    <tr>
                        <th class="wd-5p">Id</th>
                        <th class="wd-15p">Coupon</th>
                        <th class="wd-15p">Discount</th>
                        <th class="wd-20p">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $key => $coupon)
                        <tr>
                            <td>{{ $coupons->firstitem() + $key }}</td>
                            <td>{{ $coupon->coupon }}</td>
                            <td>{{ $coupon->discount }}</td>
                            <td>
                                <a href="javascript:void(0)" title="Delete" class="btn btn-sm btn-danger delete-category" data-toggle="modal" data-target="#modaldemo1" data-url="{{ url('admin/coupons/'.$coupon->id) }}">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $coupons->links() }}
            </div>

        </div><!-- table-wrapper -->
    </div><!-- card -->

    {{-- Category Insert Modal --}}
    <x-insert>
        <x-slot name="title">
            Add a new coupon
        </x-slot>

        <x-slot name="form">
            {{ Form::open(['route' => 'coupons.store']) }}
        </x-slot>

        <x-slot name="body">
            <div class="form-group">
                {{ Form::label('coupon', 'Coupon', ['class' => 'form-control-label']) }}
                {{ Form::text('coupon', null, ['class' => 'form-control','id' => 'coupon', 'placeholder' => 'Coupon']) }}
            </div>

            <div class="form-group">
                {{ Form::label('discount', 'Discount', ['class' => 'form-control-label']) }}
                {{ Form::number('discount', null, ['class' => 'form-control','id' => 'discount', 'placeholder' => 'Discount']) }}
            </div>
        </x-slot>
    </x-insert>
    {{-- End Category Insert Modal --}}

    <!-- Delete Modal -->
    <x-delete>
        <x-slot name="form">
            {{ Form::open(['method' => 'DELETE', 'id' => 'deleteForm']) }}
        </x-slot>
    </x-delete>
    <!--End Delete Modal -->

    {{-- For Dashboard operations --}}
    <script src="{{ mix('js/dashboard.js') }}"></script>
@endsection
