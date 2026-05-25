@extends('layouts.app')
@section('title','Dashboard Sopir')
@section('page-title','Dashboard Sopir')
@section('page-subtitle','Tugas pengiriman dan validasi barang')

@section('content')

{{-- ABSEN BANNER --}}
<div id="bannerBelumAbsen"
    class="bg-orange-500/10 border border-orange-500/20 rounded-2xl p-4 mb-5 flex items-center justify-between">
    <div>
        <p class="text-sm font-semibold text-orange-300">Belum Absen Hari Ini</p>
        <p class="text-xs text-orange-400/60 mt-0.5">Wajib absen + foto sebelum mulai kerja</p>
    </div>
    <button onclick="bukaModalAbsen()"
        class="bg-orange-500 hover:bg-orange-400 active:scale-95 text-white font-semibold rounded-xl px-4 py-2 text-sm transition">
        Absen Sekarang
    </button>
</div>

<div id="bannerSudahAbsen" class="hidden bg-emerald-500/10 border border-emerald-500/20 rounded-2xl p-4 mb-5 flex items-center gap-3">
    <div class="w-9 h-9 bg-emerald-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
        <svg class="w-5 h-5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
        </svg>
    </div>
    <div class="flex-1">
        <p class="text-sm font-semibold text-emerald-300">Sudah Absen</p>
        <p id="waktuAbsen" class="text-xs text-emerald-500 mt-0.5"></p>
    </div>
    <img id="fotoAbsenPreviewSopir" src="" alt="foto absen"
        class="w-10 h-10 rounded-xl object-cover border border-emerald-500/30 hidden">
</div>

{{-- TUGAS AKTIF --}}
<div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5 mb-5">
    <h3 class="text-sm font-semibold text-white mb-4">Tugas Pengiriman Aktif</h3>

    <div class="bg-[#0a0f1e] border border-orange-500/20 rounded-2xl p-4">
        <div class="flex items-start justify-between mb-4">
            <div>
                <p class="font-bold text-white">SHIP-2025-0012</p>
                <p class="text-xs text-slate-400 mt-0.5">PRJ-001 · Gedung PT Bangun Jaya</p>
            </div>
            <span class="text-[10px] px-2.5 py-1 rounded-full bg-blue-500/10 text-blue-400 border border-blue-500/20">
                Dalam Perjalanan
            </span>
        </div>

        {{-- Progress --}}
        <div class="flex items-start gap-1 mb-5 overflow-x-auto pb-1">
            @foreach([
                ['1','Terima Surat Jalan',true,false],
                ['2','Validasi Barang',true,false],
                ['3','Berangkat',true,false],
                ['4','Tiba di Lokasi',false,true],
                ['5','Serah Terima',false,false],
            ] as $s)
            <div class="flex items-center flex-shrink-0">
                <div class="flex flex-col items-center">
                    <div class="w-7 h-7 rounded-full flex items-center justify-center text-xs font-bold
                        {{ $s[2] ? 'bg-emerald-500 text-white' : ($s[3] ? 'bg-orange-500 text-white' : 'bg-white/5 text-slate-600') }}">
                        {{ $s[2] ? '✓' : $s[0] }}
                    </div>
                    <p class="text-[9px] mt-1 text-center leading-tight whitespace-nowrap
                        {{ $s[2] ? 'text-emerald-400' : ($s[3] ? 'text-orange-400' : 'text-slate-600') }}">
                        {{ $s[1] }}
                    </p>
                </div>
                @if(!$loop->last)
                <div class="w-6 h-px {{ $s[2] ? 'bg-emerald-500/40' : 'bg-white/5' }} mb-4 mx-0.5 flex-shrink-0"></div>
                @endif
            </div>
            @endforeach
        </div>

        {{-- Info --}}
        <div class="grid grid-cols-2 gap-3 mb-4 text-xs">
            <div class="bg-white/[.03] rounded-xl p-3">
                <p class="text-slate-500 mb-0.5">Dari</p>
                <p class="text-white font-medium">WH-3, Bekasi Barat</p>
            </div>
            <div class="bg-white/[.03] rounded-xl p-3">
                <p class="text-slate-500 mb-0.5">Tujuan</p>
                <p class="text-white font-medium">Proyek IKN, Kaltim</p>
            </div>
            <div class="bg-white/[.03] rounded-xl p-3">
                <p class="text-slate-500 mb-0.5">Mandor Penerima</p>
                <p class="text-white font-medium">Pak Darto</p>
            </div>
            <div class="bg-white/[.03] rounded-xl p-3">
                <p class="text-slate-500 mb-0.5">No. Truk</p>
                <p class="text-white font-medium">B 1234 XY</p>
            </div>
        </div>

        {{-- Validasi Barang --}}
        <div class="border border-white/5 rounded-xl p-4 mb-4">
            <p class="text-sm font-semibold text-white mb-1">Validasi Kesesuaian Barang</p>
            <p class="text-xs text-slate-500 mb-3">Bandingkan barang aktual dengan foto referensi dari Kepala WH</p>
            <div class="grid grid-cols-2 gap-3">
                {{-- Foto Referensi --}}
                <div class="bg-[#0a0f1e] rounded-xl p-3">
                    <p class="text-[10px] text-slate-500 mb-2">Foto dari Kepala WH</p>
                    <div class="w-full h-24 bg-white/5 rounded-lg flex items-center justify-center">
                        <svg class="w-8 h-8 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01"/>
                        </svg>
                    </div>
                </div>
                {{-- Upload Foto Aktual --}}
                <div class="bg-[#0a0f1e] rounded-xl p-3">
                    <p class="text-[10px] text-slate-500 mb-2">Foto Barang Aktual</p>
                    <label id="labelFotoBarang" class="block w-full h-24 border-2 border-dashed border-slate-700
                        hover:border-orange-500/50 rounded-lg cursor-pointer transition flex items-center justify-center">
                        <div class="text-center" id="placeholderFotoBarang">
                            <svg class="w-6 h-6 text-slate-600 mx-auto mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <p class="text-[9px] text-slate-600">Ambil / Upload Foto</p>
                        </div>
                        <img id="previewFotoBarang" src="" alt="" class="hidden w-full h-full object-cover rounded-lg">
                        <input type="file" id="inputFotoBarang" accept="image/*" capture="environment" class="hidden"
                            onchange="previewFoto(this,'previewFotoBarang','placeholderFotoBarang')">
                    </label>
                </div>
            </div>
        </div>

        <div class="flex gap-3">
            <button onclick="konfirmasiBarang()"
                class="flex-1 bg-emerald-500 hover:bg-emerald-400 active:scale-95 text-white font-semibold rounded-xl py-2.5 text-sm transition">
                ✓ Sesuai — Berangkat
            </button>
            <button class="bg-red-500/10 hover:bg-red-500/20 text-red-400 border border-red-500/20 font-semibold rounded-xl px-4 py-2.5 text-sm transition">
                ✗ Tolak
            </button>
        </div>
    </div>
