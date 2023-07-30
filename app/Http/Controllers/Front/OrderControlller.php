<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class OrderControlller extends Controller
{
    public function create(Request $request){

        $data=$request->except('token');
        $data['user_id']=auth()->user()->id;
        Order::create($data);
        return redirect()->back()->with('success',"Registeration Successfully");
        // try{
        // }catch(Exception $e){

        //     return redirect()->back()->with('error',$e);
        // }
    }
}
