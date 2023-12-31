@extends('admin.layouts.app')
@section('content')
    <section class="dashboard">
        <div class="container-fluid">
            @include('admin.common.breadcrumbs')
            <div class="row border shadow p-2"
                style="background-color: white; height: auto; width: 100%; margin: 0px 0px 15px;">
                <div class="col-6 col-sm-6 col-md-3 mt-2">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Venue</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ auth()->user()->venue->count() }}</h5>

                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 mt-2">
                    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                        <div class="card-header">Couch</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ auth()->user()->couch->count() }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 mt-2">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">Tournament</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ auth()->user()->venue->count() }}</h5>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- <div class="container"> --}}
    {{--    <div class="row justify-content-center"> --}}
    {{--        <div class="col-md-8"> --}}
    {{--            <div class="card"> --}}
    {{--                <div class="card-header">{{ __('Dashboard') }}</div> --}}

    {{--                <div class="card-body"> --}}
    {{--                    @if (session('status')) --}}
    {{--                        <div class="alert alert-success" role="alert"> --}}
    {{--                            {{ session('status') }} --}}
    {{--                        </div> --}}
    {{--                    @endif --}}

    {{--                    {{ __('You are logged in!') }} --}}
    {{--                </div> --}}
    {{--            </div> --}}
    {{--        </div> --}}
    {{--    </div> --}}
    {{-- </div> --}}
@endsection
