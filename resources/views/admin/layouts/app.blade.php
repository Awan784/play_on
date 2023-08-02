<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bahes Tech Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/custom/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/plugins/animation/animation.min.css') }}">

    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/plugins/datatable/datatable.min.css') }}">

    <!-- Toaster -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @stack('style-page-level')
</head>

<body>
    <div class="main-wrapper" id="app">
        <!-- ---------NAVBAR--------- -->
        @include('admin.common.navbar')
        <!-- -------NAVBAR END------ -->
        <!-- -------SIDEBAR START------- -->
        @include('admin.common.sidebar')
        <!-- -------SIDEBAR END------- -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- -------FOOTER START------- -->
        @include('admin.common.footer')
        <!-- -------FOOTER END------- -->
    </div>

    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/chart/chart.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/custom/custom.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatable/datatable.min.js') }}"></script>
    {{--    <script src="{{ asset('assets/admin/plugins/datatable/simple-datatables.min.js') }}"></script> --}}
    <script src="{{ asset('assets/admin/plugins/datatable/datatable_bootstrap5.min.js') }}"></script>

    <script src="{{ asset('assets/admin/custom/api.js') }}"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
        // let table = document.querySelector('#dataTable');
        // let dataTable = new simpleDatatables.DataTable(table);
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'baseUrl' => url('/') . '/admin/',
            'apiUrl' => url('/') . '/api/',
            'session_id' => session()->getId(),
        ]) !!};
        $(document).ready(function() {
            // $('#dataTable').DataTable({
            //     destroy: true,
            //     processing: true,
            //     select: true,
            //     paging: true,
            //     lengthChange: true,
            //     "lengthMenu": [[13, 25, 50, -1], [13, 25, 50, "All"]],
            //     searching: true,
            //     "order": [],
            //     info: false,
            //     responsive: true,
            //     autoWidth: false
            // });
            $('#dataTable').DataTable();
            toastr.options = {
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                // "rtl": isEnableRtl,
                "closeButton": true
            }
            if ("{!! session()->has('success') !!}") {
                toastr.success("{!! session()->get('success') !!}", 'Success')
            }
            if ("{!! session()->has('error') !!}") {
                toastr.error("{!! session()->get('error') !!}", 'Error')
            }
            if ("{!! session()->has('info') !!}") {
                toastr.info("{!! session()->get('info') !!}", 'Info')
            }
            if ("{!! session()->has('warning') !!}") {
                toastr.warning("{!! session()->get('warning') !!}", 'Warning')
            }
        })
    </script>
    
    @stack('script-page-level')
</body>

</html>

{{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"> --}}
{{--            <div class="container"> --}}
{{--                <a class="navbar-brand" href="{{ url('/') }}"> --}}
{{--                    {{ config('app.name', 'Laravel') }} --}}
{{--                </a> --}}
{{--                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"> --}}
{{--                    <span class="navbar-toggler-icon"></span> --}}
{{--                </button> --}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
{{--                    <!-- Left Side Of Navbar --> --}}
{{--                    <ul class="navbar-nav me-auto"> --}}

{{--                    </ul> --}}

{{--                    <!-- Right Side Of Navbar --> --}}
{{--                    <ul class="navbar-nav ms-auto"> --}}
{{--                        <!-- Authentication Links --> --}}
{{--                        @guest --}}
{{--                            @if (Route::has('admin.login')) --}}
{{--                                <li class="nav-item"> --}}
{{--                                    <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a> --}}
{{--                                </li> --}}
{{--                            @endif --}}

{{--                            @if (Route::has('admin.register')) --}}
{{--                                <li class="nav-item"> --}}
{{--                                    <a class="nav-link" href="{{ route('admin.register') }}">{{ __('Register') }}</a> --}}
{{--                                </li> --}}
{{--                            @endif --}}
{{--                        @else --}}
{{--                            <li class="nav-item dropdown"> --}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> --}}
{{--                                    {{ Auth::user()->name }} --}}
{{--                                </a> --}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
{{--                                    <a class="dropdown-item" href="{{ route('admin.logout') }}" --}}
{{--                                       onclick="event.preventDefault(); --}}
{{--                                                     document.getElementById('logout-form').submit();"> --}}
{{--                                        {{ __('Logout') }} --}}
{{--                                    </a> --}}

{{--                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none"> --}}
{{--                                        @csrf --}}
{{--                                    </form> --}}
{{--                                </div> --}}
{{--                            </li> --}}
{{--                        @endguest --}}
{{--                    </ul> --}}
{{--                </div> --}}
{{--            </div> --}}
{{--        </nav> --}}
{{--        <main class="py-4"> --}}
{{--        </main> --}}
