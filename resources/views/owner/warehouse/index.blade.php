@extends('layouts.app')
@section('title','Status Warehouse')
@section('page-title','Status Warehouse')
@section('page-subtitle','Beban kerja & aktivitas seluruh warehouse')
@section('content')

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-5">
    @foreach([
        ['WH-1','Bekasi Utara',2,'Santai','emerald',22,'Pak Yudi'],
        ['WH-2','Bekasi Selatan',5,'Sedang','amber',18,'Pak Heru'],
        ['WH-3','Bekasi Barat',7,'Penuh','red',25,'Pak Agus'],
        ['WH-4','Cikarang',1,'Santai','emerald',15,'Pak Budi'],
        ['WH-5','Tambun',4,'Sedang','amber',20,'Pak Slamet'],
        ['WH-6','Cibitung',0,'Kosong','slate',12,'Pak Tanto'],
        ['WH-7','Karawang',3,'Santai','emerald',17,'Pak Rudi'],
        ['WH-8','Purwakarta',6,'Penuh','red',14,'Pak Wahyu'],
    ] as $w)
    <div class="bg-[#0d1425] border {{ $w[4]==='red'?'border-red-500/20':($w[4]==='amber'?'border-amber-500/20':'border-white/5') }} rounded-2xl p-4">
        <div class="flex justify-between items-start mb-3">
            <div>
                <p class="font-bold text-white">{{ $w[0] }}</p>
                <p class="text-[10px] text-slate-500">{{ $w[1] }}</p>
            </div>
            <span class="text-[10px] px-2 py-0.5 rounded-full
                {{ $w[4]==='emerald'?'bg-emerald-500/10 text-emerald-400':($w[4]==='amber'?'bg-amber-500/10 text-amber-400':($w[4]==='red'?'bg-red-500/10 text-red-400':'bg-slate-700 text-slate-500')) }}">
                {{ $w[3] }}
            </span>
        </div>
        <div class="mb-2">
            <div class="flex justify-between text-[10px] mb-1">
                <span class="text-slate-500">{{ $w[2] }} project aktif</span>
                <span class="text-slate-600">/ 8</span>
            </div>
            <div class="w-full bg-white/5 rounded-full h-1">
                <div class="h-1 rounded-full {{ $w[4]==='red'?'bg-red-500':($w[4]==='amber'?'bg-amber-500':($w[4]==='emerald'?'bg-emerald-500':'bg-slate-600')) }}"
                    style="width:{{ $w[2]/8*100 }}%"></div>
            </div>
        </div>
        <p class="text-[10px] text-slate-500">{{ $w[5] }} tukang · {{ $w[6] }}</p>
    </div>
    @endforeach
</div>

{{-- Detail tabel --}}
<div class="bg-[#0d1425] border border-white/5 rounded-2xl overflow-hidden">
    <div class="px-5 py-4 border-b border-white/5">
        <p class="text-sm font-semibold text-white">Detail Project per Warehouse</p>
    </div>
    <table class="w-full text-xs">
        <thead><tr class="border-b border-white/5 text-slate-500">
            <th class="text-left px-5 py-3 font-medium">WH</th>
            <th class="text-left px-5 py-3 font-medium">Project</th>
            <th class="text-left px-5 py-3 font-medium">Customer</th>
            <th class="text-left px-5 py-3 font-medium">Tahap</th>
            <th class="text-left px-5 py-3 font-medium hidden md:table-cell">Tukang Aktif</th>
        </tr></thead>
        <tbody class="divide-y divide-white/5">
            @foreach([
                ['WH-3','PRJ-001 — Gedung PT Bangun Jaya','PT Bangun Jaya','QC Foto','6'],
                ['WH-3','PRJ-007 — Villa Pak Hendra','Bpk Hendra','Produksi','4'],
                ['WH-1','PRJ-002 — Ruko IKN Blok C','CV Maju','Input Spek','0'],
                ['WH-5','PRJ-003 — Fasad Apartemen X','CV Karya','Pengiriman','0'],
                ['WH-2','PRJ-004 — Kantor BSD Tower','PT Graha','Pemasangan','0'],
            ] as $r)
            <tr class="hover:bg-white/[.02] transition">
                <td class="px-5 py-3"><span class="px-2 py-0.5 rounded-md bg-white/5 text-slate-300 text-[10px]">{{ $r[0] }}</span></td>
                <td class="px-5 py-3 text-white font-medium">{{ $r[1] }}</td>
                <td class="px-5 py-3 text-slate-400">{{ $r[2] }}</td>
                <td class="px-5 py-3"><span class="px-2 py-0.5 rounded-md bg-orange-500/10 text-orange-400 text-[10px]">{{ $r[3] }}</span></td>
                <td class="px-5 py-3 text-slate-400 hidden md:table-cell">{{ $r[4] }} orang</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection