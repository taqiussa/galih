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
        Schema::create('wawancara', function (Blueprint $table) {
            $table->id();

            // Relasi ke siswa
            $table->string('kode_daftar')->index();

            // 1
            $table->text('alasan_memilih')->nullable();

            // 2
            $table->enum('keinginan', [
                'Sendiri',
                'Orang Tua',
                'Bersama',
                'Ikut Teman'
            ])->nullable();

            // 3
            $table->boolean('siap_tata_tertib')->default(true);

            // 4
            $table->foreignId('ekstrakurikuler_id')->nullable();

            // 5
            $table->string('mata_pelajaran_favorit')->nullable();

            // 6
            $table->text('perilaku_buruk')->nullable();

            // 7
            $table->text('kendala_pergaulan')->nullable();

            // 8
            $table->text('kendala_kehidupan')->nullable();

            // 9
            $table->text('riwayat_penyakit')->nullable();

            // 10
            $table->text('harapan')->nullable();

            // Catatan pewawancara
            $table->text('catatan')->nullable();

            // Pewawancara
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->timestamps();

            $table->foreign('kode_daftar')
                ->references('kode_daftar')
                ->on('siswa')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wawancara');
    }
};
