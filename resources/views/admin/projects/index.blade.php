@extends('layouts.app')
@section('title','Semua Project')
@section('page-title','Semua Project')
@section('page-subtitle','Monitor seluruh project dari semua warehouse')
@section('content')

<div class="flex flex-wrap items-center gap-2 mb-5">
    <input type="text" placeholder="Cari project..." class="bg-[#0d1425] border border-white/10 text-white text-xs rounded-xl px-3.5 py-2.5 w-48 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600">
    <select class="bg-[#0d1425] border border-white/10 text-slate-400 text-xs rounded-xl px-3 py-2.5 focus:outline-none">
        <option>Semua WH</option>@foreach(range(1,8) as $i)<option>WH-{{ $i }}</option>@endforeach
    </select>
    <select class="bg-[#0d1425] border border-white/10 text-slate-400 text-xs rounded-xl px-3 py-2.5 focus:outline-none">
        <option>Semua Tahap</option>
        <option>Input Spek</option><option>Produksi</option><option>QC Foto</option>
        <option>Pengiriman</option><option>Pemasangan</option><option>Selesai</option>
    </select>
</div>

<div class="bg-[#0d1425] border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full text-xs">
        <thead><tr class="border-b border-white/5 text-slate-500">
            <th class="text-left px-5 py-3 font-medium">ID</th>
            <th class="text-left px-5 py-3 font-medium">Nama Project</th>
            <th class="text-left px-5 py-3 font-medium hidden md:table-cell">Customer</th>
            <th class="text-left px-5 py-3 font-medium">WH</th>
            <th class="text-left px-5 py-3 font-medium">Tahap</th>
            <th class="text-left px-5 py-3 font-medium hidden lg:table-cell">Progress</th>
            <th class="text-left px-5 py-3 font-medium hidden lg:table-cell">Target</th>
            <th class="px-5 py-3"></th>
        </tr></thead>
        <tbody class="divide-y divide-white/5">
            @foreach([
                ['PRJ-001','Gedung PT Bangun Jaya','PT Bangun Jaya','WH-3','QC Foto',3,'30 Jun 2026'],
                ['PRJ-002','Ruko IKN Blok C','CV Maju Bersama','WH-1','Produksi',2,'15 Jul 2026'],
                ['PRJ-003','Villa Pak Hendra','Bpk. Hendra S.','WH-5','Pengiriman',4,'10 Jun 2026'],
                ['PRJ-004','Kantor BSD Tower','PT Graha Indah','WH-2','Pemasangan',5,'5 Jun 2026'],
                ['PRJ-005','Fasad Apartemen X','CV Karya Muda','WH-4','Input Spek',1,'20 Jul 2026'],
                ['PRJ-006','Showroom Yamaha','PT YMI','WH-6','Selesai',6,'1 Mei 2026'],
            ] as $p)
            <tr class="hover:bg-white/[.02] transition">
                <td class="px-5 py-3 text-slate-500 font-mono">{{ $p[0] }}</td>
                <td class="px-5 py-3 text-white font-medium">{{ $p[1] }}</td>
                <td class="px-5 py-3 text-slate-400 hidden md:table-cell">{{ $p[2] }}</td>
                <td class="px-5 py-3 text-slate-400">{{ $p[3] }}</td>
                <td class="px-5 py-3">
                    <span class="px-2 py-0.5 rounded-md text-[10px] font-medium
                        {{ $p[4]==='Selesai'?'bg-emerald-500/10 text-emerald-400':'bg-orange-500/10 text-orange-400' }}">
                        {{ $p[4] }}
                    </span>
                </td>
                <td class="px-5 py-3 hidden lg:table-cell">
                    <div class="flex gap-0.5">
                        @foreach(range(1,6) as $i)
                        <div class="w-3.5 h-3.5 rounded-full text-[7px] font-bold flex items-center justify-center
                            {{ $i<=$p[5]?'bg-orange-500 text-white':'bg-white/5 text-slate-600' }}">{{ $i }}</div>
                        @endforeach
                    </div>
                </td>
                <td class="px-5 py-3 text-slate-500 hidden lg:table-cell">{{ $p[6] }}</td>
                <td class="px-5 py-3 text-right">
                    <button class="text-slate-500 hover:text-orange-400 transition text-[10px]">Detail</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection