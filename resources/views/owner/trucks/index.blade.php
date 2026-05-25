@extends('layouts.app')
@section('title','Tracking Truk')
@section('page-title','Tracking Armada')
@section('page-subtitle','Posisi & histori seluruh truk secara real-time')
@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-5">
    <div class="lg:col-span-2 bg-[#0d1425] border border-white/5 rounded-2xl p-5">
        <div class="flex items-center justify-between mb-3">
            <p class="text-sm font-semibold text-white">Peta Real-time</p>
            <span class="text-[10px] px-2 py-0.5 bg-emerald-500/10 text-emerald-400 rounded-full">● Live</span>
        </div>
        <div class="w-full h-64 bg-[#0a0f1e] rounded-xl border border-white/5 flex items-center justify-center">
            <div class="text-center">
                <svg class="w-12 h-12 text-slate-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                <p class="text-slate-600 text-xs">Integrate Leaflet.js / Google Maps</p>
            </div>
        </div>
    </div>
    <div class="space-y-3">
        <p class="text-xs font-semibold text-slate-400 px-1">Truk Aktif</p>
        @foreach([
            ['B 1234 XY','Budi S.','WH-3 → IKN','Pengiriman','blue','45 km lagi'],
            ['B 5678 AB','Eko P.','BSD → WH-1','Kembali','amber','12 km lagi'],
            ['B 3456 EF','Samsul H.','WH-2 → Serpong','Pengiriman','blue','30 km lagi'],
        ] as $t)
        <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-4">
            <div class="flex justify-between items-start mb-2">
                <div>
                    <p class="text-sm font-bold text-white">{{ $t[0] }}</p>
                    <p class="text-[10px] text-slate-500">Sopir: {{ $t[1] }}</p>
                </div>
                <span class="text-[10px] px-2 py-0.5 rounded-full
                    {{ $t[3]==='Pengiriman'?'bg-blue-500/10 text-blue-400':'bg-amber-500/10 text-amber-400' }}">
                    {{ $t[3] }}
                </span>
            </div>
            <p class="text-[10px] text-slate-400 mb-1">{{ $t[2] }}</p>
            <p class="text-[10px] text-slate-600">{{ $t[5] }}</p>
        </div>
        @endforeach
    </div>
</div>

{{-- Histori --}}
<div class="bg-[#0d1425] border border-white/5 rounded-2xl overflow-hidden">
    <div class="px-5 py-4 border-b border-white/5">
        <p class="text-sm font-semibold text-white">Histori Pengiriman</p>
    </div>
    <table class="w-full text-xs">
        <thead><tr class="border-b border-white/5 text-slate-500">
            <th class="text-left px-5 py-3 font-medium">No. Surat Jalan</th>
            <th class="text-left px-5 py-3 font-medium">Truk</th>
            <th class="text-left px-5 py-3 font-medium hidden md:table-cell">Project</th>
            <th class="text-left px-5 py-3 font-medium">Tujuan</th>
            <th class="text-left px-5 py-3 font-medium">Status</th>
            <th class="text-left px-5 py-3 font-medium hidden lg:table-cell">Tanggal</th>
        </tr></thead>
        <tbody class="divide-y divide-white/5">
            @foreach([
                ['SJ-2025-0077','B 1234 XY','PRJ-001','IKN, Kaltim','Dalam Perjalanan','25 Mei 2026'],
                ['SJ-2025-0076','B 5678 AB','PRJ-004','BSD, Tangerang','Selesai','24 Mei 2026'],
                ['SJ-2025-0075','B 3456 EF','PRJ-003','Serpong','Selesai','22 Mei 2026'],
                ['SJ-2025-0074','B 9012 CD','PRJ-002','Bekasi','Selesai','20 Mei 2026'],
            ] as $h)
            <tr class="hover:bg-white/[.02] transition">
                <td class="px-5 py-3 text-slate-400 font-mono">{{ $h[0] }}</td>
                <td class="px-5 py-3 text-white font-semibold">{{ $h[1] }}</td>
                <td class="px-5 py-3 text-slate-400 hidden md:table-cell">{{ $h[2] }}</td>
                <td class="px-5 py-3 text-slate-300">{{ $h[3] }}</td>
                <td class="px-5 py-3">
                    <span class="px-2 py-0.5 rounded-md text-[10px]
                        {{ $h[4]==='Selesai'?'bg-emerald-500/10 text-emerald-400':'bg-blue-500/10 text-blue-400' }}">
                        {{ $h[4] }}
                    </span>
                </td>
                <td class="px-5 py-3 text-slate-600 hidden lg:table-cell">{{ $h[5] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection