@extends('layouts.app')
@section('title', 'Dashboard Teknik Sipil')
@section('page-title', 'Teknik Sipil')
@section('page-subtitle', 'Input spesifikasi project dan pilih warehouse')

@section('content')
<div class="grid grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <p class="text-xs text-slate-500 mb-1">Project Saya</p>
        <p class="text-2xl font-bold text-white">6</p>
        <p class="text-xs text-blue-400 mt-1">2 menunggu produksi</p>
    </div>
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <p class="text-xs text-slate-500 mb-1">WH Tersedia</p>
        <p class="text-2xl font-bold text-white">5</p>
        <p class="text-xs text-emerald-400 mt-1">dari 8 warehouse</p>
    </div>
    <div class="col-span-2 lg:col-span-1 bg-orange-500/10 border border-orange-500/20 rounded-2xl p-5 flex items-center justify-between">
        <div>
            <p class="text-xs text-orange-300 mb-1">Buat Project Baru</p>
            <p class="text-sm text-orange-200">Input spek & pilih WH</p>
        </div>
        <a href="{{ route('engineering.projects.create') }}"
            class="w-10 h-10 bg-orange-500 rounded-xl flex items-center justify-center hover:bg-orange-400 transition">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
        </a>
    </div>
</div>

{{-- Workload WH --}}
<div class="bg-slate-900 border border-slate-800 rounded-2xl p-5 mb-6">
    <h3 class="font-semibold text-white mb-1">Status Beban Warehouse</h3>
    <p class="text-xs text-slate-500 mb-4">Pilih warehouse yang sepi untuk project baru Anda</p>
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
        @foreach([
            ['WH-1', 'Bekasi Utara', 2, 'Santai', 'emerald'],
            ['WH-2', 'Bekasi Selatan', 5, 'Sedang', 'orange'],
            ['WH-3', 'Bekasi Barat', 7, 'Penuh', 'red'],
            ['WH-4', 'Cikarang', 1, 'Santai', 'emerald'],
            ['WH-5', 'Tambun', 4, 'Sedang', 'orange'],
            ['WH-6', 'Cibitung', 0, 'Kosong', 'slate'],
            ['WH-7', 'Karawang', 3, 'Santai', 'emerald'],
            ['WH-8', 'Purwakarta', 6, 'Penuh', 'red'],
        ] as $wh)
        <div class="bg-slate-800 rounded-xl p-4 border
            {{ $wh[4] === 'red' ? 'border-red-500/20' : ($wh[4] === 'orange' ? 'border-orange-500/20' : 'border-slate-700') }}">
            <div class="flex items-center justify-between mb-2">
                <p class="font-bold text-white">{{ $wh[0] }}</p>
                <span class="text-xs px-2 py-0.5 rounded-full
                    {{ $wh[4] === 'emerald' ? 'bg-emerald-500/10 text-emerald-400' :
                       ($wh[4] === 'orange' ? 'bg-orange-500/10 text-orange-400' :
                       ($wh[4] === 'red' ? 'bg-red-500/10 text-red-400' : 'bg-slate-700 text-slate-500')) }}">
                    {{ $wh[3] }}
                </span>
            </div>
            <p class="text-xs text-slate-400 mb-2">{{ $wh[1] }}</p>
            <p class="text-xs text-slate-300"><span class="font-semibold">{{ $wh[2] }}</span> project aktif</p>
        </div>
        @endforeach
    </div>
</div>

{{-- Daftar Project Saya --}}
<div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold text-white">Project Saya</h3>
        <a href="{{ route('engineering.projects') }}" class="text-xs text-orange-400 hover:underline">Lihat semua</a>
    </div>
    <div class="space-y-3">
        @foreach([
            ['PRJ-001', 'Gedung Kantor PT Bangun Jaya', 'WH-3', 'Produksi', 'Aluminium Frame 6m, Kaca Tempered 8mm', 'orange'],
            ['PRJ-002', 'Rumah Pak Hartono - Serpong', 'WH-1', 'Menunggu', 'Kusen Aluminium, Pintu Kaca', 'slate'],
            ['PRJ-003', 'Ruko IKN Blok C', 'WH-5', 'Pengiriman', 'Fasad Aluminium Composite', 'blue'],
        ] as $p)
        <div class="flex items-start gap-4 p-4 bg-slate-800/50 rounded-xl">
            <div class="w-10 h-10 bg-slate-700 rounded-xl flex items-center justify-center flex-shrink-0 text-xs font-bold text-slate-400">
                {{ substr($p[0], -3) }}
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-start justify-between gap-2">
                    <p class="font-semibold text-white text-sm">{{ $p[1] }}</p>
                    <span class="text-xs px-2 py-0.5 rounded-lg flex-shrink-0
                        {{ $p[5] === 'orange' ? 'bg-orange-500/10 text-orange-400' :
                           ($p[5] === 'blue' ? 'bg-blue-500/10 text-blue-400' : 'bg-slate-700 text-slate-400') }}">
                        {{ $p[3] }}
                    </span>
                </div>
                <p class="text-xs text-slate-500 mt-0.5">{{ $p[0] }} · {{ $p[2] }}</p>
                <p class="text-xs text-slate-400 mt-1">{{ $p[4] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection