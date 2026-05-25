<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboard;
use App\Http\Controllers\Engineering\DashboardController as EngineeringDashboard;
use App\Http\Controllers\KepalaWh\DashboardController as KepalaWhDashboard;
use App\Http\Controllers\Sopir\DashboardController as SopirDashboard;
use App\Http\Controllers\Mandor\DashboardController as MandorDashboard;
use App\Http\Controllers\Tukang\DashboardController as TukangDashboard;

Route::get('/', fn() => redirect()->route('login'));

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('/users', [AdminDashboard::class, 'users'])->name('users');
    Route::get('/warehouse', [AdminDashboard::class, 'warehouse'])->name('warehouse');
    Route::get('/trucks', [AdminDashboard::class, 'trucks'])->name('trucks');
    Route::get('/projects', [AdminDashboard::class, 'projects'])->name('projects');
    Route::get('/attendance', [AdminDashboard::class, 'attendance'])->name('attendance');
});

// Owner
Route::middleware(['auth', 'role:owner'])->prefix('owner')->name('owner.')->group(function () {
    Route::get('/dashboard', [OwnerDashboard::class, 'index'])->name('dashboard');
    Route::get('/projects', [OwnerDashboard::class, 'projects'])->name('projects');
    Route::get('/trucks', [OwnerDashboard::class, 'trucks'])->name('trucks');
    Route::get('/warehouse', [OwnerDashboard::class, 'warehouse'])->name('warehouse');
});

// Engineering / Teknik Sipil
Route::middleware(['auth', 'role:engineering'])->prefix('engineering')->name('engineering.')->group(function () {
    Route::get('/dashboard', [EngineeringDashboard::class, 'index'])->name('dashboard');
    Route::get('/projects', [EngineeringDashboard::class, 'projects'])->name('projects');
    Route::get('/projects/create', [EngineeringDashboard::class, 'create'])->name('projects.create');
    Route::post('/projects', [EngineeringDashboard::class, 'store'])->name('projects.store');
});

// Kepala WH
Route::middleware(['auth', 'role:kepala_wh'])->prefix('kepala-wh')->name('kepala-wh.')->group(function () {
    Route::get('/dashboard', [KepalaWhDashboard::class, 'index'])->name('dashboard');
    Route::get('/projects', [KepalaWhDashboard::class, 'projects'])->name('projects');
    Route::get('/attendance', [KepalaWhDashboard::class, 'attendance'])->name('attendance');
    Route::get('/bahan-baku', [KepalaWhDashboard::class, 'bahanBaku'])->name('bahan-baku');
});

// Sopir
Route::middleware(['auth', 'role:sopir'])->prefix('sopir')->name('sopir.')->group(function () {
    Route::get('/dashboard', [SopirDashboard::class, 'index'])->name('dashboard');
});

// Mandor
Route::middleware(['auth', 'role:mandor'])->prefix('mandor')->name('mandor.')->group(function () {
    Route::get('/dashboard', [MandorDashboard::class, 'index'])->name('dashboard');
});

// Tukang
Route::middleware(['auth', 'role:tukang'])->prefix('tukang')->name('tukang.')->group(function () {
    Route::get('/dashboard', [TukangDashboard::class, 'index'])->name('dashboard');
});