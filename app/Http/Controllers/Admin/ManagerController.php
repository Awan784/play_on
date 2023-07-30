<?php

namespace App\Http\Controllers\Admin;

use App\Http\Repositories\ManagerRepository;
use App\Http\Requests\ManagerRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;

class ManagerController extends Controller
{

    private ManagerRepository $ManagerRepository;
    public function __construct(ManagerRepository $ManagerRepository)
    {
        parent::__construct();
        $this->ManagerRepository = $ManagerRepository;
        $this->pageTitle = 'Manager';
        $this->breadcrumbs[route('admin.dashboard')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.manager.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Manager'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try{
            return view('admin.manager.index', [
                'manager' => Admin::where('role_id',2)->get(),
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
        $data=$this->ManagerRepository->get($id)->toArray();

        if($data['status']==0){
            $data['status']=1;
            $this->ManagerRepository->save($data,$id);

            return redirect()->route('admin.manager.index')->with('success',"Manager Activated Successfully");
        }else{
            $data['status']=0;
            $this->ManagerRepository->save($data,$id);
            return redirect()->route('admin.manager.index')->with('success',"Manager Deactivated Successfully");

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $this->pageHeading = (($id == 0) ? 'Add Manager' : 'Edit Manager');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try{
            return view('admin.Manager.form', [
                'Manager' => $this->ManagerRepository->get($id),
                'guards' => ['web', 'admins'],
                'action' => route('admin.Manager.update', $id),
            ]);
        } catch (Exception $exception){
            return redirect()->route('admin.dashboard')->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ManagerRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $ManagerRequest, $id)
    {
        $data = $ManagerRequest->except('_token');
        $data['manager_id']=auth()->Manager()->id;
        // dd($data);
        try {
            $this->ManagerRepository->save($data, $id);
            $message = $id > 0 ? 'Manager Updated Successfully' : 'Manager Added Successfully';
            return redirect(route('admin.Manager.index'))->with('success', $message);
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
            $this->ManagerRepository->destroy($id);
            $data = $this->all();
            return response()->json(['msg' => 'Manager deleted successfully.', 'data' => $data]);
        } catch (Exception $exception){
            return response()->json(['msg' => 'Manager Not Found.']);
        }
    }

    private function all(): string
    {
        $Manager = $this->ManagerRepository->all();
        $data = '<table id="dataTable" class="table table-striped" style="width:100%"><thead><tr><th>Sr#</th><th>Name</th><th>Guard Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr></thead><tbody>';
        if(count($Manager) > 0){
            foreach ($Manager as $key => $val){
                $data .= '<tr><td class="width-10">'.($key+1).'</td>';
                $data .= '<td class="width-20">'.$val->name.'</td>';
                $data .= '<td class="width-20">'.$val->guard_name.'</td>';
                $data .= '<td class="width-15">'.$val->created_at.'</td>';
                $data .= '<td class="width-15">'.$val->updated_at.'</td>';
                $data .= '<td class="width-20"><a href="'.route('admin.Manager.edit', $val->id).'" title="Edit"><i class="fa fa-edit"></i></a> <a href="javascript:{};" data-url="'.route('admin.Manager.destroy',  $val->id).'" title="Delete" class="delete"><i class="fa fa-trash"></i></a></td></tr>';
            }
        } else{
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        $data .= '</tbody><tfoot><tr><th>Sr#</th><th>Name</th><th>Guard Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr></tfoot></table>';
        return $data;
    }
}
