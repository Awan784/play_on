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
                                        value="{{ old('name', $tournament->name) }}" placeholder="Enter Name" required>

                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="entry_fee" style="margin-bottom: 10px;">entry_fee</label>
                                    <input type="number" id="entry_fee" class="form-control" name="entry_fee"
                                        value="{{ old('entry_fee', $tournament->entry_fee) }}" placeholder="Enter entry_fee"
                                        required>

                                    @if ($errors->has('entry_fee'))
                                        <p class="text-danger">{{ $errors->first('entry_fee') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="prize" style="margin-bottom: 10px;">prize</label>
                                    <input type="number" id="prize" class="form-control" name="prize"
                                        value="{{ old('prize', $tournament->prize) }}" placeholder="Enter prize" required>

                                    @if ($errors->has('prize'))
                                        <p class="text-danger">{{ $errors->first('prize') }}</p>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="date" style="margin-bottom: 10px;">date</label>
                                    <input type="date" id="date" class="form-control" name="date"
                                        value="{{ old('date', $tournament->date) }}" placeholder="Enter date" required>

                                    @if ($errors->has('date'))
                                        <p class="text-danger">{{ $errors->first('date') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="start_time" style="margin-bottom: 10px;">start_time</label>
                                    <select class="choices form-select" name="start_time" required>
                                        <option value="">----Select Time----</option>
                                        @foreach ($time as $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == old('start_time', $tournament->time) ? 'selected' : '' }}>
                                                {{ ucfirst($value->time) }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('start_time'))
                                        <p class="text-danger">{{ $errors->first('start_time') }}</p>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="end_time" style="margin-bottom: 10px;">end_time</label>
                                    <select class="choices form-select" name="end_time" required>
                                        <option value="">----Select Time----</option>
                                        @foreach ($time as $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == old('end_time', $tournament->end_time) ? 'selected' : '' }}>
                                                {{ ucfirst($value->time) }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('end_time'))
                                        <p class="text-danger">{{ $errors->first('end_time') }}</p>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="value" style="margin-bottom: 10px;">venue</label>
                                    <select class="choices form-select" name="venue_id" required>
                                        <option value="">----Select venue----</option>
                                        @foreach (auth()->user()->venue as $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == old('venue_id', $tournament->venue_id) ? 'selected' : '' }}>
                                                {{ ucfirst($value->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                        {{ $tournament->id != 0 ? 'Save Changes' : 'Submit' }}
                                    </button>
                                    @if ($tournament->id != 0)
                                        <a href="{{ route('admin.tournament.index') }}">
                                            <button type="button" class="btn btn-light-secondary me-1 mb-1">Cancle</button>
                                        </a>
                                    @else
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    @endif
                                </div>
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
