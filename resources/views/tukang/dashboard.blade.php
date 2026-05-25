@extends('layouts.app')
@section('title','Dashboard Tukang')
@section('page-title','Dashboard Tukang')
@section('page-subtitle','Absensi harian dan informasi tugas')

@section('content')

{{-- ABSEN BANNER --}}
<div id="bannerBelumAbsen"
    class="bg-orange-500/10 border border-orange-500/20 rounded-2xl p-4 mb-5 flex items-center justify-between">
    <div>
        <p class="text-sm font-semibold text-orange-300">Belum Absen Hari Ini</p>
        <p class="text-xs text-orange-400/60 mt-0.5">Wajib foto selfie sebagai bukti kehadiran</p>
    </div>
    <button onclick="bukaModalAbsen()"
        class="bg-orange-500 hover:bg-orange-400 active:scale-95 text-white font-semibold rounded-xl px-4 py-2 text-sm transition">
        Absen Sekarang
    </button>
</div>

<div id="bannerSudahAbsen" class="hidden bg-emerald-500/10 border border-emerald-500/20 rounded-2xl p-4 mb-5">
    <div class="flex items-center gap-3">
        <img id="fotoAbsenThumb" src="" alt="foto absen"
            class="w-12 h-12 rounded-xl object-cover border-2 border-emerald-500/30 flex-shrink-0">
        <div class="flex-1">
            <p class="text-sm font-semibold text-emerald-300">✓ Absen Tercatat</p>
            <p id="waktuAbsenTukang" class="text-xs text-emerald-500 mt-0.5"></p>
            <p class="text-[10px] text-emerald-600">WH-3, Bekasi Barat</p>
        </div>
        <div class="text-right">
            <p class="text-xs text-slate-500">Hari ke-</p>
            <p class="text-xl font-bold text-white">19</p>
            <p class="text-[10px] text-emerald-400">bulan ini</p>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
    {{-- Rekap Bulanan --}}
    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5">
        <h3 class="text-sm font-semibold text-white mb-4">Rekap Absensi — Mei 2026</h3>
        <div class="grid grid-cols-3 gap-3 mb-5">
            <div class="bg-[#0a0f1e] rounded-xl p-3 text-center">
                <p class="text-xl font-bold text-emerald-400">18</p>
                <p class="text-[10px] text-slate-500 mt-0.5">Hadir</p>
            </div>
            <div class="bg-[#0a0f1e] rounded-xl p-3 text-center">
                <p class="text-xl font-bold text-amber-400">2</p>
                <p class="text-[10px] text-slate-500 mt-0.5">Izin</p>
            </div>
            <div class="bg-[#0a0f1e] rounded-xl p-3 text-center">
                <p class="text-xl font-bold text-red-400">1</p>
                <p class="text-[10px] text-slate-500 mt-0.5">Tdk Hadir</p>
            </div>
        </div>

        {{-- Kalender Mini --}}
        <div class="grid grid-cols-7 gap-1 text-center">
            @foreach(['Sen','Sel','Rab','Kam','Jum','Sab','Min'] as $h)
            <div class="text-[9px] text-slate-600 pb-1">{{ $h }}</div>
            @endforeach
            {{-- Padding awal (Mei 2026 mulai Jumat = 4 offset) --}}
            @for($i=0;$i<4;$i++)
            <div></div>
            @endfor
            @for($d=1;$d<=25;$d++)
            @php
                $st = $d <= 15 ? 'hadir' : ($d == 16 ? 'izin' : ($d == 19 ? 'absen' : ($d == 25 ? 'today' : ($d > 19 ? 'hadir' : 'hadir'))));
                if ($d == 17 || $d == 18 || $d == 24 || $d == 25) $st = ($d >= 24 ? ($d==25?'today':'hadir') : 'libur');
            @endphp
            <div class="aspect-square rounded-lg flex items-center justify-center text-[9px] font-medium
                {{ $st==='hadir'?'bg-emerald-500/15 text-emerald-400':
                   ($st==='izin'?'bg-amber-500/15 text-amber-400':
                   ($st==='absen'?'bg-red-500/15 text-red-400':
                   ($st==='today'?'bg-orange-500 text-white':
                   ($st==='libur'?'bg-white/[.02] text-slate-700':'')))) }}">
                {{ $d }}
            </div>
            @endfor
        </div>
        <div class="flex items-center gap-3 mt-3 flex-wrap">
            <span class="flex items-center gap-1 text-[9px] text-slate-500"><span class="w-2.5 h-2.5 rounded-sm bg-emerald-500/30 inline-block"></span>Hadir</span>
            <span class="flex items-center gap-1 text-[9px] text-slate-500"><span class="w-2.5 h-2.5 rounded-sm bg-amber-500/30 inline-block"></span>Izin</span>
            <span class="flex items-center gap-1 text-[9px] text-slate-500"><span class="w-2.5 h-2.5 rounded-sm bg-red-500/30 inline-block"></span>Alpa</span>
            <span class="flex items-center gap-1 text-[9px] text-slate-500"><span class="w-2.5 h-2.5 rounded-sm bg-orange-500 inline-block"></span>Hari ini</span>
        </div>
    </div>

    {{-- Info Tugas --}}
    <div class="space-y-4">
        <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5">
            <h3 class="text-sm font-semibold text-white mb-3">Tugas Hari Ini</h3>
            <div class="bg-[#0a0f1e] rounded-xl p-4">
                <div class="flex items-start justify-between mb-2">
                    <p class="text-sm font-semibold text-white">PRJ-001</p>
                    <span class="text-[10px] px-2 py-0.5 rounded-full bg-orange-500/10 text-orange-400">Berjalan</span>
                </div>
                <p class="text-xs text-slate-300 mb-1">Gedung Kantor PT Bangun Jaya</p>
                <p class="text-xs text-slate-500 mb-2">Pemasangan Aluminium Frame Lantai 3</p>
                <div class="flex items-center gap-3 text-[10px] text-slate-500">
                    <span>Mandor: <span class="text-slate-300">Pak Darto</span></span>
                    <span>WH-3</span>
                </div>
            </div>
        </div>

        <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5">
            <h3 class="text-sm font-semibold text-white mb-3">Info Warehouse</h3>
            <div class="space-y-2.5 text-xs">
                <div class="flex justify-between">
                    <span class="text-slate-500">Warehouse</span>
                    <span class="text-white font-medium">WH-3, Bekasi Barat</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Kepala WH</span>
                    <span class="text-white font-medium">Pak Agus</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Jam Kerja</span>
                    <span class="text-white font-medium">07:00 – 17:00 WIB</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Shift</span>
                    <span class="text-white font-medium">Pagi</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ===================== MODAL ABSEN ===================== --}}
