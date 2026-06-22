<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportHasilPengumuman implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Siswa::query()
            ->with([
                'biodata:kode_daftar,nama_sekolah_dasar',
                'akademik',
                'seleksiAgama',
                'seleksiWawancara'
            ])
            ->orderBy('kode_daftar')
            ->get()
            ->map(function ($siswa, $index) {
                $biodata = $siswa->biodata;
                $akademik = $siswa->akademik;
                $seleksiAgama = $siswa->seleksiAgama;
                $seleksiWawancara = $siswa->seleksiWawancara;

                return [
                    'no'                     => $index + 1,
                    'kode_daftar'            => $siswa->kode_daftar,
                    'nama'                   => $siswa->name,
                    'nama_sekolah_dasar'     => $biodata?->nama_sekolah_dasar,
                    'nama_sekolah_pindahan'  => $biodata?->nama_sekolah_pindahan,
                    'nilai_akademik'         => $akademik?->nilai,
                    'hafalan'                => $seleksiAgama?->where('jenis', 'hafalan')->first()?->nilai,
                    'bacaan'                 => $seleksiAgama?->where('jenis', 'alquran')->first()?->nilai,
                    'tinggi'                 =>  $seleksiWawancara?->tinggi,
                    'berat'                  =>  $seleksiWawancara?->berat,
                    'model_rambut'                 =>  $seleksiWawancara?->model_rambut,
                    'mata_minus'                  =>  $seleksiWawancara?->mata_minus,
                    'penyakit_lain'               =>  $seleksiWawancara?->penyakit_lain
                ];
            });
    }


    public function headings(): array
    {
        return [
            'No',
            'Kode Daftar',
            'Nama',
            'Sekolah Dasar',
            'Sekolah Pindahan',
            'Nilai Akademik',
            'Nilai Hafalan Al Quran',
            'Nilai Bacaan Al Quran',
            'Tinggi Badan',
            'Berat Badan',
            'Model Rambut',
            'Penyakit Lain',
        ];
    }
}
