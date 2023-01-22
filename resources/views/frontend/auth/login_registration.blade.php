@extends('frontend.layouts.master')

@section('content')

    @include('backend.partials._message')

    <section class="login">
        <div class="login__container">
            <div class="login__container__bg">
                <div class="box signin">
                    <h2>Already Have an Account</h2>
                    <button class="signinBtn">Sign in</button>
                </div>

                <div class="box signup">
                    <h2>Don't Have an Account</h2>
                    <button class="signupBtn">Sign up</button>
                </div>
            </div>

            <div class="login__container__formBx">
                <div class="form signinForm">
                    {{ Form::open(['route' => 'login']) }}
                        <h3>Sign In</h3>
                        {{ Form::email('email', null, ['placeholder' => 'Your E-mail']) }}
                        {{ Form::password('password', ['placeholder' => 'Password']) }}
                        {{ Form::submit('Login') }}
                        <a href="{{ route('forget.password.get') }}" class="forget">Forgot Password</a>
                    {{ Form::close() }}
                </div>

                <div class="form signupForm">
                    {{ Form::open(['route' => 'register']) }}
                        <h3>Sign Up</h3>
                        {{ Form::text('name', null, ['placeholder' => 'Your name']) }}
                        {{ Form::email('email', null, ['placeholder' => 'Email Address']) }}
                        {{ Form::text('phone_number', null, ['placeholder' => 'Phone number']) }}
                        {{ Form::password('password', ['placeholder' => 'Password']) }}
                        {{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password']) }}
                        {{ Form::submit('Register') }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </section>

@endsection
