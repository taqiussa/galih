<?php

use App\Models\Siswa;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->string('diterima', 15)->nullable()->change();
        });

        Siswa::query()->update([
            'diterima' => DB::raw("IF(diterima = 1, 'diterima', 'tidak diterima')")
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Siswa::query()->update([
            'diterima' => 1
        ]);

        Schema::table('siswa', function (Blueprint $table) {
            $table->boolean('diterima')->change();
        });
    }
};
