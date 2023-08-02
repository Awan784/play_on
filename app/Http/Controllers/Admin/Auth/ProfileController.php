<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Admin\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->pageTitle = 'Profile';
        $this->breadcrumbs[route('admin.dashboard')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.profile.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Profile'];

    }
    public function index(){
        return view('admin.profile.index');
    }
    public function update(Request $request){
        $data=$request->except('_token');
        if(isset($request->password)){
            $data['password']=Hash::make($request->password);
        }else{
            unset($data['password']);
            // dd($data);
        }
        $admin= Admin::find(auth()->user()->id)->update($data);
        return redirect()->back()->with('success',"Your Profile is Updated");
    }
}
