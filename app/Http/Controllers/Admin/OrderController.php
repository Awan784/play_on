<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = 'Order';
        $this->breadcrumbs[route('admin.dashboard')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.order.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Order'];
    }
 public function index(){

        $order=Order::all();
        return view('admin.order.index',compact('order'));
 }
}
