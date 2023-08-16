<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Admin\Controller;
use App\Http\Repositories\TournamentRepository;
use App\Models\Tournament;
use Exception;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    private TournamentRepository $TournamentRepository;
    public function __construct(TournamentRepository $TournamentRepository)
    {
        parent::__construct();
        $this->TournamentRepository = $TournamentRepository;
        $this->pageTitle = 'tournament';
        $this->breadcrumbs[route('admin.dashboard')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.tournament.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'tournament'];
    }

    public function index(){
        return view('admin.tournament.index');
    }
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Tournament' : 'Edit Tournament');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try{
            return view('admin.tournament.form', [
                'tournament' => $this->TournamentRepository->get($id),
                'action' => route('admin.tournament.update', $id),
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
            
      $venue=   $this->TournamentRepository->save($data, $id);


            $message = $id > 0 ? 'Tournament Updated Successfully' : 'Tournament Added Successfully';
            return redirect(route('admin.tournament.index'))->with('success', $message);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function show($id)
    {
        try {
            Tournament::destroy($id);
            // dd('ds');
            // $data = $this->all();
            return redirect()->back()->with('success','Deleted SuccessFully');
        } catch (Exception $exception){
            return redirect()->back()->with('error',$exception);
        }
    }

}
