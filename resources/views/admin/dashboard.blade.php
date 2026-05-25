@extends('layouts.app')
@section('title','Dashboard Admin')
@section('page-title','Dashboard Admin')
@section('page-subtitle','Overview seluruh operasional CV Mugi Jaya')
@section('content')

<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-5">
    @foreach([
        ['Total User','42','↑ 3 baru bulan ini','orange','M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
        ['Warehouse','8','Semua aktif','blue','M3 7l9-4 9 4M3 7v13h18V7M3 7l9 4 9-4'],
        ['Project Aktif','14','3 perlu perhatian','amber','M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
        ['Truk Beroperasi','6 / 9','2 sedang kirim','emerald','M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z'],
    ] as $s)
    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-4">
        <div class="flex items-center justify-between mb-3">
            <p class="text-xs text-slate-500">{{ $s[0] }}</p>
            <div class="w-7 h-7 rounded-lg flex items-center justify-center
                {{ $s[3]==='orange'?'bg-orange-500/10':($s[3]==='blue'?'bg-blue-500/10':($s[3]==='amber'?'bg-amber-500/10':'bg-emerald-500/10')) }}">
                <svg class="w-3.5 h-3.5 {{ $s[3]==='orange'?'text-orange-400':($s[3]==='blue'?'text-blue-400':($s[3]==='amber'?'text-amber-400':'text-emerald-400')) }}"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $s[4] }}"/>
                </svg>
            </div>
        </div>
        <p class="text-2xl font-bold text-white">{{ $s[1] }}</p>
        <p class="text-[11px] text-slate-500 mt-0.5">{{ $s[2] }}</p>
    </div>
    @endforeach
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4">
    {{-- User table --}}
    <div class="lg:col-span-2 bg-[#0d1425] border border-white/5 rounded-2xl p-5">
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm font-semibold text-white">User Terdaftar</p>
            <a href="{{ route('admin.users') }}" class="text-xs text-orange-400 hover:underline">Kelola →</a>
        </div>
        <table class="w-full text-xs">
            <thead><tr class="text-slate-600 border-b border-white/5">
                <th class="text-left pb-2 font-medium">Nama</th>
                <th class="text-left pb-2 font-medium">Role</th>
                <th class="text-left pb-2 font-medium hidden sm:table-cell">WH</th>
                <th class="text-left pb-2 font-medium">Status</th>
                <th class="pb-2"></th>
            </tr></thead>
            <tbody class="divide-y divide-white/5">
                @foreach([
                    ['Pak Sukma','Owner','-','Aktif','purple'],
                    ['Pak Yudi','Kepala WH','WH-3','Aktif','blue'],
                    ['Pak Egi','Engineering','-','Aktif','teal'],
                    ['Budi S.','Sopir','-','Aktif','orange'],
                    ['Pak Darto','Mandor','-','Aktif','orange'],
                    ['Ahmad','Tukang','WH-3','Non-aktif','slate'],
                ] as $u)
                <tr>
                    <td class="py-2.5 text-white font-medium">{{ $u[0] }}</td>
                    <td class="py-2.5">
                        <span class="px-2 py-0.5 rounded-md text-[10px] font-medium
                            {{ $u[4]==='purple'?'bg-purple-500/10 text-purple-400':($u[4]==='blue'?'bg-blue-500/10 text-blue-400':($u[4]==='teal'?'bg-teal-500/10 text-teal-400':($u[4]==='orange'?'bg-orange-500/10 text-orange-400':'bg-slate-700 text-slate-400'))) }}">
                            {{ $u[1] }}
                        </span>
                    </td>
                    <td class="py-2.5 text-slate-500 hidden sm:table-cell">{{ $u[2] }}</td>
                    <td class="py-2.5">
                        <span class="text-[10px] {{ $u[3]==='Aktif'?'text-emerald-400':'text-slate-500' }}">● {{ $u[3] }}</span>
                    </td>
                    <td class="py-2.5 text-right">
                        <button class="text-slate-500 hover:text-orange-400 transition text-[10px]">Edit</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Truk --}}
    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5">
        <div class="flex items-center justify-between mb-4">
            <p class="text-sm font-semibold text-white">Status Truk</p>
            <a href="{{ route('admin.trucks') }}" class="text-xs text-orange-400 hover:underline">Semua →</a>
        </div>
        <div class="space-y-2">
            @foreach([
                ['B 1234 XY','WH-3 → IKN','Pengiriman','blue'],
                ['B 5678 AB','BSD → WH-1','Kembali','amber'],
                ['B 9012 CD','WH-5','Standby','slate'],
                ['B 3456 EF','WH-2 → Serpong','Pengiriman','blue'],
                ['B 7890 GH','WH-7','Standby','slate'],
            ] as $t)
            <div class="flex items-center gap-3 p-2.5 bg-white/[.03] rounded-xl">
                <div class="w-7 h-7 rounded-lg flex items-center justify-center flex-shrink-0
                    {{ $t[3]==='blue'?'bg-blue-500/10':($t[3]==='amber'?'bg-amber-500/10':'bg-slate-700/50') }}">
                    <svg class="w-3.5 h-3.5 {{ $t[3]==='blue'?'text-blue-400':($t[3]==='amber'?'text-amber-400':'text-slate-500') }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2 2M13 16H9m4 0h5l2-2V9l-3-3h-4v10z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-semibold text-white">{{ $t[0] }}</p>
                    <p class="text-[10px] text-slate-500 truncate">{{ $t[1] }}</p>
                </div>
                <span class="text-[10px] {{ $t[3]==='blue'?'text-blue-400':($t[3]==='amber'?'text-amber-400':'text-slate-500') }}">{{ $t[2] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Project summary --}}
