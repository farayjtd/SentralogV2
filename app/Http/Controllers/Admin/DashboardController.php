<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()   { return view('admin.dashboard'); }
    public function users()   { return view('admin.users.index'); }
    public function warehouse(){ return view('admin.warehouse.index'); }
    public function trucks()  { return view('admin.trucks.index'); }
    public function projects(){ return view('admin.projects.index'); }
    public function attendance(){ return view('admin.attendance.index'); }
}