@extends('backend.layouts.layout')

@section('title', 'Profile')

@section('pagename', 'Profile')

@section('content')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Update Profile</h6>
        <p class="mg-b-20 mg-sm-b-30">Admin roles permission and update informations.</p>

        @include('backend.partials._message')

        <div class="row mg-b-20">
            <div class="col-md-6">
                <div class="card card-body bg-gray-200">
                    {{ Form::open(['route' => ['admins.update', $admin->id], 'method' => 'PUT']) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name', ['class' => 'form-control-label']) }}
                            {{ Form::text('name', $admin->name, ['class' => 'form-control','id' => 'name', 'placeholder' => 'Name']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'E-mail', ['class' => 'form-control-label']) }}
                            {{ Form::email('email', $admin->email, ['class' => 'form-control','id' => 'email', 'placeholder' => 'Enter mail']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('role_name', 'Select Role', ['class' => 'form-control-label']) }}
                            <select name="role_name" id="role_name" class="form-control select2">
                                <option value="">-- Select Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Password', ['class' => 'form-control-label']) }}
                            {{ Form::password('password', ['class' => 'form-control','id' => 'password', 'placeholder' => 'Password']) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Confirm Password', ['class' => 'form-control-label']) }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control','id' => 'password_confirmation', 'placeholder' => 'Confirm Password']) }}
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Update</button>
                        </div>
                    {{ Form::close() }}
                </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- card -->

@endsection
