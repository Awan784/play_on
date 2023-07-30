<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('front/blood-drop.png') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script><!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="{{ asset('front/css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/register.css') }}" />
    <link href="{{ asset('front/css/playersignup.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/footer.css') }}">
    <link href="{{ asset('front/css/type.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/home.css') }}" rel="stylesheet">
    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}

    <!-- Include jQuery UI Timepicker Addon -->

    <script src="{{ asset('front/js/jquery.js') }}"></script>

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('front/css/jquery.datetimepicker.css') }}" />
    <script src="{{ asset('front/js/jquery.datetimepicker.full.min.js') }}"></script> --}}
</head>

<body>
    <div id="app">
        @if (!str_contains(url()->current(), 'login'))
            @include('front.component.header')
        @endif
        <main class="">
            @yield('content')
        </main>
        @if (!str_contains(url()->current(), 'login'))
            @include('front.component.footer')
        @endif
    </div>

</body>

</html>
