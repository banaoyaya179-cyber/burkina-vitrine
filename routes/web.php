<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\MessageController;

// ── Pages publiques ──
Route::get('/',          fn() => view('index'));
Route::get('/regions',   fn() => view('regions'));
Route::get('/region',    fn() => view('region'));
Route::get('/provinces', fn() => view('provinces'));
Route::get('/province',  fn() => view('province'));
Route::get('/carte',     fn() => view('carte'));
Route::get('/galerie',   fn() => view('galerie'));
Route::get('/comparer',  fn() => view('comparer'));
Route::get('/contact',   fn() => view('contact'));
Route::get('/a-propos',  fn() => view('a-propos'));
Route::get('/reforme',   fn() => view('reforme'));

// ── Contact POST ──
Route::post('/contact',  [MessageController::class, 'store']);

// ── Admin Auth ──
Route::get('/admin/login',   [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login',  [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// ── Admin (protégé) ──
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/',                      [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/regions',               [RegionController::class, 'index'])->name('admin.regions');
    Route::get('/regions/{id}/edit',     [RegionController::class, 'edit'])->name('admin.regions.edit');
    Route::put('/regions/{id}',          [RegionController::class, 'update'])->name('admin.regions.update');
    Route::get('/messages',              [MessageController::class, 'index'])->name('admin.messages');
    Route::put('/messages/{id}/lu',      [MessageController::class, 'marquerLu'])->name('admin.messages.lu');
    Route::delete('/messages/{id}',      [MessageController::class, 'destroy'])->name('admin.messages.destroy');
});
