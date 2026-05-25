@extends('layouts.app')
@section('title', 'Dashboard Owner')
@section('page-title', 'Dashboard Owner')
@section('page-subtitle', 'Pantau seluruh operasional warehouse & pengiriman')

@section('content')
{{-- Summary Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <p class="text-xs text-slate-500 mb-1">Project Aktif</p>
        <p class="text-2xl font-bold text-white">14</p>
        <p class="text-xs text-orange-400 mt-1">3 perlu perhatian</p>
    </div>
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <p class="text-xs text-slate-500 mb-1">Truk di Jalan</p>
        <p class="text-2xl font-bold text-white">2</p>
        <p class="text-xs text-blue-400 mt-1">Live tracking aktif</p>
    </div>
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <p class="text-xs text-slate-500 mb-1">WH Tersibuk</p>
        <p class="text-2xl font-bold text-white">WH-3</p>
        <p class="text-xs text-red-400 mt-1">5 project berjalan</p>
    </div>
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <p class="text-xs text-slate-500 mb-1">Selesai Bulan Ini</p>
        <p class="text-2xl font-bold text-white">7</p>
        <p class="text-xs text-emerald-400 mt-1">↑ dari bulan lalu</p>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    {{-- Status Warehouse --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-white">Beban Kerja Warehouse</h3>
            <a href="{{ route('owner.warehouse') }}" class="text-xs text-orange-400 hover:underline">Detail</a>
        </div>
        <div class="space-y-3">
            @foreach([
                ['WH-1', 'Bekasi Utara', 2, 8],
                ['WH-2', 'Bekasi Selatan', 5, 8],
                ['WH-3', 'Bekasi Barat', 7, 8],
                ['WH-4', 'Cikarang', 1, 8],
                ['WH-5', 'Tambun', 4, 8],
            ] as $wh)
            <div>
                <div class="flex justify-between text-xs mb-1">
                    <span class="text-white font-medium">{{ $wh[0] }} <span class="text-slate-500 font-normal">— {{ $wh[1] }}</span></span>
                    <span class="text-slate-400">{{ $wh[2] }}/{{ $wh[3] }} project</span>
                </div>
                <div class="w-full bg-slate-800 rounded-full h-1.5">
                    <div class="h-1.5 rounded-full transition-all
                        {{ $wh[2] >= 6 ? 'bg-red-500' : ($wh[2] >= 4 ? 'bg-orange-500' : 'bg-emerald-500') }}"
                        style="width: {{ ($wh[2]/$wh[3])*100 }}%"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Tracking Truk --}}
    <div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
        <div class="flex items-center justify-between mb-4">
            <h3 class="font-semibold text-white">Posisi Truk Real-time</h3>
            <a href="{{ route('owner.trucks') }}" class="text-xs text-orange-400 hover:underline">Peta penuh</a>
        </div>
        {{-- Map placeholder --}}
        <div class="w-full h-40 bg-slate-800 rounded-xl flex items-center justify-center mb-4 border border-slate-700">
            <div class="text-center">
                <svg class="w-10 h-10 text-slate-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                </svg>
                <p class="text-slate-500 text-xs">Integrasikan Leaflet.js / Google Maps</p>
            </div>
        </div>
        <div class="space-y-2">
            @foreach([
                ['B 1234 XY', 'Menuju Proyek IKN', 'Pengiriman', 'blue'],
                ['B 5678 AB', 'Kembali dari BSD', 'Pulang', 'orange'],
            ] as $t)
            <div class="flex items-center justify-between p-3 bg-slate-800 rounded-xl text-sm">
                <div>
                    <p class="text-white font-semibold">{{ $t[0] }}</p>
                    <p class="text-slate-400 text-xs">{{ $t[1] }}</p>
                </div>
                <span class="text-xs px-2 py-1 rounded-lg
                    {{ $t[3] === 'blue' ? 'bg-blue-500/10 text-blue-400' : 'bg-orange-500/10 text-orange-400' }}">
                    {{ $t[2] }}
                </span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Alur Project Terbaru --}}
<div class="bg-slate-900 border border-slate-800 rounded-2xl p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold text-white">Alur Project Terbaru</h3>
        <a href="{{ route('owner.projects') }}" class="text-xs text-orange-400 hover:underline">Semua project</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="text-slate-500 border-b border-slate-800">
                    <th class="text-left pb-3 font-medium">Project</th>
                    <th class="text-left pb-3 font-medium">Customer</th>
                    <th class="text-left pb-3 font-medium">WH</th>
                    <th class="text-left pb-3 font-medium">Tahap</th>
                    <th class="text-left pb-3 font-medium">Progress</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-800">
                @foreach([
                    ['PRJ-001', 'PT Bangun Jaya', 'WH-3', 'QC Foto', 3],
                    ['PRJ-002', 'CV Maju Bersama', 'WH-1', 'Produksi', 2],
                    ['PRJ-003', 'PT Graha Indah', 'WH-5', 'Pengiriman', 4],
                    ['PRJ-004', 'Bpk. Hartono', 'WH-2', 'Pemasangan', 5],
                ] as $p)
                <tr>
                    <td class="py-3 text-white font-medium">{{ $p[0] }}</td>
                    <td class="py-3 text-slate-300">{{ $p[1] }}</td>
                    <td class="py-3 text-slate-400">{{ $p[2] }}</td>
                    <td class="py-3">
                        <span class="text-xs px-2 py-1 rounded-lg bg-orange-500/10 text-orange-400">{{ $p[3] }}</span>
                    </td>
                    <td class="py-3">
                        {{-- Step indicators --}}
                        <div class="flex items-center gap-1">
                            @foreach(['Spek', 'Produksi', 'QC', 'Kirim', 'Pasang', 'Selesai'] as $i => $step)
                            <div class="w-5 h-5 rounded-full text-xs flex items-center justify-center
                                {{ $i < $p[4] ? 'bg-orange-500 text-white' : 'bg-slate-800 text-slate-600' }}"
                                title="{{ $step }}">
                                {{ $i + 1 }}
                            </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection