@extends('layouts.app')
@section('title','Label Bahan Baku')
@section('page-title','Label Bahan Baku')
@section('page-subtitle','Kunci material per project agar tidak tertukar')
@section('content')

<div class="flex justify-end mb-5">
    <button onclick="document.getElementById('modalBB').classList.remove('hidden')"
        class="bg-orange-500 hover:bg-orange-400 text-white text-xs font-semibold rounded-xl px-4 py-2.5 transition flex items-center gap-2">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Label
    </button>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-5">
    @foreach([['5','Material Terkunci','red'],['3','Bebas Dipakai','emerald'],['2','Stok Menipis','amber']] as $s)
    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-4 flex items-center gap-4">
        <div class="w-10 h-10 rounded-xl flex items-center justify-center
            {{ $s[2]==='red'?'bg-red-500/10':($s[2]==='emerald'?'bg-emerald-500/10':'bg-amber-500/10') }}">
            <svg class="w-5 h-5 {{ $s[2]==='red'?'text-red-400':($s[2]==='emerald'?'text-emerald-400':'text-amber-400') }}"
                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/>
            </svg>
        </div>
        <div>
            <p class="text-2xl font-bold text-white">{{ $s[0] }}</p>
            <p class="text-xs text-slate-500">{{ $s[1] }}</p>
        </div>
    </div>
    @endforeach
</div>

<div class="bg-[#0d1425] border border-white/5 rounded-2xl overflow-hidden">
    <table class="w-full text-xs">
        <thead><tr class="border-b border-white/5 text-slate-500">
            <th class="text-left px-5 py-3 font-medium">Material</th>
            <th class="text-left px-5 py-3 font-medium">Project</th>
            <th class="text-left px-5 py-3 font-medium hidden md:table-cell">Jumlah</th>
            <th class="text-left px-5 py-3 font-medium hidden md:table-cell">Lokasi Rak</th>
            <th class="text-left px-5 py-3 font-medium">Status</th>
            <th class="px-5 py-3"></th>
        </tr></thead>
        <tbody class="divide-y divide-white/5">
            @foreach([
                ['Aluminium Frame 6061','PRJ-001','120 batang','Rak A-12','Terkunci'],
                ['Kaca Tempered 8mm','PRJ-001','48 lembar','Rak B-3','Terkunci'],
                ['Kusen Aluminium','PRJ-005','30 set','Rak A-7','Terkunci'],
                ['Pintu Kaca Swing','PRJ-005','15 unit','Rak C-2','Terkunci'],
                ['Sealant Silicon','PRJ-007','24 tube','Rak D-1','Terkunci'],
                ['Aluminium Composite','—','50 lembar','Rak B-9','Bebas'],
                ['Engsel Piano','—','200 pcs','Rak D-5','Bebas'],
                ['Sekrup Tek Tek','—','5 box','Rak D-8','Bebas'],
            ] as $b)
            <tr class="hover:bg-white/[.02] transition">
                <td class="px-5 py-3 text-white font-medium">{{ $b[0] }}</td>
                <td class="px-5 py-3">
                    @if($b[1] !== '—')
                    <span class="px-2 py-0.5 rounded-md bg-orange-500/10 text-orange-400">{{ $b[1] }}</span>
                    @else
                    <span class="text-slate-600">—</span>
                    @endif
                </td>
                <td class="px-5 py-3 text-slate-400 hidden md:table-cell">{{ $b[2] }}</td>
                <td class="px-5 py-3 text-slate-500 hidden md:table-cell">{{ $b[3] }}</td>
                <td class="px-5 py-3">
                    <span class="text-[10px] {{ $b[4]==='Terkunci'?'text-red-400':'text-emerald-400' }}">
                        {{ $b[4]==='Terkunci'?'🔒':'✓' }} {{ $b[4] }}
                    </span>
                </td>
                <td class="px-5 py-3 text-right">
                    @if($b[4]==='Terkunci')
                    <button class="text-[10px] text-slate-500 hover:text-red-400 transition">Buka Kunci</button>
                    @else
                    <button class="text-[10px] text-slate-500 hover:text-orange-400 transition">Kunci</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="modalBB" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm">
    <div class="bg-[#0d1425] border border-white/10 rounded-2xl w-full max-w-md p-6">
        <div class="flex justify-between items-center mb-5">
            <h3 class="font-semibold text-white">Tambah Label Bahan Baku</h3>
            <button onclick="document.getElementById('modalBB').classList.add('hidden')" class="text-slate-500 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        <div class="space-y-3">
            <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">Nama Material</label>
                <input type="text" placeholder="cth: Aluminium Frame 6061" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600"></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">Kunci ke Project</label>
                    <select class="w-full bg-[#0a0f1e] border border-white/10 text-slate-300 text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50">
                        <option value="">Bebas</option>
                        <option>PRJ-001</option><option>PRJ-005</option><option>PRJ-007</option>
                    </select></div>
                <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">Jumlah</label>
                    <input type="text" placeholder="cth: 120 batang" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600"></div>
            </div>
            <div><label class="block text-xs text-slate-400 mb-1.5 font-medium">Lokasi Rak</label>
                <input type="text" placeholder="cth: Rak A-12" class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5 focus:outline-none focus:border-orange-500/50 placeholder:text-slate-600"></div>
            <div class="flex gap-3 pt-2">
                <button onclick="document.getElementById('modalBB').classList.add('hidden')"
                    class="flex-1 bg-white/5 text-slate-300 font-semibold rounded-xl py-2.5 text-sm hover:bg-white/10 transition">Batal</button>
                <button class="flex-1 bg-orange-500 hover:bg-orange-400 text-white font-semibold rounded-xl py-2.5 text-sm transition">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection