<?php

namespace App\Http\Controllers\Engineering;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()   { return view('engineering.dashboard'); }
    public function projects(){ return view('engineering.projects.index'); }
    public function create()  { return view('engineering.projects.create'); }

    public function store(Request $request)
    {
        $request->validate([
            'nama_project'   => 'required|string|max:255',
            'nama_customer'  => 'required|string|max:255',
            'lokasi'         => 'required|string',
            'target_selesai' => 'required|date',
            'jenis_material' => 'required|string',
            'warna'          => 'required|string',
            'dimensi'        => 'required|string',
            'warehouse_id'   => 'required',
            'file_boq'       => 'nullable|file|mimes:xlsx,xls,pdf|max:5120',
            'gambar_teknis'  => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        // TODO: simpan ke DB
        return redirect()->route('engineering.projects')
            ->with('success', 'Project berhasil dibuat dan dikirim ke warehouse.');
    }
}