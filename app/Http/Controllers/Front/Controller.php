<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $pageTitle;
    public function __construct()
    {
        View::composer('*', function($view)
        {
            $view->with([
                'location' => DB::table('location')->get(),
                'category' => DB::table('category')->get(),
                'pageTitle' => $this->pageTitle,
                // 'role' => session()->get('ADMIN')['role'],
            ]);
        });
    }
}
