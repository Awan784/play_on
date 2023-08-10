<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('front.home');
    }

    public function testPage(){
        return "Paypal";
    }
    public function order(){
        return view('front.order');
    }
    public function feedback(){
        dd('feedback');
    }
    public function orderDelete($id){
        $order=Order::find($id)->delete();
        return redirect()->route('front.order')->with('success','Order Deleted Successfuly');
    }
}
