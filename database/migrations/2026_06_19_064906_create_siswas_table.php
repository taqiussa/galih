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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('kode_daftar', 10)->index()->unique();
            $table->string('username', 10)->unique();
            $table->string('name', 50)->index();
            $table->string('nis', 10)->index()->unique()->nullable();
            $table->tinyInteger('tingkat')->nullable();
            $table->tinyInteger('gelombang')->index();
            $table->date('tanggal_daftar');
            $table->foreignId('user_id')->nullable();
            $table->foreignId('pengumuman')->nullable();
            $table->boolean('terukur')->default(false);
            $table->boolean('sudah_tes')->default(false);
            $table->boolean('boleh_tes')->default(false);
            $table->boolean('is_online')->default(false);
            $table->boolean('diterima')->nullable();
            $table->string('password');
            $table->string('remember_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
