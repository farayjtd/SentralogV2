@extends('layouts.app')
@section('title','Project Masuk')
@section('page-title','Project Masuk — WH-3')
@section('page-subtitle','Project yang diberikan tim Teknik Sipil')
@section('content')

<div class="grid grid-cols-1 gap-4">
    @foreach([
        ['PRJ-001','Gedung PT Bangun Jaya','Pak Egi','Aluminium Frame 6061 + Kaca Tempered 8mm','120 batang + 48 lembar','30 Jun 2026','Produksi','orange',true,false],
        ['PRJ-005','Ruko IKN Blok C','Pak Egi','Kusen Aluminium + Pintu Kaca','30 set','10 Jul 2026','Upload Foto','red',false,true],
        ['PRJ-007','Villa Pak Hendra','Pak Egi','Aluminium Composite Panel','200 m²','25 Jun 2026','Selesai Produksi','emerald',false,false],
    ] as $p)
    <div class="bg-[#0d1425] border {{ $p[7]==='red'?'border-red-500/20':($p[7]==='orange'?'border-orange-500/10':'border-white/5') }} rounded-2xl p-5">
        <div class="flex flex-wrap items-start justify-between gap-3 mb-4">
            <div>
                <div class="flex items-center gap-2 mb-1">
                    <span class="text-[10px] font-mono text-slate-500">{{ $p[0] }}</span>
                    <span class="text-[10px] px-2 py-0.5 rounded-full
                        {{ $p[7]==='orange'?'bg-orange-500/10 text-orange-400':($p[7]==='red'?'bg-red-500/10 text-red-400':'bg-emerald-500/10 text-emerald-400') }}">
                        {{ $p[6] }}
                    </span>
                </div>
                <p class="font-semibold text-white">{{ $p[1] }}</p>
                <p class="text-xs text-slate-500">Dari: {{ $p[2] }} · Target: {{ $p[5] }}</p>
            </div>
            <div class="flex gap-2">
                @if($p[8])
                <button class="text-xs bg-orange-500 hover:bg-orange-400 text-white rounded-xl px-3 py-1.5 transition flex items-center gap-1.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Assign Sopir & Mandor
                </button>
                @endif
                @if($p[9])
                <button class="text-xs bg-blue-500 hover:bg-blue-400 text-white rounded-xl px-3 py-1.5 transition flex items-center gap-1.5">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Upload Foto
                </button>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 text-xs">
            <div class="bg-white/[.03] rounded-xl p-3">
                <p class="text-slate-500 mb-1">Material</p>
                <p class="text-white font-medium">{{ $p[3] }}</p>
            </div>
            <div class="bg-white/[.03] rounded-xl p-3">
                <p class="text-slate-500 mb-1">Jumlah</p>
                <p class="text-white font-medium">{{ $p[4] }}</p>
            </div>
            <div class="bg-white/[.03] rounded-xl p-3">
                <p class="text-slate-500 mb-1">File BOQ</p>
                <a href="#" class="text-orange-400 hover:underline">📄 Lihat BOQ</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection