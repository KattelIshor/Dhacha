<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Dhacha @section('title', 'Admin Login')</title>

    <!-- vendor css -->
    <link href="{{ asset('backend/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/starlight.css') }}">

    {{-- Include Toaster-js --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toaster.min.css') }}">
    <script src="{{ asset('js/jquery-5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/toaster.min.js') }}"></script>

    <style>
        .cursor-pointer {
            cursor: pointer;
        }
    </style>

    <script>
        toastr.options = {
            "closeButton": true,
        }
    </script>
</head>

<body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
        {{ Form::open(['route' => 'admin.login']) }}
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
                <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">
                   Dhacha <span class="tx-info tx-normal">admin</span>
                </div>

                <div class="tx-center mg-b-60">Dhacha Admin Panel</div>

                @include('backend.partials._message')

                <div class="form-group">
                    {{ Form::email('email', null,['class' => 'form-control', 'placeholder' => 'Enter your email']) }}
                </div><!-- form-group -->

                <div class="form-group">
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter your password']) }}
                </div><!-- form-group -->

                <div class="form-group">
                    {{ Form::label(null, null, ['class' => 'ckbox']) }}
                    {{ Form::checkbox('remember', null) }} <span>Remember me</span>
                </div><!-- form-group -->

                {{ Form::submit('Sign In',['class' => 'btn btn-info btn-block cursor-pointer']) }}
            </div>
        {{ Form::close() }}
    </div><!-- d-flex -->

    <script src="{{ asset('backend/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset('backend/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset('backend/lib/bootstrap/bootstrap.js') }}"></script>

</body>

</html>
