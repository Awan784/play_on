<?php

namespace App\Traits;

use App\Models\Admin;
use App\Http\Libraries\Uploader;

trait Administrators {

    /*
     * PIRVATE FUNCTION TO SAVE ADMIN DATA
     */
    private function save($request, $id = 0, $active = false) {
        $data = $request->only(['role_id', 'full_name', 'user_name', 'email', 'is_active']);
        if ($data['role_id']== Admin::superSystemAdminId) {
            return redirect()->back()->with('err', 'You cannot add super admin')->withInput();
        }
        if ($id >0)
        {
            $data['profile_pic'] = $request->get('profile_pic');
        }

        if ($request->hasFile('profile_pic')){
            $uploader = new Uploader();
            $uploader->setInputName('profile_pic');
            if ($uploader->isValidFile()) {
                $uploader->upload('users', $uploader->fileName);
                if ($uploader->isUploaded()) {
                    $data['profile_pic'] = $uploader->getUploadedPath();
                }
            }

            if (!$uploader->isUploaded()) {
                return redirect()->back()->withErrors('err', $uploader->getMessage())->withInput();
            }
        }
        if (!empty($request->get('password'))) {
            $data['password'] = bcrypt($request->get('password'));
        }
        if ($active) {
            unset($data['role_id']);
            unset($data['is_active']);
            $admin = Admin::find($id);
            $admin->update($data);
            session()->put('ADMIN_DATA', $admin->toArray());
        }
        else {
            Admin::updateOrCreate(['id' => $id], $data);
        }
    }

}