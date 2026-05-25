@extends('layouts.auth')
@section('content')
<div class="w-full max-w-sm">
    <div class="text-center mb-8">
        <div class="inline-flex w-14 h-14 bg-orange-500 rounded-2xl items-center justify-center mb-4 shadow-xl shadow-orange-500/30">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
        </div>
        <h1 class="text-xl font-bold text-white">CV Mugi Jaya</h1>
        <p class="text-slate-500 text-sm mt-1">Sistem Manajemen Inventory</p>
    </div>

    <div class="bg-[#0d1425] border border-white/5 rounded-2xl p-7 shadow-2xl">
        <h2 class="text-base font-semibold text-white mb-5">Masuk ke Akun</h2>

        @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/20 text-red-400 text-xs rounded-xl px-3 py-2.5 mb-4">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="{{ route('login.post') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold text-slate-400 mb-1.5">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="email@mugijaya.com" required
                    class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5
                           focus:outline-none focus:border-orange-500/60 focus:ring-2 focus:ring-orange-500/10
                           placeholder:text-slate-600 transition">
            </div>
            <div>
                <label class="block text-xs font-semibold text-slate-400 mb-1.5">Password</label>
                <input type="password" name="password" placeholder="••••••••" required
                    class="w-full bg-[#0a0f1e] border border-white/10 text-white text-sm rounded-xl px-3.5 py-2.5
                           focus:outline-none focus:border-orange-500/60 focus:ring-2 focus:ring-orange-500/10
                           placeholder:text-slate-600 transition">
            </div>
            <div class="flex items-center gap-2 pt-1">
                <input type="checkbox" name="remember" id="rem" class="w-3.5 h-3.5 rounded border-slate-600 bg-slate-800 text-orange-500">
                <label for="rem" class="text-xs text-slate-500">Ingat saya</label>
            </div>
            <button type="submit"
                class="w-full bg-orange-500 hover:bg-orange-400 active:scale-[.98] text-white font-semibold rounded-xl py-2.5 text-sm transition shadow-lg shadow-orange-500/20 mt-1">
                Masuk
            </button>
        </form>
    </div>
    <p class="text-center text-slate-700 text-xs mt-5">© 2026 CV Mugi Jaya</p>
</div>
@endsection