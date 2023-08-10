<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Location;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

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
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       View::share('location',Location::all());
        $this->middleware('guest:admins');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8'],
            'age' => ['required'],
            'cnic' => ['required','min:13','unique:admins'],
            'phone_number' => ['required'],
            'location_id' => ['required'],
            'image' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Admin
     */
    protected function create(array $data)
    {
        if(isset($data['image'])){
            $data['image']=$this->saveImage($data['image']);
        }
        $data['role_id']=2;

        //    $user->sendEmailVerificationNotification();
    $admin= Admin::create([
        'role_id' => 2,
        'name' => $data['name'],
        'email' => $data['email'],
        'age' => $data['age'],
        'gender' => $data['gender'],
        'cnic' => $data['cnic'],
        'image' => $data['image'],
        'phone_number' => $data['phone_number'],
        'location_id' => $data['location_id'],
        'password' => Hash::make($data['password']),
        return $admin;
    ]);
    }

    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    protected function guard()
    {
        return Auth::guard('admins');
    }
    public function saveImage($image){
        $filename = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $filename);
        return 'images/'.$filename;
    }
}
