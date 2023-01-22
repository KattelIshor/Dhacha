<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- Include Toaster-js --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toaster.min.css') }}">
    <script type="text/javascript" src="{{ asset('js/jquery-5.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/toaster.min.js') }}"></script>

    <script>
        toastr.options = {
            "closeButton": true,
        }
    </script>

    {{-- Stripe Online Payment --}}
    <script src="https://js.stripe.com/v3/"></script>

</head>
<body>

    @include('frontend.partials.header')

    {{-- Main --}}
    <main role="main">

        @yield('content')

        @include('frontend.partials.footer')
    </main>
    {{--End Main --}}

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
