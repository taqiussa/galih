<?php

use App\Models\Ekstrakurikuler;
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
        Schema::create('ekstrakurikuler', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        $data = [
            "Al Qur'an",
            "Bulu Tangkis",
            "Futsal",
            "Marching Band",
            "Pagar Nusa",
            "Pramuka",
            "Rebana",
            "Voli"
        ];

        foreach ($data as $ekstra) {
            Ekstrakurikuler::create(['nama' => $ekstra]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikuler');
    }
};
