<?php

namespace App\Http\Controllers\Admin;

use App\Http\Repositories\VenueRepository;
use App\Http\Requests\VenueRequest;
use App\Models\Venue;
use App\Models\VenueTimeTable;
use Exception;
use Illuminate\Http\Request;

class VenueController extends Controller
{

    private VenueRepository $VenueRepository;
    public function __construct(VenueRepository $VenueRepository)
    {
        parent::__construct();
        $this->VenueRepository = $VenueRepository;
        $this->pageTitle = 'Venue';
        $this->breadcrumbs[route('admin.dashboard')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.venue.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Venue'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try{
            return view('admin.venue.index', [
                'venues' => Venue::where('manager_id',auth()->user()->id)->get(),
            ]);
        } catch (Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Venue' : 'Edit Venue');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try{
            return view('admin.venue.form', [
                'venue' => $this->VenueRepository->get($id),
                'guards' => ['web', 'admins'],
                'action' => route('admin.venue.update', $id),
            ]);
        } catch (Exception $exception){
            return redirect()->route('admin.dashboard')->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param VenueRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $VenueRequest, $id)
    {
        // $VenueRequest->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // dd($VenueRequest);
        $data = $VenueRequest->except('_token');
        $data['manager_id']=auth()->user()->id;
        if(isset($VenueRequest->image)){
            $data['image']=$this->saveImage($VenueRequest->file('image'));
        }
      $venue=   $this->VenueRepository->save($data, $id);
        // dd($data);
        foreach ($VenueRequest->day as $key => $value) {
            $timetable= VenueTimeTable::where('venue_id',$venue->id)->where(['day'=>$value])->first();
            if($timetable){
                $timetable->update([
                    'start_time'=>$VenueRequest->start[$value],
                    'end_time'=>$VenueRequest->end[$value],
                ]);
            }else{
                VenueTimeTable::create([
                    'venue_id'=>$venue->id,
                    'day'=>$value,
                    'start_time'=>$VenueRequest->start[$value],
                    'end_time'=>$VenueRequest->end[$value],
                ]);
            }
        }
        try {
            $message = $id > 0 ? 'Venue Updated Successfully' : 'Venue Added Successfully';
            return redirect(route('admin.venue.index'))->with('success', $message);
        } catch (Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->VenueRepository->destroy($id);
            $data = $this->all();
            return response()->json(['msg' => 'Venue deleted successfully.', 'data' => $data]);
        } catch (Exception $exception){
            return response()->json(['msg' => 'Venue Not Found.']);
        }
    }

    private function all(): string
    {
        $Venue = $this->VenueRepository->all();
        $data = '<table id="dataTable" class="table table-striped" style="width:100%"><thead><tr><th>Sr#</th><th>Name</th><th>Guard Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr></thead><tbody>';
        if(count($Venue) > 0){
            foreach ($Venue as $key => $val){
                $data .= '<tr><td class="width-10">'.($key+1).'</td>';
                $data .= '<td class="width-20">'.$val->name.'</td>';
                $data .= '<td class="width-20">'.$val->guard_name.'</td>';
                $data .= '<td class="width-15">'.$val->created_at.'</td>';
                $data .= '<td class="width-15">'.$val->updated_at.'</td>';
                $data .= '<td class="width-20"><a href="'.route('admin.Venue.edit', $val->id).'" title="Edit"><i class="fa fa-edit"></i></a> <a href="javascript:{};" data-url="'.route('admin.Venue.destroy',  $val->id).'" title="Delete" class="delete"><i class="fa fa-trash"></i></a></td></tr>';
            }
        } else{
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        $data .= '</tbody><tfoot><tr><th>Sr#</th><th>Name</th><th>Guard Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr></tfoot></table>';
        return $data;
    }
    public function saveImage($image){

        $imageName = time().'.'.$image->getClientOriginalExtension();
         $image->move(public_path('images'), $imageName);
        return 'images/'.$imageName;
        }
}
