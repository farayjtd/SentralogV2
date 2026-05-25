<?php

namespace App\Http\Controllers\Mandor;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index() { return view('mandor.dashboard'); }
}