<?php

namespace App\Http\Repositories;

use App\Http\Repositories\BaseRepository\Repository;
use App\Models\Couch;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

use stdClass;

class CouchRepository extends Repository
{
    public function __construct()
    {
        $this->model = new Couch();
    }

    public function get($id): Couch
    {
        try{
            if($id == 0){
                $Couch = $this->getModel();

                return $Couch;
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
            return Couch::all();
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
