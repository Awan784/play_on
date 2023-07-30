<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $breadcrumbs, $pageTitle, $pageHeading;

    public function __construct()
    {
        View::composer('*', function($view)
        {
            $view->with([
                
                'location' => DB::table('location')->get(),
                'breadcrumbs' => $this->breadcrumbs,
                'pageTitle' => $this->pageTitle,
                'pageHeading' => $this->pageHeading,
                'category' => DB::table('category')->get(),
                // 'role' => session()->get('ADMIN')['role'],
            ]);
        });
    }
}