<div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5">
    <div class="flex items-center justify-between mb-4">
        <p class="text-sm font-semibold text-white">Project Berjalan</p>
        <a href="{{ route('admin.projects') }}" class="text-xs text-orange-400 hover:underline">Semua →</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-xs whitespace-nowrap">
            <thead><tr class="text-slate-600 border-b border-white/5">
                <th class="text-left pb-2 font-medium">ID</th>
                <th class="text-left pb-2 font-medium">Project</th>
                <th class="text-left pb-2 font-medium">Customer</th>
                <th class="text-left pb-2 font-medium">WH</th>
                <th class="text-left pb-2 font-medium">Tahap</th>
                <th class="text-left pb-2 font-medium">Progress</th>
            </tr></thead>
            <tbody class="divide-y divide-white/5">
                @foreach([
                    ['PRJ-001','Gedung PT Bangun Jaya','PT Bangun Jaya','WH-3','QC Foto',3],
                    ['PRJ-002','Ruko IKN Blok C','CV Maju','WH-1','Produksi',2],
                    ['PRJ-003','Villa Pak Hendra','Bpk Hendra','WH-5','Pengiriman',4],
                    ['PRJ-004','Kantor BSD Tower','PT Graha','WH-2','Pemasangan',5],
                ] as $p)
                <tr>
                    <td class="py-2.5 text-slate-500">{{ $p[0] }}</td>
                    <td class="py-2.5 text-white font-medium">{{ $p[1] }}</td>
                    <td class="py-2.5 text-slate-400">{{ $p[2] }}</td>
                    <td class="py-2.5 text-slate-400">{{ $p[3] }}</td>
                    <td class="py-2.5"><span class="px-2 py-0.5 rounded-md bg-orange-500/10 text-orange-400">{{ $p[4] }}</span></td>
                    <td class="py-2.5">
                        <div class="flex items-center gap-0.5">
                            @foreach(range(1,6) as $i)
                            <div class="w-4 h-4 rounded-full text-[8px] font-bold flex items-center justify-center
                                {{ $i <= $p[5] ? 'bg-orange-500 text-white' : 'bg-white/5 text-slate-600' }}">{{ $i }}</div>
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