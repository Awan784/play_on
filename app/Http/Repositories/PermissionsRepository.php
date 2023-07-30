<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\PermissionsRepositoryInterface;
use App\Http\Repositories\BaseRepository\Repository;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Spatie\Permission\Models\Permission;
use stdClass;

class PermissionsRepository extends Repository implements PermissionsRepositoryInterface
{
    public function __construct()
    {
        $this->model = new Permission();
    }

    public function get($id): Permission
    {
        try{
            if($id == 0){
                $permission = $this->getModel();
                $permission->guard_name = '';
                return $permission;
            } else {
                return $this->getModel()->findOrFail($id);
            }
        } catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
    }

    public function all()
    {
        try{
            return Permission::all();
        } catch (Exception $exception){
            throw new Exception($exception->getMessage());
        }
    }

    public function save($data, $id)
    {
        try{
            return $this->getModel()->updateOrCreate(['id' => $id],$data);
        } catch (Exception $exception){
            return throw new Exception($exception->getMessage());
        }
    }

    public function remove()
    {
        // TODO: Implement remove() method.
    }

    public function destroy($id): bool
    {
        try {
            $this->get($id)->delete();
            return true;
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }
    }

}
