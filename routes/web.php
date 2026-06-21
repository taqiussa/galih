<?php

use App\Http\Controllers\Auth\GetPendaftarController;
use App\Http\Controllers\Auth\GetSiswaDiterimaController;
use App\Http\Controllers\Pendaftaran\PrintFormulirController;
use App\Livewire\Agama\HasilAgama;
use App\Livewire\Agama\InputAgama;
use App\Livewire\Auth\Dashboard;
use App\Livewire\Auth\Logout;
use App\Livewire\Landing;
use App\Livewire\Login;
use App\Livewire\Pendaftaran\DataPendaftar;
use App\Livewire\Pendaftaran\EditPendaftar;
use App\Livewire\Pendaftaran\InputPendaftaran;
use App\Livewire\Seragam\HasilUkurSeragam;
use App\Livewire\Seragam\UkurSeragam;
use App\Livewire\Siswa\Dashboard as SiswaDashboard;
use App\Livewire\Siswa\Exam;
use App\Livewire\Siswa\LogoutSiswa;
use App\Livewire\Wawancara\HasilWawancara;
use App\Livewire\Wawancara\InputWawancara;
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

// Seleksi Agama
Route::middleware(['auth', 'role:Admin|Agama'])->group(function () {
    Route::get('input-agama', InputAgama::class)->name('agama.input-agama')->lazy();
    Route::get('hasil-agama', HasilAgama::class)->name('agama.hasil-agama')->lazy();
});

// Seleksi Wawancara
Route::middleware(['auth', 'role:Admin|Wawancara'])->group(function () {
    Route::get('input-wawancara', InputWawancara::class)->name('wawancara.input-wawancara')->lazy();
    Route::get('hasil-wawancara', HasilWawancara::class)->name('wawancara.hasil-wawancara')->lazy();
});

// Ukur Seragam
Route::middleware(['auth', 'role:Admin|Seragam'])->group(function () {
    Route::get('input-seragam', UkurSeragam::class)->name('seragam.input-seragam')->lazy();
    Route::get('hasil-seragam', HasilUkurSeragam::class)->name('seragam.hasil-seragam')->lazy();
});
