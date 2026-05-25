<?php

namespace App\Http\Controllers\KepalaWh;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()    { return view('kepala-wh.dashboard'); }
    public function projects() { return view('kepala-wh.projects.index'); }
    public function attendance(){ return view('kepala-wh.attendance.index'); }
    public function bahanBaku(){ return view('kepala-wh.bahan-baku.index'); }
}