<div id="modalAbsen"
    class="hidden fixed inset-0 z-50 flex items-end sm:items-center justify-center p-4 bg-black/70 backdrop-blur-sm">
    <div class="bg-[#0d1425] border border-white/10 rounded-2xl w-full max-w-sm p-6 shadow-2xl">

        <div class="flex items-center justify-between mb-2">
            <h3 class="font-semibold text-white">Absen Masuk — Tukang</h3>
            <button onclick="tutupModalAbsen()" class="text-slate-500 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <p class="text-xs text-slate-500 mb-4">Ambil foto selfie sebagai bukti kehadiran. Wajah harus terlihat jelas.</p>

        {{-- Foto Area --}}
        <label id="labelFotoAbsen"
            class="block w-full h-52 bg-[#0a0f1e] border-2 border-dashed border-slate-700
                   hover:border-orange-500/50 rounded-2xl cursor-pointer transition relative overflow-hidden mb-4">
            <div id="placeholderAbsen" class="absolute inset-0 flex flex-col items-center justify-center gap-2">
                <div class="w-16 h-16 bg-orange-500/10 rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-slate-400">Tap untuk ambil foto selfie</p>
                <p class="text-xs text-slate-600">Pastikan wajah terlihat jelas</p>
            </div>
            <img id="previewAbsen" src="" alt=""
                class="hidden absolute inset-0 w-full h-full object-cover rounded-2xl">
            <div id="overlayRetake"
                class="hidden absolute inset-0 bg-black/50 flex items-center justify-center rounded-2xl">
                <span class="text-xs text-white bg-black/60 px-3 py-1.5 rounded-full">🔄 Tap untuk ganti foto</span>
            </div>
            <input type="file" id="inputFotoAbsen" accept="image/*" capture="user" class="hidden"
                onchange="previewFotoAbsen(this)">
        </label>

        {{-- Waktu --}}
        <div class="grid grid-cols-2 gap-3 mb-5">
            <div class="bg-[#0a0f1e] rounded-xl p-3">
                <p class="text-[10px] text-slate-500 mb-1">Jam Masuk</p>
                <p id="waktuServer" class="text-sm font-bold text-white"></p>
            </div>
            <div class="bg-[#0a0f1e] rounded-xl p-3">
                <p class="text-[10px] text-slate-500 mb-1">Tanggal</p>
                <p id="tanggalServer" class="text-xs font-semibold text-white"></p>
            </div>
        </div>

        <button id="btnSubmitAbsen" onclick="submitAbsen('tukang')"
            class="w-full bg-orange-500 hover:bg-orange-400 active:scale-95 text-white font-bold rounded-xl py-3.5 text-sm transition opacity-50 cursor-not-allowed"
            disabled>
            📸 Kirim Absen
        </button>
        <p class="text-center text-[10px] text-slate-600 mt-2">
            Foto wajib diambil terlebih dahulu
        </p>
    </div>
