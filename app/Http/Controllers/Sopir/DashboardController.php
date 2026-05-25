<?php

namespace App\Http\Controllers\Sopir;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() { return view('sopir.dashboard'); }
}