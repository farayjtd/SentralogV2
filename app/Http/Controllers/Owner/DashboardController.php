<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()    { return view('owner.dashboard'); }
    public function projects() { return view('owner.projects.index'); }
    public function trucks()   { return view('owner.trucks.index'); }
    public function warehouse(){ return view('owner.warehouse.index'); }
}