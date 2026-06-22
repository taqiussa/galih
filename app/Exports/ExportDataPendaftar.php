<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportDataPendaftar implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Siswa::with('biodata')
            ->orderBy('name')
            ->get()
            ->map(function ($siswa, $index) {
                $biodata = $siswa->biodata;

                return [
                    'no'                     => $index + 1,
                    'kode_daftar'            => $siswa->kode_daftar,
                    'nama'                   => $siswa->name,
                    'nama_sekolah_dasar'     => $biodata?->nama_sekolah_dasar,
                    'nama_sekolah_pindahan'  => $biodata?->nama_sekolah_pindahan,
                    'nama_ayah'              => $biodata?->nama_ayah,
                    'nama_ibu'               => $biodata?->nama_ibu,
                    'telepon'                => $biodata?->telepon,
                    'alamat'                 => collect([
                        $biodata?->rt ? 'RT ' . $biodata->rt : null,
                        $biodata?->rw ? 'RW ' . $biodata->rw : null,
                        $biodata?->desa,
                        $biodata?->kecamatan,
                        $biodata?->kabupaten,
                        $biodata?->provinsi,
                    ])->filter()->implode(', '),
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
            'Nama Ayah',
            'Nama Ibu',
            'Telepon',
            'Alamat',
        ];
    }
}
