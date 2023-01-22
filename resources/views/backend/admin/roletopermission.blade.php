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
                    {{ Form::open(['route' => 'role.givepermissionto']) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Role', ['class' => 'form-control-label']) }}
                            <h2>{{ $role->name }}</h2>
                            <input type="hidden" name="role_name" value="{{ $role->name }}">
                        </div>

                        <div class="form-group">
                            {{ Form::label('permission_name', 'Select Role', ['class' => 'form-control-label']) }}
                            <select name="permission_name" id="permission_name" class="form-control select2">
                                @foreach ($permissions as $permission)
                                    <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                @endforeach
                            </select>
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
