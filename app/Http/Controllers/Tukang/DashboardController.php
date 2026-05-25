<?php

namespace App\Http\Controllers\Tukang;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() { return view('tukang.dashboard'); }
}