@extends('layouts.app')
@section('title','Rekap Absensi')
@section('page-title','Rekap Absensi')
@section('page-subtitle','Semua SDM — tukang, mandor, kepala WH, sopir')
@section('content')

<div class="flex flex-wrap items-center gap-2 mb-5">
    <select class="bg-[#0d1425] border border-white/10 text-slate-400 text-xs rounded-xl px-3 py-2.5 focus:outline-none">
        <option>Mei 2026</option><option>April 2026</option><option>Maret 2026</option>
    </select>
    <select class="bg-[#0d1425] border border-white/10 text-slate-400 text-xs rounded-xl px-3 py-2.5 focus:outline-none">
        <option>Semua WH</option>@foreach(range(1,8) as $i)<option>WH-{{ $i }}</option>@endforeach
    </select>
    <select class="bg-[#0d1425] border border-white/10 text-slate-400 text-xs rounded-xl px-3 py-2.5 focus:outline-none">
        <option>Semua Role</option><option>Tukang</option><option>Mandor</option><option>Sopir</option><option>Kepala WH</option>
    </select>
</div>

<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-5">
    @foreach([['Total SDM','67','slate'],['Hadir Hari Ini','58','emerald'],['Izin','5','amber'],['Tidak Hadir','4','red']] as $s)
    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-4">
        <p class="text-xs text-slate-500 mb-2">{{ $s[0] }}</p>
        <p class="text-2xl font-bold {{ $s[2]==='emerald'?'text-emerald-400':($s[2]==='amber'?'text-amber-400':($s[2]==='red'?'text-red-400':'text-white')) }}">{{ $s[1] }}</p>
    </div>
    @endforeach
</div>

<div class="bg-[#0d1425] border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full text-xs">
        <thead><tr class="border-b border-white/5 text-slate-500">
            <th class="text-left px-5 py-3 font-medium">Nama</th>
            <th class="text-left px-5 py-3 font-medium">Role</th>
            <th class="text-left px-5 py-3 font-medium hidden md:table-cell">WH</th>
            <th class="text-left px-5 py-3 font-medium">Hadir</th>
            <th class="text-left px-5 py-3 font-medium">Izin</th>
            <th class="text-left px-5 py-3 font-medium">Tdk Hadir</th>
            <th class="text-left px-5 py-3 font-medium hidden lg:table-cell">Check-in Hari Ini</th>
            <th class="text-left px-5 py-3 font-medium">Status</th>
        </tr></thead>
        <tbody class="divide-y divide-white/5">
            @foreach([
                ['Ahmad S.','Tukang','WH-3',18,2,1,'07:45','Hadir'],
                ['Budi R.','Tukang','WH-3',20,0,1,'08:02','Hadir'],
                ['Cecep','Tukang','WH-3',15,3,3,'-','Tdk Hadir'],
                ['Dedi','Mandor','WH-3',21,0,0,'07:30','Hadir'],
                ['Eko','Tukang','WH-3',17,2,2,'-','Izin'],
                ['Pak Yudi','Kepala WH','WH-3',21,0,0,'07:15','Hadir'],
                ['Budi Santoso','Sopir','-',19,1,1,'07:50','Hadir'],
                ['Pak Darto','Mandor','-',20,1,0,'07:40','Hadir'],
            ] as $a)
            <tr class="hover:bg-white/[.02] transition">
                <td class="px-5 py-3 text-white font-medium">{{ $a[0] }}</td>
                <td class="px-5 py-3">
                    <span class="px-2 py-0.5 rounded-md bg-white/5 text-slate-400 text-[10px]">{{ $a[1] }}</span>
                </td>
                <td class="px-5 py-3 text-slate-500 hidden md:table-cell">{{ $a[2] }}</td>
                <td class="px-5 py-3 text-emerald-400 font-semibold">{{ $a[3] }}</td>
                <td class="px-5 py-3 text-amber-400">{{ $a[4] }}</td>
                <td class="px-5 py-3 text-red-400">{{ $a[5] }}</td>
                <td class="px-5 py-3 text-slate-400 hidden lg:table-cell">{{ $a[6] }}</td>
                <td class="px-5 py-3">
                    <span class="text-[10px] {{ $a[7]==='Hadir'?'text-emerald-400':($a[7]==='Izin'?'text-amber-400':'text-red-400') }}">● {{ $a[7] }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection