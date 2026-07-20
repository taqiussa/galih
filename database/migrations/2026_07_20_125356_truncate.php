<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        DB::table('akademik')->truncate();
        DB::table('berkas')->truncate();
        DB::table('biodata')->truncate();
        DB::table('jawaban')->truncate();
        DB::table('seleksi_agama')->truncate();
        DB::table('seleksi_wawancara')->truncate();
        DB::table('seragam')->truncate();
        DB::table('siswa')->truncate();
        DB::table('wawancara')->truncate();

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak dapat di-rollback karena data sudah dihapus.
    }
};