</div>

{{-- Riwayat --}}
<div class="bg-[#0d1425] border border-white/5 rounded-2xl p-5">
    <h3 class="text-sm font-semibold text-white mb-4">Riwayat Pengiriman</h3>
    <div class="space-y-2">
        @foreach([
            ['SHIP-2025-0011','PRJ-004','Villa Pak Hendra','Selesai','20 Mei 2026'],
            ['SHIP-2025-0010','PRJ-003','Ruko Serpong','Selesai','15 Mei 2026'],
            ['SHIP-2025-0009','PRJ-002','Gedung IKN','Selesai','8 Mei 2026'],
        ] as $h)
        <div class="flex items-center justify-between p-3 bg-white/[.02] rounded-xl">
            <div>
                <p class="text-xs text-white font-medium">{{ $h[2] }}</p>
                <p class="text-[10px] text-slate-500 mt-0.5">{{ $h[0] }} · {{ $h[4] }}</p>
            </div>
            <span class="text-[10px] px-2 py-0.5 rounded-md bg-emerald-500/10 text-emerald-400">{{ $h[3] }}</span>
        </div>
        @endforeach
    </div>
</div>

{{-- ===================== MODAL ABSEN ===================== --}}
<div id="modalAbsen"
    class="hidden fixed inset-0 z-50 flex items-end sm:items-center justify-center p-4 bg-black/70 backdrop-blur-sm">
    <div class="bg-[#0d1425] border border-white/10 rounded-2xl w-full max-w-sm p-6 shadow-2xl">

        <div class="flex items-center justify-between mb-5">
            <h3 class="font-semibold text-white">Absen Masuk — Sopir</h3>
            <button onclick="tutupModalAbsen()" class="text-slate-500 hover:text-white transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <p class="text-xs text-slate-500 mb-4">
            Ambil foto selfie sebagai bukti kehadiran. Pastikan wajah terlihat jelas.
        </p>

        {{-- Foto Preview Area --}}
        <div class="mb-4">
            <label id="labelFotoAbsen"
                class="block w-full h-48 bg-[#0a0f1e] border-2 border-dashed border-slate-700
                       hover:border-orange-500/50 rounded-2xl cursor-pointer transition relative overflow-hidden">
                <div id="placeholderAbsen" class="absolute inset-0 flex flex-col items-center justify-center">
                    <div class="w-14 h-14 bg-orange-500/10 rounded-2xl flex items-center justify-center mb-3">
                        <svg class="w-7 h-7 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <p class="text-sm text-slate-400 font-medium">Tap untuk ambil foto</p>
                    <p class="text-xs text-slate-600 mt-1">Gunakan kamera depan (selfie)</p>
                </div>
                <img id="previewAbsen" src="" alt="preview"
                    class="hidden absolute inset-0 w-full h-full object-cover rounded-2xl">
                <input type="file" id="inputFotoAbsen" accept="image/*" capture="user" class="hidden"
                    onchange="previewFotoAbsen(this)">
            </label>
        </div>

        {{-- Info waktu & lokasi --}}
        <div class="grid grid-cols-2 gap-3 mb-5">
            <div class="bg-[#0a0f1e] rounded-xl p-3">
                <p class="text-[10px] text-slate-500 mb-1">Waktu Server</p>
                <p id="waktuServer" class="text-xs text-white font-semibold"></p>
            </div>
            <div class="bg-[#0a0f1e] rounded-xl p-3">
                <p class="text-[10px] text-slate-500 mb-1">Tanggal</p>
                <p id="tanggalServer" class="text-xs text-white font-semibold"></p>
            </div>
        </div>

        <button id="btnSubmitAbsen" onclick="submitAbsen('sopir')"
            class="w-full bg-orange-500 hover:bg-orange-400 active:scale-95 text-white font-semibold rounded-xl py-3 text-sm transition opacity-50 cursor-not-allowed"
            disabled>
            Kirim Absen
        </button>
        <p class="text-center text-[10px] text-slate-600 mt-2">Foto wajib diambil sebelum bisa submit</p>
    </div>
