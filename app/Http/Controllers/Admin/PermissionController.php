<?php

namespace App\Http\Controllers\Admin;

use App\Http\Repositories\PermissionsRepository;
use App\Http\Requests\PermissionRequest;
use Exception;
use Illuminate\Http\Request;

class PermissionController extends Controller
{

    private PermissionsRepository $permissionsRepository;
    public function __construct(PermissionsRepository $permissionsRepository)
    {
        parent::__construct();
        $this->permissionsRepository = $permissionsRepository;
        $this->pageTitle = 'Permission';
        $this->breadcrumbs[route('admin.dashboard')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
        $this->breadcrumbs[route('admin.permissions.index')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Permissions'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        try{
            return view('admin.permission.index', [
                'permissions' => $this->permissionsRepository->all(),
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
        $this->pageHeading = (($id == 0) ? 'Add Permission' : 'Edit Permission');
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => $this->pageHeading];
        try{
            return view('admin.permission.form', [
                'permission' => $this->permissionsRepository->get($id),
                'guards' => ['web', 'admins'],
                'action' => route('admin.permissions.update', $id),
            ]);
        } catch (Exception $exception){
            return redirect()->route('admin.dashboard')->with('error', $exception->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PermissionRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(PermissionRequest $permissionRequest, $id)
    {
        $data = $permissionRequest->only('name', 'guard_name');
        try {
            $this->permissionsRepository->save($data, $id);
            $message = $id > 0 ? 'Permission Updated Successfully' : 'Permission Added Successfully';
            return redirect(route('admin.permissions.index'))->with('success', $message);
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
            $this->permissionsRepository->destroy($id);
            $data = $this->all();
            return response()->json(['msg' => 'Permission deleted successfully.', 'data' => $data]);
        } catch (Exception $exception){
            return response()->json(['msg' => 'Permission Not Found.']);
        }
    }

    private function all(): string
    {
        $permissions = $this->permissionsRepository->all();
        $data = '<table id="dataTable" class="table table-striped" style="width:100%"><thead><tr><th>Sr#</th><th>Name</th><th>Guard Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr></thead><tbody>';
        if(count($permissions) > 0){
            foreach ($permissions as $key => $val){
                $data .= '<tr><td class="width-10">'.($key+1).'</td>';
                $data .= '<td class="width-20">'.$val->name.'</td>';
                $data .= '<td class="width-20">'.$val->guard_name.'</td>';
                $data .= '<td class="width-15">'.$val->created_at.'</td>';
                $data .= '<td class="width-15">'.$val->updated_at.'</td>';
                $data .= '<td class="width-20"><a href="'.route('admin.permissions.edit', $val->id).'" title="Edit"><i class="fa fa-edit"></i></a> <a href="javascript:{};" data-url="'.route('admin.permissions.destroy',  $val->id).'" title="Delete" class="delete"><i class="fa fa-trash"></i></a></td></tr>';
            }
        } else{
            $data .= '<tr><td colspan="6">No Record Found.</td></tr>';
        }
        $data .= '</tbody><tfoot><tr><th>Sr#</th><th>Name</th><th>Guard Name</th><th>Created At</th><th>Updated At</th><th>Action</th></tr></tfoot></table>';
        return $data;
    }
}
