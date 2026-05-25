@extends('layouts.app')
@section('title', 'Buat Project Baru')
@section('page-title', 'Buat Project Baru')
@section('page-subtitle', 'Input spesifikasi dan pilih warehouse tujuan produksi')

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('engineering.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Info Project --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
            <h3 class="font-semibold text-white mb-4 flex items-center gap-2">
                <span class="w-6 h-6 bg-orange-500 rounded-lg text-xs font-bold flex items-center justify-center">1</span>
                Informasi Project
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Nama Project</label>
                    <input type="text" name="nama_project" placeholder="cth: Gedung Kantor PT ABC"
                        class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm
                               focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20
                               placeholder:text-slate-500 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Nama Customer</label>
                    <input type="text" name="nama_customer" placeholder="cth: PT Bangun Jaya"
                        class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm
                               focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20
                               placeholder:text-slate-500 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Lokasi Pemasangan</label>
                    <input type="text" name="lokasi" placeholder="cth: Jl. Sudirman No.1, Jakarta"
                        class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm
                               focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20
                               placeholder:text-slate-500 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Target Selesai</label>
                    <input type="date" name="target_selesai"
                        class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm
                               focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 transition">
                </div>
            </div>
        </div>

        {{-- Spesifikasi --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
            <h3 class="font-semibold text-white mb-4 flex items-center gap-2">
                <span class="w-6 h-6 bg-orange-500 rounded-lg text-xs font-bold flex items-center justify-center">2</span>
                Spesifikasi Teknis
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Jenis Material Utama</label>
                    <select name="jenis_material"
                        class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm
                               focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20 transition">
                        <option value="">Pilih material</option>
                        <option>Aluminium Frame</option>
                        <option>Kaca Tempered</option>
                        <option>Kusen Aluminium</option>
                        <option>Aluminium Composite</option>
                        <option>Pintu Kaca</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Warna</label>
                    <input type="text" name="warna" placeholder="cth: RAL 9016 / Silver"
                        class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm
                               focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20
                               placeholder:text-slate-500 transition">
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Ukuran / Dimensi</label>
                    <input type="text" name="dimensi" placeholder="cth: 6m x 2.4m"
                        class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm
                               focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20
                               placeholder:text-slate-500 transition">
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Upload File BOQ (Excel/PDF)</label>
                    <label class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed
                                  border-slate-700 rounded-xl cursor-pointer hover:border-orange-500/50 transition">
                        <svg class="w-6 h-6 text-slate-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <span class="text-xs text-slate-500">Klik untuk upload BOQ</span>
                        <input type="file" name="file_boq" accept=".xlsx,.xls,.pdf" class="hidden">
                    </label>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-300 mb-1.5">Upload Gambar Teknis</label>
                    <label class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed
                                  border-slate-700 rounded-xl cursor-pointer hover:border-orange-500/50 transition">
                        <svg class="w-6 h-6 text-slate-500 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        <span class="text-xs text-slate-500">Klik untuk upload gambar</span>
                        <input type="file" name="gambar_teknis" accept="image/*,.pdf" class="hidden">
                    </label>
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-sm font-medium text-slate-300 mb-1.5">Catatan Tambahan</label>
                <textarea name="catatan" rows="3" placeholder="Catatan khusus untuk tim produksi..."
                    class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-2.5 text-sm
                           focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500/20
                           placeholder:text-slate-500 transition resize-none"></textarea>
            </div>
        </div>

        {{-- Pilih Warehouse --}}
        <div class="bg-slate-900 border border-slate-800 rounded-2xl p-6">
            <h3 class="font-semibold text-white mb-1 flex items-center gap-2">
                <span class="w-6 h-6 bg-orange-500 rounded-lg text-xs font-bold flex items-center justify-center">3</span>
                Pilih Warehouse Produksi
            </h3>
            <p class="text-xs text-slate-500 mb-4 ml-8">Pilih warehouse yang masih sepi untuk proses lebih cepat</p>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                @foreach([
                    ['WH-1', 'Bekasi Utara', 2, 'Santai', 'emerald'],
                    ['WH-2', 'Bekasi Selatan', 5, 'Sedang', 'orange'],
                    ['WH-3', 'Bekasi Barat', 7, 'Penuh', 'red'],
                    ['WH-4', 'Cikarang', 1, 'Santai', 'emerald'],
                    ['WH-5', 'Tambun', 4, 'Sedang', 'orange'],
                    ['WH-6', 'Cibitung', 0, 'Kosong', 'emerald'],
                    ['WH-7', 'Karawang', 3, 'Santai', 'emerald'],
                    ['WH-8', 'Purwakarta', 6, 'Penuh', 'red'],
                ] as $i => $wh)
                <label class="cursor-pointer">
                    <input type="radio" name="warehouse_id" value="{{ $i+1 }}"
                        {{ $wh[4] === 'red' ? 'disabled' : '' }} class="peer sr-only">
                    <div class="p-4 rounded-xl border border-slate-700 bg-slate-800
                                peer-checked:border-orange-500 peer-checked:bg-orange-500/10
                                peer-disabled:opacity-40 peer-disabled:cursor-not-allowed
                                hover:border-slate-600 transition">
                        <div class="flex justify-between items-start mb-1">
                            <p class="font-bold text-white text-sm">{{ $wh[0] }}</p>
                            <span class="text-xs {{ $wh[4] === 'emerald' ? 'text-emerald-400' : ($wh[4] === 'orange' ? 'text-orange-400' : 'text-red-400') }}">
                                {{ $wh[3] }}
                            </span>
                        </div>
                        <p class="text-xs text-slate-400">{{ $wh[1] }}</p>
                        <p class="text-xs text-slate-500 mt-1">{{ $wh[2] }} project aktif</p>
                    </div>
                </label>
                @endforeach
            </div>
        </div>

        {{-- Submit --}}
        <div class="flex items-center gap-3">
            <button type="submit"
                class="bg-orange-500 hover:bg-orange-400 text-white font-semibold rounded-xl px-6 py-3 text-sm
                       transition active:scale-95 shadow-lg shadow-orange-500/20">
                Kirim ke Warehouse
            </button>
            <a href="{{ route('engineering.projects') }}"
                class="text-slate-400 hover:text-white text-sm transition px-4 py-3">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection