<?php

use App\Models\Pertanyaan;
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
        Schema::create('pertanyaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('nomor');
            $table->text('soal');
            $table->text('pilihan');
            $table->unsignedTinyInteger('kunci');
            $table->timestamps();
        });

        $data  = [
            [
                'soal' => 'Kata yang merupakan antonim dari kata "besar" adalah...',
                'pilihan' => json_encode(["Tinggi", "Kecil", "Luas", "Berat"]),
                'kunci' => 1
            ],
            [
                'soal' => 'Perhatikan kalimat berikut:
"Mereka pergi ke pasar setelah sekolah."
Kata “setelah” dalam kalimat tersebut berfungsi sebagai... ',
                'pilihan' => json_encode(["Kata benda", "Kata kerja", "Kata depan", "Kata sifat"]),
                'kunci' => 2
            ],
            [
                'soal' => 'Sinonim dari kata "menyelesaikan" adalah...',
                'pilihan' => json_encode(["Mengerjakan", "Memulai", "Menuntaskan", "Menggagalkan"]),
                'kunci' => 2
            ],
            [
                'soal' => 'Dalam sebuah teks, kalimat yang mengandung informasi utama disebut...',
                'pilihan' => json_encode(["Kalimat penghubung", "Kalimat penjelas", "Kalimat utama", "Kalimat perintah"]),
                'kunci' => 2
            ],
            [
                'soal' => '56 dibagi 7 adalah... ',
                'pilihan' => json_encode(["6", "7", "8", "9"]),
                'kunci' => 2
            ],
            [
                'soal' => 'Keliling persegi panjang dengan panjang 15 cm dan lebar 8 cm adalah...',
                'pilihan' => json_encode(["30 cm", "46 cm", "60 cm", "120 cm"]),
                'kunci' => 1
            ],
            [
                'soal' => 'Hasil dari 15 x 6 adalah...',
                'pilihan' => json_encode(["90", "100", "110", "120"]),
                'kunci' => 0
            ],
            [
                'soal' => 'Proses perubahan air dari bentuk cair menjadi gas disebut...',
                'pilihan' => json_encode(["Pembekuan", "Penguapan", "Penyubliman", "Pencairan"]),
                'kunci' => 1
            ],
            [
                'soal' => 'Hewan yang berkembang biak dengan cara bertelur adalah...',
                'pilihan' => json_encode(["Kucing", "Ayam", "Kelinci", "Manusia"]),
                'kunci' => 1
            ],
            [
                'soal' => 'Benda yang dapat mengalirkan listrik disebut...',
                'pilihan' => json_encode(["Isolator", "Konduktor", "Reflektor", "Absorber"]),
                'kunci' => 1
            ],
            [
                'soal' => 'Apa yang dimaksud dengan gaya gravitasi? ',
                'pilihan' => json_encode(["Gaya yang menyebabkan benda bergerak", "Gaya yang menarik benda ke pusat bumi", "Gaya yang membuat benda melayang", "Gaya yang menghambat benda bergerak"]),
                'kunci' => 1
            ],
            [
                'soal' => 'Apa ibu kota negara Indonesia?',
                'pilihan' => json_encode(["Surabaya", "Bali", "Jakarta", "Bandung"]),
                'kunci' => 2
            ],
            [
                'soal' => 'Candi Borobudur terletak di provinsi...',
                'pilihan' => json_encode(["Jawa Timur", "Jawa Tengah", "Bali", "Yogyakarta"]),
                'kunci' => 1
            ],
            [
                'soal' => 'Siapa presiden pertama Indonesia? ',
                'pilihan' => json_encode(["Soeharto", "B.J. Habibie", "Sukarno", "Megawati"]),
                'kunci' => 2
            ],
            [
                'soal' => 'Pulau terbesar di Indonesia adalah...',
                'pilihan' => json_encode(["Bali", "Sumatra", "Kalimantan", "Papua"]),
                'kunci' => 2
            ],
            [
                'soal' => 'Nama tarian tradisional yang berasal dari Bali adalah...',
                'pilihan' => json_encode(["Pendet", "Jaipong", "Kecak", "Saman"]),
                'kunci' => 0
            ],
            [
                'soal' => 'Salah satu rukun iman dalam agama Islam adalah...',
                'pilihan' => json_encode(["Percaya kepada malaikat", "Berbuat baik", "Berdoa lima waktu", "Berpuasa Ramadhan"]),
                'kunci' => 0
            ],
            [
                'soal' => 'Hukum puasa di bulan Ramadhan bagi umat Islam adalah...',
                'pilihan' => json_encode(["Wajib", "Sunnah", "Mubah", "Haram"]),
                'kunci' => 0
            ],
            [
                'soal' => 'Apa nama kitab suci umat Islam?',
                'pilihan' => json_encode(["Al-Qur'an", "Injil", "Taurat", "Veda"]),
                'kunci' => 0
            ],
            [
                'soal' => 'Zakat fitrah wajib dikeluarkan setiap tahun oleh umat Islam pada bulan...',
                'pilihan' => json_encode(["Ramadhan", "Syawal", "Dzulhijjah", "Safar"]),
                'kunci' => 0
            ],
        ];

        foreach ($data as $key => $item) {
            Pertanyaan::create([
                'nomor' => $key + 1,
                'soal' => $item['soal'],
                'pilihan' => $item['pilihan'],
                'kunci' => $item['kunci'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan');
    }
};
