@extends('layouts.app')
@section('title','Alur Project')
@section('page-title','Alur Project')
@section('page-subtitle','Pantau progress end-to-end tiap project')
@section('content')

<div class="space-y-3">
    @foreach([
        ['PRJ-001','Gedung PT Bangun Jaya','PT Bangun Jaya','WH-3','Pak Agus','30 Jun 2026',3,
            ['✓ Input Spek','✓ Produksi','⟳ QC Foto','○ Pengiriman','○ Pasang','○ Selesai']],
        ['PRJ-002','Ruko IKN Blok C','CV Maju Bersama','WH-1','Pak Yudi','15 Jul 2026',2,
            ['✓ Input Spek','⟳ Produksi','○ QC Foto','○ Pengiriman','○ Pasang','○ Selesai']],
        ['PRJ-003','Fasad Apartemen X','CV Karya Muda','WH-5','Pak Slamet','20 Jul 2026',4,
            ['✓ Input Spek','✓ Produksi','✓ QC Foto','⟳ Pengiriman','○ Pasang','○ Selesai']],
        ['PRJ-004','Kantor BSD Tower','PT Graha Indah','WH-2','Pak Heru','5 Jun 2026',5,
            ['✓ Input Spek','✓ Produksi','✓ QC Foto','✓ Pengiriman','⟳ Pasang','○ Selesai']],
        ['PRJ-006','Showroom Yamaha','PT YMI','WH-6','Pak Tanto','1 Mei 2026',6,
            ['✓ Input Spek','✓ Produksi','✓ QC Foto','✓ Pengiriman','✓ Pasang','✓ Selesai']],
    ] as $p)
    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5">
        <div class="flex flex-wrap items-start justify-between gap-3 mb-4">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-[10px] text-slate-500 font-mono">{{ $p[0] }}</span>
                    <span class="text-[10px] px-2 py-0.5 rounded-full
                        {{ $p[6]===6?'bg-emerald-500/10 text-emerald-400':'bg-orange-500/10 text-orange-400' }}">
                        {{ $p[7][$p[6]-1] === '✓ Selesai' || $p[6]===6 ? 'Selesai' : 'Berjalan' }}
                    </span>
                </div>
                <p class="font-semibold text-white">{{ $p[1] }}</p>
                <p class="text-xs text-slate-500">{{ $p[2] }} · {{ $p[3] }} · Kepala: {{ $p[4] }}</p>
            </div>
            <p class="text-[10px] text-slate-600">Target: {{ $p[5] }}</p>
        </div>

        {{-- Steps --}}
        <div class="flex items-center gap-0 overflow-x-auto pb-1">
            @foreach($p[7] as $i => $step)
            @php
                $done = str_starts_with($step,'✓');
                $current = str_starts_with($step,'⟳');
                $label = str_replace(['✓ ','⟳ ','○ '],'',$step);
            @endphp
            <div class="flex items-center flex-shrink-0">
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold
                        {{ $done?'bg-emerald-500 text-white':($current?'bg-orange-500 text-white':'bg-white/5 text-slate-600') }}">
                        {{ $done ? '✓' : ($current ? '⟳' : $i+1) }}
                    </div>
                    <p class="text-[9px] mt-1 whitespace-nowrap
                        {{ $done?'text-emerald-400':($current?'text-orange-400':'text-slate-600') }}">{{ $label }}</p>
                </div>
                @if(!$loop->last)
                <div class="w-8 h-px {{ $done?'bg-emerald-500/40':'bg-white/5' }} mb-3 mx-1"></div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
@endsection