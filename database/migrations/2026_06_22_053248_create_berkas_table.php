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
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_daftar', 10);
            $table->string('kk', 10);
            $table->string('akta', 10);
            $table->string('ktp', 10);
            $table->string('ijazah', 10);
            $table->string('kip', 10);
            $table->string('piagam', 10);
            $table->string('foto', 10);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berkas');
    }
};
