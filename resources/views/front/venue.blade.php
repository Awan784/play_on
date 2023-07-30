@extends('front.layouts.app')
@section('content')
    <!-- Header-->
    <header class="bg-dark py-3">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4" id="booksportsvenuetext">Book Your Sports Venue</h1>
                <div class="d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

                    {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" onsubmit="search()"> --}}
                    <div class="form-group">
                        <input class="form-control" value="{{ $venue->search }} " id="search" name="search"
                            onchange="search()" placeholder="Search" aria-label="Search"
                            aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i
                                class="fas fa-search"></i></button>

                    </div>
                    {{-- </form> --}}

                    <!--Address-->
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="form-group mt-2">
                                    <select class="form-control text-white bg-dark " onchange="search()" id="location"
                                        name="location">
                                        <option value=0>--Select Location--</option>
                                        @foreach ($location as $value)
                                            <option value="{{ $value->id }}"
                                                {{ $venue->location == $value->id ? 'selected' : '' }}>
                                                {{ $value->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mt-2 pr-3">
                                    <select class="form-control text-white bg-dark " onchange="search()"
                                        value="{{ old('category') }}" id="category" name="category">

                                        <option value=0>--Select Category--</option>
                                        @foreach ($category as $value)
                                            <option value={{ $value->id }}
                                                {{ $venue->category == $value->id ? 'selected' : '' }}>
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-3">
        <div class="container px-4 px-lg-5 mt-5">

            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($venue as $value)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top img-fluid h-20 w-100" height="100px" id="images"
                                src="{{ asset($value->image) }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <a href="{{ route('venue.detail', $value->id) }}"
                                        style="text-decoration: none; color: black;">

                                        <h5 class="fw-bolder">{{ $value->name }}</h5>
                                    </a>
                                    <!-- Product price-->
                                    <p>{{ $value->price }} Per Hour</p>
                                    <p>{{ $value->location->name }}</p>
                                    <span>{{ $value->category->name }}</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-2 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    <script>
        function search() {
            var search = $('#search').val();
            if (search == "") {
                searchval = " ";
            } else {
                searchval = search
            }
            var location = $('#location').val();
            var category = $('#category').val();
            // console.log('/venue/?search=' + searchval + '&&location=' + location + '&&category=' + category)
            window.location.href = '/venue/search=' + searchval + '&&location=' + location + '&&category=' + category

        }
    </script>
@endsection
