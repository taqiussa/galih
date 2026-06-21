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
        Schema::create('seleksi_wawancara', function (Blueprint $table) {
            $table->id();
            $table->string('kode_daftar', 10);
            $table->string('tinggi', 10)->nullable();
            $table->string('berat', 10)->nullable();
            $table->string('model_rambut')->nullable();
            $table->string('mata_minus', 100)->nullable();
            $table->string('ngompol', 30)->nullable();
            $table->string('merokok', 30)->nullable();
            $table->string('penyakit_lain')->nullable();
            $table->foreignId('ekstrakurikuler_id')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seleksi_wawancara');
    }
};
