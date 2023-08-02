@extends('front.layouts.app')
@section('content')
    <div class="container mt-5">
        <form action="{{ route('admin.register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-3 col-md-3">

                    <!--Username-->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control bg-dark text-white @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" id="name" name="name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!--Password-->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                            class="form-control bg-dark text-white @error('password') is-invalid @enderror" id="password"
                            name="password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!--Confirm Password-->
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password"
                            class="form-control text-white bg-dark @error('password') is-invalid @enderror"
                            id="password_confirmation" name="password_confirmation">
                    </div>

                    <!--Email-->
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email"
                            placeholder="example@gmail.com"class="form-control text-white bg-dark @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" id="email" name="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!--Gender-->
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control text-white bg-dark" id="gender" name="gender">
                            <option value="Male"> Male</option>
                            <option value="Female"> Female</option>
                            <option value="Other"> Other</option>
                        </select>
                    </div>

                </div>
                <!--Secon Column-->
                <div class="col-sm-3 col-md-3 ms-auto">
                    <!--Age-->
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control text-white bg-dark @error('age') is-invalid @enderror"
                            value="{{ old('age') }}" id="age" name="age">
                        @error('age')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!--Phone-->
                    <div class="form-group">
                        <label for="phone_number">Phone</label>
                        <input type="number" placeholder="03016627990"
                            class="form-control text-white bg-dark @error('phone_number') is-invalid @enderror"
                            value="{{ old('number') }}" id="phone_number" name="phone_number">
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>


                    <!--Cnic-->
                    <div class="form-group">
                        <label for="cnic">CNIC</label>
                        <input type="number" placeholder="3410456443276"
                            class="form-control text-white bg-dark @error('cnic') is-invalid @enderror"
                            value="{{ old('cnic') }}" id="cnic" name="cnic">
                        <span class="text-white">13 digits without dashes</span>
                        @error('cnic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--Image-->
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" class="form-control text-white bg-dark @error('image') is-invalid @enderror"
                            value="{{ old('image') }}" id="image" name="image">
                        {{-- <span class="text-white">13 digits without dashes</span> --}}
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <!--Address-->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <select class="form-control text-white bg-dark @error('location_id') is-invalid @enderror"
                            value="{{ old('location_id') }}" id="location_id" name="location_id">
                            <option value="">Select Your Address</option>
                            @foreach ($location as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                            {{-- <option value="ModelTown">Model Town</option>
                            <option value="GardenTown">Garden Town</option>
                            <option value="Football">Satellite Town</option>
                            <option value="Wazirabad">Wazirabad</option>
                            <option value="GulshanTown">Gulshan Town</option>
                            <option value="MasterCity">Master City</option>
                            <option value="GulberyTown">Gulberg Town</option>
                            <option value="Rawalpindi Bypass">Rawalpindi Bypass</option>
                            <option value="SialkotBypass">Sialkot Bypass</option> --}}
                        </select>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-sm btn-warning"><strong>Submit</strong></button>
                </div>
            </div>

        </form>
    </div>
@endsection
