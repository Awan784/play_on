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
                            <form class="form form-vertical" action="{{ route('admin.profile.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- <input type="hidden" value="PUT" name="_method"> --}}
                                <div class="mb-3">
                                    <label for="name" style="margin-bottom: 10px;">Name</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name', auth()->user()->name) }}" placeholder="Enter Name" required>

                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="gender" style="margin-bottom: 10px;">Gender</label>
                                    <select class="choices form-select" name="gender" required>
                                        <option value="">----Select gender----</option>
                                        {{-- @foreach ($location as $value) --}}
                                        {{-- @endforeach --}}
                                        <option value="Male" {{ auth()->user()->gender == 'Male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="Female" {{ auth()->user()->gender == 'Female' ? 'selected' : '' }}>
                                            Female
                                        </option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="age" style="margin-bottom: 10px;">Age</label>
                                    <input type="text" id="age" class="form-control" name="age"
                                        value="{{ old('age', auth()->user()->age) }}" placeholder="Enter age" required>

                                    @if ($errors->has('age'))
                                        <p class="text-danger">{{ $errors->first('age') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number" style="margin-bottom: 10px;">Phone Number</label>
                                    <input type="number" id="phone_number" class="form-control" name="phone_number"
                                        value="{{ old('phone_number', auth()->user()->phone_number) }}"
                                        placeholder="Enter phone number" required>

                                    @if ($errors->has('phone_number'))
                                        <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="email" style="margin-bottom: 10px;">Email</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        value="{{ old('email', auth()->user()->email) }}" placeholder="Enter phone number"
                                        required>

                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="password" style="margin-bottom: 10px;">New Password</label>
                                    <input type="password" id="password" class="form-control" name="password"
                                        value="" placeholder="Enter phone number">

                                    @if ($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>


                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                        Save Changes </button>

                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    {{-- @endif --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@push('script-page-level')
@endpush
