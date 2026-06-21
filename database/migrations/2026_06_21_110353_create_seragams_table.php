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
        Schema::create('seragam', function (Blueprint $table) {
            $table->id();
            $table->string('kode_daftar', 10);
            $table->string('atasan', 10)->nullable();
            $table->string('bawahan', 10)->nullable();
            $table->string('olah_raga', 10)->nullable();
            $table->string('peci')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seragam');
    }
};
