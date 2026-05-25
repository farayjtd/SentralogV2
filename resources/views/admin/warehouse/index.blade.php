@extends('layouts.app')
@section('title','Warehouse')
@section('page-title','Master Warehouse')
@section('page-subtitle','8 warehouse aktif di Bekasi & sekitarnya')
@section('content')

<div class="flex justify-end mb-5">
    <button onclick="document.getElementById('modalWh').classList.remove('hidden')"
        class="bg-orange-500 hover:bg-orange-400 text-white text-xs font-semibold rounded-xl px-4 py-2.5 transition flex items-center gap-2">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Warehouse
    </button>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    @foreach([
        ['WH-1','Bekasi Utara','Jl. Raya Bekasi Utara No.12','Pak Yudi','22','2','Aktif'],
        ['WH-2','Bekasi Selatan','Jl. Ahmad Yani No.45','Pak Heru','18','5','Aktif'],
        ['WH-3','Bekasi Barat','Jl. KH Noer Ali No.7','Pak Agus','25','7','Aktif'],
        ['WH-4','Cikarang','Jl. Industri Cikarang','Pak Budi','15','1','Aktif'],
        ['WH-5','Tambun','Jl. Raya Tambun No.9','Pak Slamet','20','4','Aktif'],
        ['WH-6','Cibitung','Jl. Cibitung Raya No.3','Pak Tanto','12','0','Aktif'],
        ['WH-7','Karawang','Jl. Suroto Adi No.11','Pak Rudi','17','3','Aktif'],
        ['WH-8','Purwakarta','Jl. Gandanegara No.5','Pak Wahyu','14','6','Non-aktif'],
    ] as $w)
    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5 hover:border-white/10 transition">
        <div class="flex items-start justify-between mb-3">
            <div>
                <p class="font-bold text-white text-base">{{ $w[0] }}</p>
                <p class="text-xs text-slate-500">{{ $w[1] }}</p>
            </div>
            <span class="text-[10px] px-2 py-0.5 rounded-full {{ $w[6]==='Aktif'?'bg-emerald-500/10 text-emerald-400':'bg-red-500/10 text-red-400' }}">
                {{ $w[6] }}
            </span>
        </div>
        <p class="text-[10px] text-slate-600 mb-3 leading-relaxed">{{ $w[2] }}</p>
        <div class="flex items-center justify-between text-[10px] text-slate-500 mb-3">
            <span>Kepala: <span class="text-slate-300">{{ $w[3] }}</span></span>
            <span><span class="text-white font-semibold">{{ $w[4] }}</span> tukang</span>
        </div>
        <div class="mb-3">
            <div class="flex justify-between text-[10px] mb-1">
                <span class="text-slate-500">Beban kerja</span>
                <span class="text-slate-400">{{ $w[5] }}/8 project</span>
            </div>
            <div class="w-full bg-white/5 rounded-full h-1">
                @php $pct = intval($w[5])/8*100 @endphp
                <div class="h-1 rounded-full {{ $pct>=75?'bg-red-500':($pct>=50?'bg-amber-500':'bg-emerald-500') }}"
                    style="width:{{ $pct }}%"></div>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="flex-1 text-[10px] py-1.5 rounded-lg bg-white/5 hover:bg-white/10 text-slate-400 transition">Edit</button>
            <button class="flex-1 text-[10px] py-1.5 rounded-lg bg-white/5 hover:bg-white/10 text-slate-400 transition">Detail</button>
        </div>
    </div>
    @endforeach
</div>

<div id="modalWh" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="bg-[#0d1425] border border-white/10 rounded-2xl w-full max-w-md p-6">
        <div class="flex justify-between items-center mb-5">
            <h3 class="font-semibold text-white">Tambah Warehouse</h3>
            <button onclick="document.getElementById('modalWh').classList.add('hidden')" class="text-slate-500 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="space-y-3">
            <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">Kode WH</label>
                <input type="text" placeholder="cth: WH-9" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600"></div>
            <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">Nama / Lokasi</label>
                <input type="text" placeholder="cth: Karawang Timur" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600"></div>
            <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">Alamat</label>
                <input type="text" placeholder="Alamat lengkap" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600"></div>
            <div class="flex gap-3 pt-2">
                <button onclick="document.getElementById('modalWh').classList.add('hidden')"
                    class="flex-1 bg-white/5 text-slate-300 font-semibold rounded-xl py-2.5 text-sm hover:bg-white/10 transition">Batal</button>
                <button class="flex-1 bg-orange-500 hover:bg-orange-400 text-white font-semibold rounded-xl py-2.5 text-sm transition">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection