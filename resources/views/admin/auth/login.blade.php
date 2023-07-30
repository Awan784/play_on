<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/custom/login.css') }}">
</head>
<body>
<section>
    <div class="color"></div>
    <div class="color"></div>
    <div class="color"></div>
    <div class="box">
        <div class="spuare" style="--i:0;"></div>
        <div class="spuare" style="--i:1;"></div>
        <div class="spuare" style="--i:2;"></div>
        <div class="spuare" style="--i:3;"></div>
        <div class="spuare" style="--i:4;"></div>
        <div class="container">
            <div class="form">
                <h2>Login Form</h2>
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="inputBox">
                        <input id="email" placeholder="Enter E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="inputBox">
                        <input id="password" placeholder="Enter Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Login">
                    </div>
                    <p class="forget">Forget Password ? <a href="{{ route('admin.password.request') }}">Click Here</a></p>
{{--                    <p class="forget">Don't Have an Account ? <a href="#">Sign up</a></p>--}}
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
