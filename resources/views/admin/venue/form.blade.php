@extends('admin.layouts.app')
@push('style-page-level')
@endpush
@section('content')
    <section class="dashboard">
        <div class="container-fluid">
            @include('admin.common.breadcrumbs')
            <div class="row border shadow p-2"
                style="background-color: white; height: auto; width: 100%; margin: 0px 0px 15px;">
                <label style="font-weight: 700; font-size: 20px; text-align: center;">{{ $pageHeading }}</label>
                <div class="col-12 col-sm-12 col-md-6 mt-2 offset-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>{{ $pageHeading }} From</h4>
                        </div>
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ $action }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="PUT" name="_method">
                                <div class="mb-3">
                                    <label for="name" style="margin-bottom: 10px;">Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name', $venue->name) }}" placeholder="Enter Name" required>

                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="price" style="margin-bottom: 10px;">Price</label>
                                    <input type="text" id="price" class="form-control" name="price"
                                        value="{{ old('price', $venue->price) }}" placeholder="Enter price" required>

                                    @if ($errors->has('price'))
                                        <p class="text-danger">{{ $errors->first('price') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="image" style="margin-bottom: 10px;">Image</label>
                                    <input type="file" id="image" class="form-control" name="image">
                                    @if ($venue->image)
                                        <img src="{{ asset($venue->image) }}" width="100px" height="100px" alt="">
                                    @endif
                                    @if ($errors->has('image'))
                                        <p class="text-danger">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                                <div class="md-3">
                                    <label for="description" style="margin-bottom: 10px;">Description</label>

                                    <textarea class="form-control" name="description" value="{{ old('description', $venue->description) }}" id="description"
                                        cols="30" rows="10">{{ old('description', $venue->description) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="value" style="margin-bottom: 10px;">Location</label>
                                    <select class="choices form-select" name="location_id" required>
                                        <option value="">----Select Location----</option>
                                        @foreach ($location as $key => $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == old('locaiton_id', $venue->location_id) ? 'selected' : '' }}>
                                                {{ ucfirst($value->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="value" style="margin-bottom: 10px;">Category</label>
                                    <select class="choices form-select" name="category_id" required>
                                        <option value="">----Select Category----</option>
                                        @foreach ($category as $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == old('category_id', $venue->category_id) ? 'selected' : '' }}>
                                                {{ ucfirst($value->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="value" style="margin-bottom: 10px;">Couch</label>
                                    <select class="choices form-select" name="category_id" required>
                                        <option value="">----Select Couch----</option>
                                        @foreach ($couch as $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == old('category_id', $venue->category_id) ? 'selected' : '' }}>
                                                {{ ucfirst($value->name) }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                @if ($errors->has('category_id'))
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                @endif

                                <div class="col-12 col-sm-12 col-md-6 mb-3">
                                    <label class="form-label">From</label>
                                    <input type="text" value="{{ old('address', $venue->address) }}"
                                        data-bs-target="#register-map-model" data-bs-toggle="modal"
                                        data-bs-latitude="latitude" data-bs-longitude="longitude" data-bs-address="address"
                                        id="from" name="address" class="from form-control" required
                                        placeholder="From address location">
                                    @error('address')
                                        <p class="text-danger mb-0">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mb-3">
                                    <label class="form-label"> <input type="checkbox" name="day[]" value="0"
                                            {{ $venue->hasDay(0) ? 'checked' : '' }} class=""> Sunday</label>
                                    <div class="row">

                                        <div class="col-6">
                                            <label for="start_time" style="margin-bottom: 10px;">start_time</label>
                                            <select class="choices form-select" name="start_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('start_time', $venue->time(1) ? $venue->time(1)->start_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('start_time'))
                                                <p class="text-danger">{{ $errors->first('start_time') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-6">
                                            <label for="end_time" style="margin-bottom: 10px;">end_time</label>
                                            <select class="choices form-select" name="end_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('end_time', $venue->time(1) ? $venue->time(1)->end_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('end_time'))
                                                <p class="text-danger">{{ $errors->first('end_time') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mb-3">
                                    <label class="form-label"> <input type="checkbox" name="day[]" value="1"
                                            {{ $venue->hasDay(1) ? 'checked' : '' }} class=""> Monday</label>
                                    <div class="row">

                                        <div class="col-6">
                                            <label for="start_time" style="margin-bottom: 10px;">start_time</label>
                                            <select class="choices form-select" name="start_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('start_time', $venue->time(1) ? $venue->time(1)->start_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('start_time'))
                                                <p class="text-danger">{{ $errors->first('start_time') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-6">
                                            <label for="end_time" style="margin-bottom: 10px;">end_time</label>
                                            <select class="choices form-select" name="end_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('end_time', $venue->time(1) ? $venue->time(1)->end_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('end_time'))
                                                <p class="text-danger">{{ $errors->first('end_time') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mb-3">
                                    <label class="form-label"> <input type="checkbox" name="day[]" value="2"
                                            {{ $venue->hasDay(2) ? 'checked' : '' }} class=""> Tuesday</label>
                                    <div class="row">

                                        <div class="col-6">
                                            <label for="start_time" style="margin-bottom: 10px;">start_time</label>
                                            <select class="choices form-select" name="start_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('start_time', $venue->time(2) ? $venue->time(2)->start_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('start_time'))
                                                <p class="text-danger">{{ $errors->first('start_time') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-6">
                                            <label for="end_time" style="margin-bottom: 10px;">end_time</label>
                                            <select class="choices form-select" name="end_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('end_time', $venue->time(2) ? $venue->time(2)->end_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('end_time'))
                                                <p class="text-danger">{{ $errors->first('end_time') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mb-3">
                                    <label class="form-label"> <input type="checkbox" name="day[]" value="3"
                                            {{ $venue->hasDay(3) ? 'checked' : '' }} class=""> Wednesday</label>
                                    <div class="row">

                                        <div class="col-6">
                                            <label for="start_time" style="margin-bottom: 10px;">start_time</label>
                                            <select class="choices form-select" name="start_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('start_time', $venue->time(3) ? $venue->time(3)->start_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('start_time'))
                                                <p class="text-danger">{{ $errors->first('start_time') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-6">
                                            <label for="end_time" style="margin-bottom: 10px;">end_time</label>
                                            <select class="choices form-select" name="end_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('end_time', $venue->time(3) ? $venue->time(3)->end_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('end_time'))
                                                <p class="text-danger">{{ $errors->first('end_time') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mb-3">
                                    <label class="form-label"> <input type="checkbox" name="day[]" value="4"
                                            {{ $venue->hasDay(4) ? 'checked' : '' }} class=""> Thursday</label>
                                    <div class="row">

                                        <div class="col-6">
                                            <label for="start_time" style="margin-bottom: 10px;">start_time</label>
                                            <select class="choices form-select" name="start_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('start_time', $venue->time(4) ? $venue->time(4)->start_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('start_time'))
                                                <p class="text-danger">{{ $errors->first('start_time') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-6">
                                            <label for="end_time" style="margin-bottom: 10px;">end_time</label>
                                            <select class="choices form-select" name="end_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('end_time', $venue->time(4) ? $venue->time(4)->end_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('end_time'))
                                                <p class="text-danger">{{ $errors->first('end_time') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mb-3">
                                    <label class="form-label"> <input type="checkbox" name="day[]" value="5"
                                            {{ $venue->hasDay(5) ? 'checked' : '' }} class=""> Friday</label>
                                    <div class="row">

                                        <div class="col-6">
                                            <label for="start_time" style="margin-bottom: 10px;">start_time</label>
                                            <select class="choices form-select" name="start_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('start_time', $venue->time(5) ? $venue->time(5)->start_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('start_time'))
                                                <p class="text-danger">{{ $errors->first('start_time') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-6">
                                            <label for="end_time" style="margin-bottom: 10px;">end_time</label>
                                            <select class="choices form-select" name="end_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('end_time', $venue->time(5) ? $venue->time(5)->end_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('end_time'))
                                                <p class="text-danger">{{ $errors->first('end_time') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mb-3">
                                    <label class="form-label"> <input type="checkbox" name="day[]" value="6"
                                            {{ $venue->hasDay(6) ? 'checked' : '' }} class="">
                                        Satureday</label>
                                    <div class="row">

                                        <div class="col-6">
                                            <label for="start_time" style="margin-bottom: 10px;">start_time</label>
                                            <select class="choices form-select" name="start_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('start_time', $venue->time(6) ? $venue->time(6)->start_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('start_time'))
                                                <p class="text-danger">{{ $errors->first('start_time') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-6">
                                            <label for="end_time" style="margin-bottom: 10px;">end_time</label>
                                            <select class="choices form-select" name="end_time[]">
                                                <option value="">--:-- AM</option>
                                                @foreach ($time as $value)
                                                    <option value="{{ $value->id }}"
                                                        {{ $value->id == old('end_time', $venue->time(6) ? $venue->time(6)->end_time : '') ? 'selected' : '' }}>
                                                        {{ ucfirst($value->time) }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('end_time'))
                                                <p class="text-danger">{{ $errors->first('end_time') }}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>


                                {{-- <input type="text"class="from form-control"
                                        placeholder="From address location"> --}}


                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                        {{ $venue->id != 0 ? 'Save Changes' : 'Submit' }}
                                    </button>
                                    @if ($venue->id != 0)
                                        <a href="{{ route('admin.venue.index') }}">
                                            <button type="button"
                                                class="btn btn-light-secondary me-1 mb-1">Cancle</button>
                                        </a>
                                    @else
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    @endif
                                </div>
                                <input type="hidden" value="{{ old('lat', $venue->lat) }}" name="lat"
                                    class="latitude">
                                <input type="hidden" value="{{ old('long', $venue->long) }}" name="long"
                                    class="longitude">
                            </form>

                            @include('admin.common.map-model')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@push('script-page-level')
    <script src="{{ asset('assets/admin/js/map-model.js') }}"></script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBNcTmnS323hh7tSQzFdwlnB4EozA3lwcA&libraries=places&callback=initAutocomplete">
    </script>
@endpush
