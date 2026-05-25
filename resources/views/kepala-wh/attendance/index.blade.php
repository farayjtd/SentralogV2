@extends('layouts.app')
@section('title','Absensi & Rekap')
@section('page-title','Absensi & Rekap — WH-3')
@section('page-subtitle','Kelola kehadiran tukang, mandor, dan sopir')
@section('content')

<div class="flex flex-wrap items-center justify-between gap-3 mb-5">
    <div class="flex gap-2">
        <select class="bg-[#0d1425] border border-white/10 text-slate-400 text-xs rounded-xl px-3 py-2.5 focus:outline-none">
            <option>Mei 2026</option><option>April 2026</option>
        </select>
        <select class="bg-[#0d1425] border border-white/10 text-slate-400 text-xs rounded-xl px-3 py-2.5 focus:outline-none">
            <option>Semua</option><option>Tukang</option><option>Mandor</option><option>Sopir</option>
        </select>
    </div>
    <button onclick="document.getElementById('modalAbsen').classList.remove('hidden')"
        class="bg-orange-500 hover:bg-orange-400 text-white text-xs font-semibold rounded-xl px-4 py-2.5 transition flex items-center gap-2">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Input Absen Manual
    </button>
</div>

<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-5">
    @foreach([['22','Total SDM','slate'],['18','Hadir Hari Ini','emerald'],['2','Izin','amber'],['2','Tidak Hadir','red']] as $s)
    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-4">
        <p class="text-xs text-slate-500 mb-1">{{ $s[1] }}</p>
        <p class="text-2xl font-bold {{ $s[2]==='emerald'?'text-emerald-400':($s[2]==='amber'?'text-amber-400':($s[2]==='red'?'text-red-400':'text-white')) }}">{{ $s[0] }}</p>
    </div>
    @endforeach
</div>

<div class="bg-[#0d1425] border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full text-xs">
        <thead><tr class="border-b border-white/5 text-slate-500">
            <th class="text-left px-5 py-3 font-medium">Nama</th>
            <th class="text-left px-5 py-3 font-medium">Role</th>
            <th class="text-left px-5 py-3 font-medium hidden md:table-cell">Check-in</th>
            <th class="text-left px-5 py-3 font-medium hidden lg:table-cell">Check-out</th>
            <th class="text-center px-5 py-3 font-medium hidden lg:table-cell">Hadir/Bln</th>
            <th class="text-center px-5 py-3 font-medium hidden lg:table-cell">Izin/Bln</th>
            <th class="text-left px-5 py-3 font-medium">Status Hari Ini</th>
            <th class="px-5 py-3"></th>
        </tr></thead>
        <tbody class="divide-y divide-white/5">
            @foreach([
                ['Ahmad S.','Tukang','07:45','17:00',18,2,'Hadir'],
                ['Budi R.','Tukang','08:02','17:00',20,0,'Hadir'],
                ['Cecep','Tukang','-','-',15,3,'Tdk Hadir'],
                ['Dedi W.','Tukang','07:55','17:00',19,1,'Hadir'],
                ['Eko','Tukang','-','-',17,2,'Izin'],
                ['Fahri','Tukang','08:10','17:00',21,0,'Hadir'],
                ['Pak Darto','Mandor','07:30','17:30',21,0,'Hadir'],
                ['Budi Santoso','Sopir','07:50','18:00',19,1,'Hadir'],
            ] as $a)
            <tr class="hover:bg-white/[.02] transition">
                <td class="px-5 py-3">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-lg bg-slate-700 flex items-center justify-center text-[9px] font-bold text-white flex-shrink-0">
                            {{ strtoupper(substr($a[0],0,1)) }}
                        </div>
                        <span class="text-white font-medium">{{ $a[0] }}</span>
                    </div>
                </td>
                <td class="px-5 py-3"><span class="px-2 py-0.5 rounded-md bg-white/5 text-slate-400">{{ $a[1] }}</span></td>
                <td class="px-5 py-3 text-slate-400 hidden md:table-cell">{{ $a[2] }}</td>
                <td class="px-5 py-3 text-slate-400 hidden lg:table-cell">{{ $a[3] }}</td>
                <td class="px-5 py-3 text-emerald-400 font-semibold text-center hidden lg:table-cell">{{ $a[4] }}</td>
                <td class="px-5 py-3 text-amber-400 text-center hidden lg:table-cell">{{ $a[5] }}</td>
                <td class="px-5 py-3">
                    <span class="text-[10px] {{ $a[6]==='Hadir'?'text-emerald-400':($a[6]==='Izin'?'text-amber-400':'text-red-400') }}">● {{ $a[6] }}</span>
                </td>
                <td class="px-5 py-3 text-right">
                    <button class="text-slate-600 hover:text-orange-400 transition text-[10px]">Edit</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="modalAbsen" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="bg-[#0d1425] border border-white/10 rounded-2xl w-full max-w-sm p-6">
        <div class="flex justify-between items-center mb-5">
            <h3 class="font-semibold text-white">Input Absen Manual</h3>
            <button onclick="document.getElementById('modalAbsen').classList.add('hidden')" class="text-slate-500 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="space-y-3">
            <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">Nama SDM</label>
                <select class="w-full bg-[#0a0f1e] border border-white/10 text-slate-300 text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50">
                    <option>Ahmad S.</option><option>Budi R.</option><option>Cecep</option><option>Pak Darto</option>
                </select></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">Tanggal</label>
                    <input type="date" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50"></div>
                <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">Status</label>
                    <select class="w-full bg-[#0a0f1e] border border-white/10 text-slate-300 text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50">
                        <option>Hadir</option><option>Izin</option><option>Tidak Hadir</option>
                    </select></div>
            </div>
            <div class="flex gap-3 pt-2">
                <button onclick="document.getElementById('modalAbsen').classList.add('hidden')"
                    class="flex-1 bg-white/5 text-slate-300 font-semibold rounded-xl py-2.5 text-sm hover:bg-white/10 transition">Batal</button>
                <button class="flex-1 bg-orange-500 hover:bg-orange-400 text-white font-semibold rounded-xl py-2.5 text-sm transition">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection