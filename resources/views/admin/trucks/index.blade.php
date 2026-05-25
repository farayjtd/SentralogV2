@extends('layouts.app')
@section('title','Armada Truk')
@section('page-title','Armada Truk')
@section('page-subtitle','Semua armada beserta status real-time')
@section('content')

<div class="flex justify-end mb-5">
    <button onclick="document.getElementById('modalTruck').classList.remove('hidden')"
        class="bg-orange-500 hover:bg-orange-400 text-white text-xs font-semibold rounded-xl px-4 py-2.5 transition flex items-center gap-2">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Truk
    </button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-5">
    {{-- Map placeholder --}}
    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5">
        <p class="text-sm font-semibold text-white mb-3">Peta Posisi Truk</p>
        <div class="w-full h-52 bg-[#0a0f1e] rounded-xl border border-white/5 flex items-center justify-center">
            <div class="text-center">
                <svg class="w-10 h-10 text-slate-700 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                <p class="text-slate-600 text-xs">Integrasikan Leaflet.js / Google Maps API</p>
                <p class="text-slate-700 text-[10px] mt-0.5">Set GOOGLE_MAPS_KEY di .env</p>
            </div>
        </div>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 gap-3">
        @foreach([['9','Total Truk','slate'],['2','Sedang Kirim','blue'],['1','Kembali ke Gudang','amber'],['6','Standby','emerald']] as $s)
        <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-4 flex flex-col justify-between">
            <p class="text-xs text-slate-500">{{ $s[1] }}</p>
            <p class="text-3xl font-bold text-white mt-2">{{ $s[0] }}</p>
        </div>
        @endforeach
    </div>
</div>

<div class="bg-[#0d1425] border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full text-xs">
        <thead><tr class="border-b border-white/5 text-slate-500">
            <th class="text-left px-5 py-3 font-medium">No. Polisi</th>
            <th class="text-left px-5 py-3 font-medium">Sopir</th>
            <th class="text-left px-5 py-3 font-medium hidden md:table-cell">WH Asal</th>
            <th class="text-left px-5 py-3 font-medium">Posisi / Rute</th>
            <th class="text-left px-5 py-3 font-medium">Status</th>
            <th class="text-left px-5 py-3 font-medium hidden lg:table-cell">Update Terakhir</th>
            <th class="px-5 py-3"></th>
        </tr></thead>
        <tbody class="divide-y divide-white/5">
            @foreach([
                ['B 1234 XY','Budi Santoso','WH-3','WH-3 → Proyek IKN, Kaltim','Pengiriman','3 mnt lalu','blue'],
                ['B 5678 AB','Eko Prasetyo','WH-1','Proyek BSD → WH-1','Kembali','12 mnt lalu','amber'],
                ['B 9012 CD','-','WH-5','WH-5 Bekasi','Standby','1 jam lalu','slate'],
                ['B 3456 EF','Samsul H.','WH-2','WH-2 → Proyek Serpong','Pengiriman','5 mnt lalu','blue'],
                ['B 7890 GH','-','WH-7','WH-7 Karawang','Standby','2 jam lalu','slate'],
            ] as $t)
            <tr class="hover:bg-white/[.02] transition">
                <td class="px-5 py-3 text-white font-semibold">{{ $t[0] }}</td>
                <td class="px-5 py-3 text-slate-400">{{ $t[1] ?: '-' }}</td>
                <td class="px-5 py-3 text-slate-500 hidden md:table-cell">{{ $t[2] }}</td>
                <td class="px-5 py-3 text-slate-300">{{ $t[3] }}</td>
                <td class="px-5 py-3">
                    <span class="px-2 py-0.5 rounded-md text-[10px] font-medium
                        {{ $t[6]==='blue'?'bg-blue-500/10 text-blue-400':($t[6]==='amber'?'bg-amber-500/10 text-amber-400':'bg-slate-700 text-slate-400') }}">
                        {{ $t[4] }}
                    </span>
                </td>
                <td class="px-5 py-3 text-slate-600 hidden lg:table-cell">{{ $t[5] }}</td>
                <td class="px-5 py-3 text-right">
                    <button class="text-slate-500 hover:text-orange-400 transition text-[10px]">Detail</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="modalTruck" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="bg-[#0d1425] border border-white/10 rounded-2xl w-full max-w-sm p-6">
        <div class="flex justify-between items-center mb-5">
            <h3 class="font-semibold text-white">Tambah Truk</h3>
            <button onclick="document.getElementById('modalTruck').classList.add('hidden')" class="text-slate-500 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="space-y-3">
            <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">No. Polisi</label>
                <input type="text" placeholder="cth: B 1234 XX" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600"></div>
            <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">WH Asal</label>
                <select class="w-full bg-[#0a0f1e] border border-white/10 text-slate-300 text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50">
                    @foreach(range(1,8) as $i)<option>WH-{{ $i }}</option>@endforeach
                </select></div>
            <div class="flex gap-3 pt-2">
                <button onclick="document.getElementById('modalTruck').classList.add('hidden')"
                    class="flex-1 bg-white/5 text-slate-300 font-semibold rounded-xl py-2.5 text-sm hover:bg-white/10 transition">Batal</button>
                <button class="flex-1 bg-orange-500 hover:bg-orange-400 text-white font-semibold rounded-xl py-2.5 text-sm transition">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection