<?php

use App\Http\Controllers\Auth\GetPendaftarController;
use App\Http\Controllers\Auth\GetSiswaDiterimaController;
use App\Http\Controllers\Pendaftaran\PrintFormulirController;
use App\Livewire\Auth\Dashboard;
use App\Livewire\Auth\Logout;
use App\Livewire\Landing;
use App\Livewire\Login;
use App\Livewire\Pendaftaran\DataPendaftar;
use App\Livewire\Pendaftaran\EditPendaftar;
use App\Livewire\Pendaftaran\InputPendaftaran;
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

// Pendaftaran
Route::middleware(['auth', 'role:Admin|Pendaftaran'])->group(function () {
    Route::get('data-pendaftar', DataPendaftar::class)->name('pendaftaran.data-pendaftar')->lazy();
    Route::get('edit-pendaftar/{id}', EditPendaftar::class)->name('pendaftaran.edit-pendaftar')->lazy();
    Route::get('input-pendaftaran', InputPendaftaran::class)->name('pendaftaran.input-pendaftaran')->lazy();


    Route::get('print-formulir-pendaftaran/{id}', PrintFormulirController::class)->name('print.formulir-pendaftaran');
});
