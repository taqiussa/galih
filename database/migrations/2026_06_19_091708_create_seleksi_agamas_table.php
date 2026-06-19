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
        Schema::create('seleksi_agama', function (Blueprint $table) {
            $table->id();
            $table->string('kode_daftar', 10);
            $table->string('jenis', 30);
            $table->unsignedTinyInteger('nilai');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seleksi_agama');
    }
};