</div>

@push('scripts')
<script>
function bukaModalAbsen() {
    document.getElementById('modalAbsen').classList.remove('hidden');
    updateWaktu();
    window._waktuInterval = setInterval(updateWaktu, 1000);
}
function tutupModalAbsen() {
    document.getElementById('modalAbsen').classList.add('hidden');
    clearInterval(window._waktuInterval);
}
function updateWaktu() {
    const now = new Date();
    document.getElementById('waktuServer').textContent =
        now.toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit', second:'2-digit'});
    document.getElementById('tanggalServer').textContent =
        now.toLocaleDateString('id-ID', {weekday:'short', day:'numeric', month:'short'});
}
function previewFotoAbsen(input) {
    if (!input.files || !input.files[0]) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        const img = document.getElementById('previewAbsen');
        img.src = e.target.result;
        img.classList.remove('hidden');
        document.getElementById('placeholderAbsen').classList.add('hidden');
        document.getElementById('overlayRetake').classList.remove('hidden');
        const btn = document.getElementById('btnSubmitAbsen');
        btn.disabled = false;
        btn.classList.remove('opacity-50', 'cursor-not-allowed');
    };
    reader.readAsDataURL(input.files[0]);
}
function submitAbsen(role) {
    const input = document.getElementById('inputFotoAbsen');
    if (!input.files || !input.files[0]) {
        alert('Foto selfie wajib diambil terlebih dahulu!');
        return;
    }
    const now = new Date();
    const jam = now.toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'});

    document.getElementById('bannerBelumAbsen').classList.add('hidden');
    document.getElementById('bannerSudahAbsen').classList.remove('hidden');
    document.getElementById('waktuAbsenTukang').textContent = 'Masuk pukul ' + jam + ' WIB';

    // Tampilkan foto thumbnail di banner
    const fotoThumb = document.getElementById('fotoAbsenThumb');
    const preview = document.getElementById('previewAbsen');
    if (fotoThumb && preview.src) {
        fotoThumb.src = preview.src;
    }

    tutupModalAbsen();
    alert('✓ Absen berhasil! Tercatat pukul ' + jam + ' WIB di WH-3.');
}
</script>
@endpush

@endsection