<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Front\Controller;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->pageTitle="Venue";
    }
    public function index(){
        $venue=Venue::all();
        $venue->location=0;
        $venue->category=0;
        $venue->search="";
        return view('front.venue',compact('venue'));
    }
    public function search($search,$location,$category){
        $venue=new Venue;
        if($location!=0){
            $venue= $venue->where('location_id',$location);
            // dd($venue);
        }
        if($category!=0){
            $venue=  $venue->where('category_id',$category);

        }
        if($search!=" "){
            $venue=  $venue->where('name','LIKE','%'.$search.'%')->orWhere('price','LIKE','%'.$search.'%');
        }else{
            $search="";
        }
        // dd($search);
        $venue=  $venue->get();
        $venue->location=$location;
        $venue->category=$category;
        $venue->search=$search;
        return view('front.venue',compact('venue'));
    }
    public function detail($id){
        $venue=Venue::find($id);
        $day=array();
        // $day=
        foreach ($venue->days() as $key => $value) {
            $day[$key]=$value->day;
        }
        // dd($day);
        return view('front.venue_detail',compact('venue','day'));
    }
    public function getDays($id){
        $venue=Venue::find($id);
        $day=array();
        // $day=
        foreach ($venue->days() as $key => $value) {
            $day[$key]=$value->day;
        }
        return $day;
    }
    public function getTime($date,$id){
        $venue=Venue::find($id)->time($date);
        // $time =;
        return  $venue;
    }
}