</div>

@push('scripts')
<script>
// ---- Shared Absen Logic ----
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
        now.toLocaleTimeString('id-ID', {hour:'2-digit',minute:'2-digit',second:'2-digit'}) + ' WIB';
    document.getElementById('tanggalServer').textContent =
        now.toLocaleDateString('id-ID', {day:'numeric',month:'short',year:'numeric'});
}
function previewFotoAbsen(input) {
    if (!input.files || !input.files[0]) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        const img = document.getElementById('previewAbsen');
        const placeholder = document.getElementById('placeholderAbsen');
        img.src = e.target.result;
        img.classList.remove('hidden');
        placeholder.classList.add('hidden');
        // Enable button
        const btn = document.getElementById('btnSubmitAbsen');
        btn.disabled = false;
        btn.classList.remove('opacity-50','cursor-not-allowed');
    };
    reader.readAsDataURL(input.files[0]);
}
function previewFoto(input, previewId, placeholderId) {
    if (!input.files || !input.files[0]) return;
    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById(previewId).src = e.target.result;
        document.getElementById(previewId).classList.remove('hidden');
        document.getElementById(placeholderId).classList.add('hidden');
    };
    reader.readAsDataURL(input.files[0]);
}
function submitAbsen(role) {
    const input = document.getElementById('inputFotoAbsen');
    if (!input.files || !input.files[0]) {
        alert('Foto wajib diambil terlebih dahulu!');
        return;
    }
    const now = new Date();
    const jam = now.toLocaleTimeString('id-ID', {hour:'2-digit',minute:'2-digit'});

    // Sembunyikan banner belum absen, tampilkan sudah absen
    document.getElementById('bannerBelumAbsen').classList.add('hidden');
    const bannerSudah = document.getElementById('bannerSudahAbsen');
    bannerSudah.classList.remove('hidden');
    document.getElementById('waktuAbsen').textContent = 'Masuk pukul ' + jam + ' WIB';

    // Tampilkan foto kecil di banner
    const preview = document.getElementById('previewAbsen');
    const fotoPreview = document.getElementById('fotoAbsenPreviewSopir');
    if (fotoPreview && preview.src) {
        fotoPreview.src = preview.src;
        fotoPreview.classList.remove('hidden');
    }

    tutupModalAbsen();
    alert('✓ Absen berhasil dicatat pada ' + jam + ' WIB');
}
function konfirmasiBarang() {
    const input = document.getElementById('inputFotoBarang');
    if (!input.files || !input.files[0]) {
        alert('Upload foto barang aktual terlebih dahulu sebelum konfirmasi!');
        return;
    }
    alert('✓ Barang dikonfirmasi sesuai. Status: Dalam Perjalanan.');
}
</script>
@endpush

@endsection