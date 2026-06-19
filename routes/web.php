<?php

use App\Http\Controllers\Auth\GetPendaftarController;
use App\Http\Controllers\Auth\GetSiswaDiterimaController;
use App\Livewire\Auth\Dashboard;
use App\Livewire\Auth\Logout;
use App\Livewire\Landing;
use App\Livewire\Login;
use App\Livewire\Siswa\Dashboard as SiswaDashboard;
use App\Livewire\Siswa\Exam;
use App\Livewire\Siswa\LogoutSiswa;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:web'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard')->lazy();
    Route::get('get-pendaftar', GetPendaftarController::class)->name('get-pendaftar');
    Route::get('get-siswa-diterima', GetSiswaDiterimaController::class)->name('get-siswa-diterima');
    Route::get('logout', Logout::class)->name('logout')->lazy();
});

Route::middleware(['auth:siswa'])->group(function () {
    Route::get('exam', Exam::class)->name('exam')->lazy();
    Route::get('siswa/dashboard', SiswaDashboard::class)->name('siswa.dashboard')->lazy();
    Route::get('siswa/logout', LogoutSiswa::class)->name('siswa.logout')->lazy();
});

Route::middleware(['guest'])->group(function () {
    Route::get('/', Landing::class)->name('/');
    Route::get('login', Login::class)->name('login');
});
