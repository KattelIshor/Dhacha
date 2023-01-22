@extends('backend.layouts.layout')

@section('title', 'Profile')

@section('pagename', 'Profile')

@section('content')

    <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Edit Profile</h6>
        <p class="mg-b-20 mg-sm-b-30">You can change your profile</p>

        @include('backend.partials._message')

        <div class="row mg-b-20">
            <div class="col-md-6">
                <h6 class="card-body-title">Change password</h6>
                <div class="card card-body bg-gray-200">
                    <form action="{{ route('change.password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label">Current Password: </label>
                            <input class="form-control mb-2" type="password" name="current_password" placeholder="Enter your current password">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">New Password: </label>
                            <input class="form-control mb-2" type="password" name="password" placeholder="Enter your new password">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Retype Password: </label>
                            <input class="form-control mb-2" type="password" name="password_confirmation" placeholder="Enter retype your password">
                        </div>

                        <div class="form-layout-footer">
                            <button type="submit" class="btn btn-info mg-r-5">Save</button>
                        </div>
                    </form>
                </div><!-- card -->
            </div><!-- col -->
        </div><!-- row -->
    </div><!-- card -->

@endsection
