@extends('layouts.app')
@section('title', 'Dashboard Kepala WH')
@section('page-title', 'Warehouse WH-3')
@section('page-subtitle', 'Bekasi Barat — Pantau operasional warehouse Anda')

@section('content')
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <p class="text-xs text-slate-500 mb-1">Project Aktif</p>
        <p class="text-2xl font-bold text-white">7</p>
        <p class="text-xs text-orange-400 mt-1">2 perlu upload foto</p>
    </div>
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <p class="text-xs text-slate-500 mb-1">Tukang Hadir</p>
        <p class="text-2xl font-bold text-white">18<span class="text-base text-slate-500">/22</span></p>
        <p class="text-xs text-red-400 mt-1">4 tidak hadir hari ini</p>
    </div>
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <p class="text-xs text-slate-500 mb-1">Bahan Baku Terkunci</p>
        <p class="text-2xl font-bold text-white">5</p>
        <p class="text-xs text-slate-500 mt-1">dari 8 jenis material</p>
    </div>
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <p class="text-xs text-slate-500 mb-1">Truk Terdaftar</p>
        <p class="text-2xl font-bold text-white">3</p>
        <p class="text-xs text-blue-400 mt-1">1 sedang bertugas</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    {{-- Project Masuk --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-white">Project Masuk</h3>
            <a href="{{ route('kepala-wh.projects') }}" class="text-xs text-orange-400 hover:underline">Semua</a>
        </div>
        <div class="space-y-3">
            @foreach([
                ['PRJ-001', 'Gedung PT Bangun Jaya', 'Produksi', 'orange', false],
                ['PRJ-005', 'Ruko IKN Blok C', 'Menunggu Upload Foto', 'red', true],
                ['PRJ-007', 'Villa Pak Hendra', 'Selesai Produksi', 'emerald', false],
            ] as $p)
            <div class="p-4 bg-slate-800/50 rounded-xl">
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <p class="text-sm font-semibold text-white">{{ $p[1] }}</p>
                        <p class="text-xs text-slate-500">{{ $p[0] }}</p>
                    </div>
                    <span class="text-xs px-2 py-0.5 rounded-lg
                        {{ $p[3] === 'orange' ? 'bg-orange-500/10 text-orange-400' :
                           ($p[3] === 'red' ? 'bg-red-500/10 text-red-400' : 'bg-emerald-500/10 text-emerald-400') }}">
                        {{ $p[2] }}
                    </span>
                </div>
                @if($p[4])
                <button class="text-xs bg-orange-500 hover:bg-orange-400 text-white rounded-lg px-3 py-1.5 transition">
                    📷 Upload Foto Hasil
                </button>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    {{-- Absensi Hari Ini --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-white">Absensi Hari Ini</h3>
            <a href="{{ route('kepala-wh.attendance') }}" class="text-xs text-orange-400 hover:underline">Rekap</a>
        </div>
        <div class="space-y-2">
            @foreach([
                ['Ahmad S.', 'Tukang', '07:45', 'Hadir'],
                ['Budi R.', 'Tukang', '08:02', 'Hadir'],
                ['Cecep', 'Tukang', '-', 'Tidak Hadir'],
                ['Dedi', 'Mandor', '07:30', 'Hadir'],
                ['Eko', 'Tukang', '-', 'Izin'],
            ] as $a)
            <div class="flex items-center gap-3 px-3 py-2 rounded-xl bg-slate-800/50">
                <div class="w-8 h-8 bg-slate-700 rounded-lg flex items-center justify-center text-xs font-bold text-white flex-shrink-0">
                    {{ strtoupper(substr($a[0], 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm text-white font-medium">{{ $a[0] }}</p>
                    <p class="text-xs text-slate-500">{{ $a[1] }}</p>
                </div>
                <div class="text-right">
                    <p class="text-xs text-slate-400">{{ $a[2] }}</p>
                    <span class="text-xs {{ $a[3] === 'Hadir' ? 'text-emerald-400' : ($a[3] === 'Izin' ? 'text-yellow-400' : 'text-red-400') }}">
                        ● {{ $a[3] }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Label Bahan Baku --}}
<div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h3 class="font-semibold text-white">Label Bahan Baku</h3>
            <p class="text-xs text-slate-500">Material yang sudah dikunci per project</p>
        </div>
        <a href="{{ route('kepala-wh.bahan-baku') }}"
            class="text-xs bg-orange-500 hover:bg-orange-400 text-white rounded-xl px-3 py-2 transition">
            + Tambah Label
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-slate-500 border-b border-slate-800">
                    <th class="text-left pb-3 font-medium">Material</th>
                    <th class="text-left pb-3 font-medium">Project</th>
                    <th class="text-left pb-3 font-medium">Jumlah</th>
                    <th class="text-left pb-3 font-medium">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @foreach([
                    ['Aluminium Frame 6061', 'PRJ-001', '120 batang', 'Terkunci'],
                    ['Kaca Tempered 8mm', 'PRJ-001', '48 lembar', 'Terkunci'],
                    ['Kusen Aluminium', 'PRJ-005', '30 set', 'Terkunci'],
                    ['Sealant Silicon', 'PRJ-007', '24 tube', 'Bebas'],
                ] as $b)
                <tr>
                    <td class="py-3 text-white font-medium">{{ $b[0] }}</td>
                    <td class="py-3 text-slate-400">{{ $b[1] }}</td>
                    <td class="py-3 text-slate-300">{{ $b[2] }}</td>
                    <td class="py-3">
                        <span class="text-xs px-2 py-1 rounded-lg
                            {{ $b[3] === 'Terkunci' ? 'bg-red-500/10 text-red-400' : 'bg-emerald-500/10 text-emerald-400' }}">
                            {{ $b[3] === 'Terkunci' ? '🔒 Terkunci' : '✓ Bebas' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection