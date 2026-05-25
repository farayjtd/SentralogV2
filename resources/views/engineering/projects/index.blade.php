@extends('layouts.app')
@section('title','Daftar Project')
@section('page-title','Daftar Project Saya')
@section('page-subtitle','Semua project yang sudah Anda input')
@section('content')

<div class="flex justify-end mb-5">
    <a href="{{ route('engineering.projects.create') }}"
        class="bg-orange-500 hover:bg-orange-400 text-white text-xs font-semibold rounded-xl px-4 py-2.5 transition flex items-center gap-2">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Buat Project Baru
    </a>
</div>

<div class="space-y-3">
    @foreach([
        ['PRJ-001','Gedung PT Bangun Jaya','PT Bangun Jaya','WH-3','Aluminium Frame 6061, Kaca Tempered 8mm','RAL 9016 / Silver','30 Jun 2026','QC Foto','orange',3],
        ['PRJ-002','Ruko IKN Blok C','CV Maju Bersama','WH-1','Kusen Aluminium, Pintu Kaca','Natural Anodize','15 Jul 2026','Produksi','amber',2],
        ['PRJ-005','Fasad Apartemen X','CV Karya Muda','WH-4','Aluminium Composite Panel','Champagne Gold','20 Jul 2026','Menunggu','slate',1],
        ['PRJ-006','Showroom Yamaha','PT YMI','WH-6','Pintu Swing Kaca, Partisi','Silver','1 Mei 2026','Selesai','emerald',6],
    ] as $p)
    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5">
        <div class="flex flex-wrap items-start justify-between gap-3 mb-3">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-[10px] font-mono text-slate-500">{{ $p[0] }}</span>
                    <span class="text-[10px] px-2 py-0.5 rounded-full
                        {{ $p[8]==='orange'?'bg-orange-500/10 text-orange-400':($p[8]==='amber'?'bg-amber-500/10 text-amber-400':($p[8]==='emerald'?'bg-emerald-500/10 text-emerald-400':'bg-slate-700 text-slate-400')) }}">
                        {{ $p[7] }}
                    </span>
                </div>
                <p class="font-semibold text-white">{{ $p[1] }}</p>
                <p class="text-xs text-slate-500">{{ $p[2] }} · {{ $p[3] }} · Target: {{ $p[6] }}</p>
            </div>
            <div class="flex gap-0.5">
                @foreach(range(1,6) as $i)
                <div class="w-5 h-5 rounded-full text-[8px] font-bold flex items-center justify-center
                    {{ $i<=$p[9]?'bg-orange-500 text-white':'bg-white/5 text-slate-600' }}">{{ $i }}</div>
                @endforeach
            </div>
        </div>
        <div class="flex flex-wrap gap-3 text-[10px]">
            <span class="text-slate-500">Material: <span class="text-slate-300">{{ $p[4] }}</span></span>
            <span class="text-slate-500">Warna: <span class="text-slate-300">{{ $p[5] }}</span></span>
        </div>
    </div>
    @endforeach
</div>
@endsection