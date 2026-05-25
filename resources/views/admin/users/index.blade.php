@extends('layouts.app')
@section('title','Manajemen User')
@section('page-title','Manajemen User')
@section('page-subtitle','CRUD seluruh akun sistem')
@section('content')

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
    <div class="flex items-center gap-2">
        <input type="text" placeholder="Cari nama / email..." class="bg-[#0d1425] border border-white/10 text-white text-xs rounded-xl px-3.5 py-2.5 w-56 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600">
        <select class="bg-[#0d1425] border border-white/10 text-slate-400 text-xs rounded-xl px-3 py-2.5 focus:outline-none">
            <option value="">Semua Role</option>
            <option>admin</option><option>owner</option><option>engineering</option>
            <option>kepala_wh</option><option>sopir</option><option>mandor</option><option>tukang</option>
        </select>
    </div>
    <button onclick="document.getElementById('modalUser').classList.remove('hidden')"
        class="bg-orange-500 hover:bg-orange-400 text-white text-xs font-semibold rounded-xl px-4 py-2.5 transition flex items-center gap-2">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah User
    </button>
</div>

<div class="bg-[#0d1425] border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full text-xs">
        <thead><tr class="border-b border-white/5 text-slate-500">
            <th class="text-left px-5 py-3 font-medium">Nama</th>
            <th class="text-left px-5 py-3 font-medium">Email</th>
            <th class="text-left px-5 py-3 font-medium">Role</th>
            <th class="text-left px-5 py-3 font-medium hidden md:table-cell">WH</th>
            <th class="text-left px-5 py-3 font-medium hidden md:table-cell">No. HP</th>
            <th class="text-left px-5 py-3 font-medium">Status</th>
            <th class="px-5 py-3"></th>
        </tr></thead>
        <tbody class="divide-y divide-white/5">
            @php
            $users = [
                ['Super Admin','admin@mugijaya.com','admin','-','081110000001','Aktif','purple'],
                ['Pak Sukma','owner@mugijaya.com','owner','-','081110000002','Aktif','purple'],
                ['Pak Egi','engineering@mugijaya.com','engineering','-','081110000003','Aktif','teal'],
                ['Pak Yudi','kepalawh@mugijaya.com','kepala_wh','WH-3','081110000004','Aktif','blue'],
                ['Budi Santoso','sopir@mugijaya.com','sopir','-','081110000005','Aktif','orange'],
                ['Pak Darto','mandor@mugijaya.com','mandor','-','081110000006','Aktif','orange'],
                ['Ahmad','tukang@mugijaya.com','tukang','WH-3','081110000007','Aktif','slate'],
                ['Cecep','tukang2@mugijaya.com','tukang','WH-3','081110000008','Non-aktif','slate'],
            ];
            @endphp
            @foreach($users as $u)
            <tr class="hover:bg-white/[.02] transition">
                <td class="px-5 py-3">
                    <div class="flex items-center gap-2.5">
                        <div class="w-7 h-7 rounded-lg bg-slate-700 flex items-center justify-center text-[10px] font-bold text-white flex-shrink-0">
                            {{ strtoupper(substr($u[0],0,1)) }}
                        </div>
                        <span class="text-white font-medium">{{ $u[0] }}</span>
                    </div>
                </td>
                <td class="px-5 py-3 text-slate-400">{{ $u[1] }}</td>
                <td class="px-5 py-3">
                    <span class="px-2 py-0.5 rounded-md text-[10px] font-medium
                        {{ $u[6]==='purple'?'bg-purple-500/10 text-purple-400':($u[6]==='teal'?'bg-teal-500/10 text-teal-400':($u[6]==='blue'?'bg-blue-500/10 text-blue-400':($u[6]==='orange'?'bg-orange-500/10 text-orange-400':'bg-slate-700 text-slate-400'))) }}">
                        {{ $u[2] }}
                    </span>
                </td>
                <td class="px-5 py-3 text-slate-500 hidden md:table-cell">{{ $u[3] }}</td>
                <td class="px-5 py-3 text-slate-500 hidden md:table-cell">{{ $u[4] }}</td>
                <td class="px-5 py-3"><span class="text-[10px] {{ $u[5]==='Aktif'?'text-emerald-400':'text-slate-500' }}">● {{ $u[5] }}</span></td>
                <td class="px-5 py-3">
                    <div class="flex items-center gap-2 justify-end">
                        <button class="text-slate-500 hover:text-orange-400 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                        </button>
                        <button class="text-slate-500 hover:text-red-400 transition">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal Tambah User --}}
<div id="modalUser" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="bg-[#0d1425] border border-white/10 rounded-2xl w-full max-w-md p-6 shadow-2xl">
        <div class="flex items-center justify-between mb-5">
            <h3 class="font-semibold text-white">Tambah User Baru</h3>
            <button onclick="document.getElementById('modalUser').classList.add('hidden')" class="text-slate-500 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="space-y-4">
            <div>
                <label class="block text-xs text-slate-400 mb-1.5 font-medium">Nama Lengkap</label>
                <input type="text" placeholder="Nama lengkap" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600">
            </div>
            <div>
                <label class="block text-xs text-slate-400 mb-1.5 font-medium">Email</label>
                <input type="email" placeholder="email@mugijaya.com" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600">
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs text-slate-400 mb-1.5 font-medium">Role</label>
                    <select class="w-full bg-[#0a0f1e] border border-white/10 text-slate-300 text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50">
                        <option>admin</option><option>owner</option><option>engineering</option>
                        <option>kepala_wh</option><option>sopir</option><option>mandor</option><option>tukang</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-slate-400 mb-1.5 font-medium">No. HP</label>
                    <input type="text" placeholder="08xx" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600">
                </div>
            </div>
            <div>
                <label class="block text-xs text-slate-400 mb-1.5 font-medium">Password</label>
                <input type="password" placeholder="••••••••" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600">
            </div>
            <div class="flex gap-3 pt-2">
                <button onclick="document.getElementById('modalUser').classList.add('hidden')"
                    class="flex-1 bg-white/5 hover:bg-white/10 text-slate-300 font-semibold rounded-xl py-2.5 text-sm transition">
                    Batal
                </button>
                <button class="flex-1 bg-orange-500 hover:bg-orange-400 text-white font-semibold rounded-xl py-2.5 text-sm transition">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>
@endsection