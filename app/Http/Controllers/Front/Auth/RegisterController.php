<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Front\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
            'age' => ['required'],
            'cnic' => ['required'],
            'phone_number' => ['required'],
            'category_id' => ['required'],
            'location_id' => ['required'],
            'address' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data): User
    {
        $data['role_id']=3;
        // dd($data);
            //    $user->sendEmailVerificationNotification();
        return User::create([
            'role_id' => 3,
            'name' => $data['name'],
            'email' => $data['email'],
            'age' => $data['age'],
            'gender' => $data['gender'],
            'cnic' => $data['cnic'],
            'category_id' => $data['category_id'],
            'phone_number' => $data['phone_number'],
            'location_id' => $data['location_id'],
            'address' => $data['address'],
            'lat' => $data['lat'],
            'long' => $data['long'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegistrationForm()
    {
        return view('front.auth.register');
    }

    public function showRegistrationType()
    {
        return view('front.registerType');
    }

}
