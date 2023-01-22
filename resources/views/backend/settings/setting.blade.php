@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'setting')

@section('pagename', 'Setting')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Setting</h6>
        <div class="card-body bg-gray-200">
            {{ Form::open(['route' => ['settings.update', $setting->id], 'method' => 'PUT']) }}
                <div class="row mg-b-25">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('vat', 'Vat',['class' => 'form-control-label']) }}
                            {{ Form::text('vat', $setting->vat, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('shipping_charge', 'Shipping Charge',['class' => 'form-control-label']) }}
                            {{ Form::text('shipping_charge', $setting->shipping_charge, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Update</button>
                </div>
            {{ Form::close() }}
        </div><!-- card -->

    </div><!-- card -->

@endsection
