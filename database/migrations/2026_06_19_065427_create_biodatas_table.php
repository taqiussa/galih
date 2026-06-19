<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->string('tahun', 20)->nullable()->index();
            $table->string('kode_daftar', 20)->unique()->index();
            $table->string('jenis_kelamin', 50)->nullable();
            $table->string('nisn', 50)->nullable();
            $table->string('nik', 50)->nullable();
            $table->string('tempat_lahir', 150)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('foto')->nullable();
            $table->string('status', 150)->nullable();
            $table->string('anak_ke', 150)->nullable();
            $table->string('nama_ayah', 150)->nullable();
            $table->string('pekerjaan_ayah', 150)->nullable();
            $table->string('nama_ibu', 150)->nullable();
            $table->string('pekerjaan_ibu', 150)->nullable();
            $table->bigInteger('penghasilan')->nullable();
            $table->boolean('kip')->default(false);
            $table->string('telepon', 30)->nullable();
            $table->string('kode_pos', 15)->nullable();
            $table->string('alamat_lengkap', 200)->nullable();
            $table->string('rt', 5)->nullable();
            $table->string('rw', 5)->nullable();
            $table->string('desa', 200)->nullable();
            $table->string('kecamatan', 200)->nullable();
            $table->string('kabupaten', 200)->nullable();
            $table->string('provinsi', 200)->nullable();
            $table->string('nama_sekolah_dasar', 150)->nullable();
            $table->boolean('pindahan')->default(false);
            $table->string('desa_sekolah_dasar', 200)->nullable();
            $table->string('kecamatan_sekolah_dasar', 200)->nullable();
            $table->string('kabupaten_sekolah_dasar', 200)->nullable();
            $table->string('provinsi_sekolah_dasar', 200)->nullable();
            $table->string('nama_sekolah_pindahan', 150)->nullable();
            $table->string('desa_sekolah_pindahan', 200)->nullable();
            $table->string('kecamatan_sekolah_pindahan', 200)->nullable();
            $table->string('kabupaten_sekolah_pindahan', 200)->nullable();
            $table->string('provinsi_sekolah_pindahan', 200)->nullable();
            $table->string('nama_wali', 30)->nullable();
            $table->string('pekerjaan_wali', 150)->nullable();
            $table->string('alamat_wali', 150)->nullable();
            $table->string('telepon_wali', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata');
    }
};
