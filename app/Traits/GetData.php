<?php

namespace App\Traits;

use App\Models\Siswa;

trait GetData
{
    public function get_data_tahun()
    {
        $tahunIni = date('Y');
        $tahunPendaftaran = $tahunIni . ' / ' . intval($tahunIni + 1);

        return $tahunPendaftaran;
    }

    public function get_kode_pendaftaran()
    {
        $prefix = $this->kategori;

        // Ambil kode terakhir berdasarkan prefix jurusan
        $last = Siswa::where('kode_daftar', 'like', $prefix . '%')
            ->orderBy('kode_daftar', 'desc')
            ->value('kode_daftar');

        // Jika belum ada pendaftar
        if (!$last) {
            return $prefix . '0001';
        }

        // Ambil angka di belakang prefix
        $number = intval(substr($last, strlen($prefix)));

        // Increment
        $next = $number + 1;

        // Format 4 digit (ubah 4 jika mau 5 digit, dsb)
        return $prefix . sprintf('%04d', $next);
    }
}
