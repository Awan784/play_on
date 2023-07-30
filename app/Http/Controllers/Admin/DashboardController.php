<?php

namespace App\Http\Controllers\Admin;

use App\Http\Repositories\TestRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    private TestRepository $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        parent::__construct();
        $this->testRepository = $testRepository;
        $this->pageTitle = 'Dashboard';
        $this->breadcrumbs[route('admin.dashboard')] = ['icon' => 'fa fa-fw fa-home', 'title' => 'Dashboard'];
    }

    public function index(){
        $val = $this->testRepository->get(0);
        return view('admin.dashboard',[
            'val' => $val,
        ]);
    }

    public function blankPage(){
        $this->breadcrumbs['javascript:{};'] = ['icon' => 'fa fa-fw fa-money', 'title' => 'Blank Page'];
        return view('admin.blank');
    }
}
