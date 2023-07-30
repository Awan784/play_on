<?php

namespace App\Http\Controllers\Admin;

use App\Http\Repositories\UserRepository;
use App\Http\Requests\UserRequest;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserRepository $UserRepository;
    public function __construct(UserRepository $UserRepository)
    {
        parent::__construct();
        $this->UserRepository = $UserRepository;
        $this->pageTitle = 'User';
        $this->breadcrumbs[route('admin.dashboard')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.user.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'User'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try{
            return view('admin.user.index', [
                'user' => $this->UserRepository->all(),
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
        $data=$this->UserRepository->get($id)->toArray();

        if($data['status']==0){
            $data1['status']=1;
            $this->UserRepository->save($data1,$id);

            return redirect()->route('admin.user.index')->with('success',"Manager Activated Successfully");
        }else{
            $data1['status']=0;
            $this->UserRepository->save($data1,$id);
            return redirect()->route('admin.user.index')->with('success',"Manager Deactivated Successfully");

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
        $this->pageHeading = (($id == 0) ? 'Add User' : 'Edit User');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try{
            return view('admin.user.form', [
                'User' => $this->UserRepository->get($id),
                'guards' => ['web', 'admins'],
                'action' => route('admin.user.update', $id),
            ]);
        } catch (Exception $exception){
            return redirect()->route('admin.dashboard')->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $UserRequest, $id)
    {
        $data = $UserRequest->except('_token');
        $data['manager_id']=auth()->user()->id;
        // dd($data);
        try {
            $this->UserRepository->save($data, $id);
            $message = $id > 0 ? 'User Updated Successfully' : 'User Added Successfully';
            return redirect(route('admin.user.index'))->with('success', $message);
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
            $this->UserRepository->destroy($id);
            $data = $this->all();
            return response()->json(['msg' => 'User deleted successfully.', 'data' => $data]);
        } catch (Exception $exception){
            return response()->json(['msg' => 'User Not Found.']);
        }
    }

    private function all(): string
    {
        $User = $this->UserRepository->all();
        $data = '<table id="dataTable" class="table table-striped" style="width:100%"><thead><tr><th>Sr#</th><th>Name</th><th>Guard Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr></thead><tbody>';
        if(count($User) > 0){
            foreach ($User as $key => $val){
                $data .= '<tr><td class="width-10">'.($key+1).'</td>';
                $data .= '<td class="width-20">'.$val->name.'</td>';
                $data .= '<td class="width-20">'.$val->guard_name.'</td>';
                $data .= '<td class="width-15">'.$val->created_at.'</td>';
                $data .= '<td class="width-15">'.$val->updated_at.'</td>';
                $data .= '<td class="width-20"><a href="'.route('admin.user.edit', $val->id).'" title="Edit"><i class="fa fa-edit"></i></a> <a href="javascript:{};" data-url="'.route('admin.user.destroy',  $val->id).'" title="Delete" class="delete"><i class="fa fa-trash"></i></a></td></tr>';
            }
        } else{
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        $data .= '</tbody><tfoot><tr><th>Sr#</th><th>Name</th><th>Guard Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr></tfoot></table>';
        return $data;
    }
}
