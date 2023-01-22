@extends('backend.layouts.layout')

@section('before-head', 'backend/lib/datatables/jquery.dataTables.css')

@section('title', 'site-setting')

@section('pagename', 'Site Setting')

@section('content')

    @include('backend.partials._message')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Site Setting</h6>
        <div class="card-body bg-gray-200">
            {{ Form::open(['route' => ['site-settings.update', $siteSetting->id], 'method' => 'PUT']) }}
                <div class="row mg-b-25">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('company_name', 'Company Name',['class' => 'form-control-label']) }}
                            {{ Form::text('company_name', $siteSetting->company_name, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('email', 'E-mail',['class' => 'form-control-label']) }}
                            {{ Form::text('email', $siteSetting->email, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone Number',['class' => 'form-control-label']) }}
                            {{ Form::text('phone', $siteSetting->phone, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('company_address', 'Company Address',['class' => 'form-control-label']) }}
                            {{ Form::text('company_address', $siteSetting->company_address, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('facebook', 'Facebook Link',['class' => 'form-control-label']) }}
                            {{ Form::text('facebook', $siteSetting->facebook, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('tiktok', 'Tiktok Link',['class' => 'form-control-label']) }}
                            {{ Form::text('tiktok', $siteSetting->youtube, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('instagram', 'Instagram Link',['class' => 'form-control-label']) }}
                            {{ Form::text('instagram', $siteSetting->instagram, ['class' => 'form-control mb-2']) }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('whatsapp', 'WhatsappLink',['class' => 'form-control-label']) }}
                            {{ Form::text('Whatsapp', $siteSetting->pinterest, ['class' => 'form-control mb-2']) }}
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
