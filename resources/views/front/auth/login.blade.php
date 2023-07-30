@extends('front.layouts.app')

@section('content')
    @if (session('success_msg'))
        <div class="alert alert-success m-3" role="alert" id="alert">
            <strong>Success! </strong>{{ session('success_msg') }}
        </div>
    @endif
    @if (session('error_msg'))
        <div class="alert alert-danger mt-2 mb-5" role="alert" id="alert">
            <strong>Error! </strong>{{ session('error_msg') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>

            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <!-- Demo content-->
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4">Log in</h3>
                                <p class="text-muted mb-4">Play ON</p>
                                <form method="post" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input id="inputEmail" name="email" type="email" placeholder="Email address"
                                            required="" autofocus=""
                                            class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="inputPassword" name="password" type="password" placeholder="Password"
                                            required=""
                                            class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    {{-- <div class="form-check mb-3">
                                        <input id="player" name="user_type" type="radio" class="form-check-input"
                                            value="player" checked>
                                        <label for="player" class="form-check-label">Player</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input id="manager" name="user_type" type="radio" class="form-check-input"
                                            value="manager">
                                        <label for="manager" class="form-check-label">Manager</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input id="manager" name="user_type" type="radio" class="form-check-input"
                                            value="admin">
                                        <label for="manager" class="form-check-label">Admin</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" type="checkbox" class="custom-control-input">
                                        <label for="customCheck1" class="custom-control-label">Remember
                                            password</label>
                                    </div> --}}
                                    <button type="submit"
                                        class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Sign
                                        in</button>
                                    <div class="text-center d-flex justify-content-between mt-4">
                                        <p>Not a member?<a href="{{ route('register.type') }}"
                                                class="font-italic text-muted"><u>Register</u></a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
