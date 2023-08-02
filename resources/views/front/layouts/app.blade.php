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

    <script src="{{ asset('front/js/jquery.js') }}"></script>
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
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

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

    <!-- Toaster -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">
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
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<link href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>
{{-- <script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script> --}}
{{-- <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script> --}}
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
        // $('#dataTable').DataTable();
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
        // toastr.success("asdasdasdas", 'Success')
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
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> --}}
@stack('script-page-level')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
{{-- <script src="https://jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script> --}}

<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.js"></script>

</html>
