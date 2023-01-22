@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

<div class="container mt-5 mb-5">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                @include('frontend.partials.profile-sidebar')
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                        {{ Form::open(['route' => 'password.change']) }}
                            <div class="form-group">
                                {{ Form::password('oldPassword', ['class' => 'form-control', 'placeholder' => 'Old Password']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'New Password']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
