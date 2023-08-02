<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Repositories\CouchRepository;
use App\Models\Couch;
use Exception;
use Illuminate\Http\Request;

class CouchController extends Controller
{
    private CouchRepository $CouchRepository;
    public function __construct(CouchRepository $CouchRepository)
    {
        parent::__construct();
        $this->CouchRepository = $CouchRepository;
        $this->pageTitle = 'Couch';
        $this->breadcrumbs[route('admin.dashboard')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.couch.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Couch'];
    }

    public function index(){
        return view('admin.couch.index');
    }
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Couch' : 'Edit Couch');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try{
            return view('admin.couch.form', [
                'couch' => $this->CouchRepository->get($id),
                'action' => route('admin.couch.update', $id),
            ]);
        } catch (Exception $exception){
            return redirect()->route('admin.dashboard')->with('error', $exception->getMessage());
        }
    }
    public function update(Request $VenueRequest, $id)
    {
        // $VenueRequest->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // dd($VenueRequest);
        try {
        $data = $VenueRequest->except('_token');
        $data['created_by']=auth()->user()->id;

      $venue=   $this->CouchRepository->save($data, $id);


            $message = $id > 0 ? 'Couch Updated Successfully' : 'Couch Added Successfully';
            return redirect(route('admin.couch.index'))->with('success', $message);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function show($id)
    {
        try {
            Couch::destroy($id);
            // dd('ds');
            // $data = $this->all();
            return redirect()->back()->with('success','Deleted SuccessFully');
        } catch (Exception $exception){
            return redirect()->back()->with('error',$exception);
        }
    }

}
