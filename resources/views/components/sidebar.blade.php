@php $role = auth()->user()->role; @endphp

@if($role === 'admin')
    <p class="sidebar-section">Utama</p>
    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
        Dashboard
    </a>
    <p class="sidebar-section">Master Data</p>
    <a href="{{ route('admin.users') }}" class="sidebar-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        Manajemen User
    </a>
    <a href="{{ route('admin.warehouse') }}" class="sidebar-link {{ request()->routeIs('admin.warehouse') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
        Warehouse
    </a>
    <a href="{{ route('admin.trucks') }}" class="sidebar-link {{ request()->routeIs('admin.trucks') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2 2M13 16H9m4 0h5l2-2V9l-3-3h-4v10z"/></svg>
        Armada Truk
    </a>
    <a href="{{ route('admin.projects') }}" class="sidebar-link {{ request()->routeIs('admin.projects') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        Semua Project
    </a>
    <p class="sidebar-section">SDM</p>
    <a href="{{ route('admin.attendance') }}" class="sidebar-link {{ request()->routeIs('admin.attendance') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        Rekap Absensi
    </a>

@elseif($role === 'owner')
    <p class="sidebar-section">Utama</p>
    <a href="{{ route('owner.dashboard') }}" class="sidebar-link {{ request()->routeIs('owner.dashboard') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
        Dashboard
    </a>
    <p class="sidebar-section">Monitoring</p>
    <a href="{{ route('owner.warehouse') }}" class="sidebar-link {{ request()->routeIs('owner.warehouse') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
        Status Warehouse
    </a>
    <a href="{{ route('owner.projects') }}" class="sidebar-link {{ request()->routeIs('owner.projects') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        Alur Project
    </a>
    <a href="{{ route('owner.trucks') }}" class="sidebar-link {{ request()->routeIs('owner.trucks') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10l2 2M13 16H9m4 0h5l2-2V9l-3-3h-4v10z"/></svg>
        Tracking Truk
    </a>

@elseif($role === 'engineering')
    <p class="sidebar-section">Utama</p>
    <a href="{{ route('engineering.dashboard') }}" class="sidebar-link {{ request()->routeIs('engineering.dashboard') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
        Dashboard
    </a>
    <p class="sidebar-section">Project</p>
    <a href="{{ route('engineering.projects') }}" class="sidebar-link {{ request()->routeIs('engineering.projects') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        Daftar Project
    </a>
    <a href="{{ route('engineering.projects.create') }}" class="sidebar-link {{ request()->routeIs('engineering.projects.create') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Buat Project Baru
    </a>

@elseif($role === 'kepala_wh')
    <p class="sidebar-section">Utama</p>
    <a href="{{ route('kepala-wh.dashboard') }}" class="sidebar-link {{ request()->routeIs('kepala-wh.dashboard') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
        Dashboard
    </a>
    <p class="sidebar-section">Operasional</p>
    <a href="{{ route('kepala-wh.projects') }}" class="sidebar-link {{ request()->routeIs('kepala-wh.projects') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
        Project Masuk
    </a>
    <a href="{{ route('kepala-wh.bahan-baku') }}" class="sidebar-link {{ request()->routeIs('kepala-wh.bahan-baku') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10"/></svg>
        Label Bahan Baku
    </a>
    <p class="sidebar-section">SDM</p>
    <a href="{{ route('kepala-wh.attendance') }}" class="sidebar-link {{ request()->routeIs('kepala-wh.attendance') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        Absensi & Rekap
    </a>

@elseif($role === 'sopir')
    <p class="sidebar-section">Utama</p>
    <a href="{{ route('sopir.dashboard') }}" class="sidebar-link {{ request()->routeIs('sopir.dashboard') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
        Dashboard
    </a>

@elseif($role === 'mandor')
    <p class="sidebar-section">Utama</p>
    <a href="{{ route('mandor.dashboard') }}" class="sidebar-link {{ request()->routeIs('mandor.dashboard') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
        Dashboard
    </a>

@elseif($role === 'tukang')
    <p class="sidebar-section">Utama</p>
    <a href="{{ route('tukang.dashboard') }}" class="sidebar-link {{ request()->routeIs('tukang.dashboard') ? 'active' : '' }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/></svg>
        Dashboard
    </a>
@endif