<?php

namespace App\Exports;

use App\Models\Berkas;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportBerkas implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Berkas::query()->with('siswa');
    }

    public function headings(): array
    {
        return [
            'Kode Daftar',
            'Nama',
            'KK',
            'Akta',
            'KTP',
            'Ijazah',
            'KIP',
            'Piagam',
            'Foto',
            'Tanggal Upload',
        ];
    }

    public function map($berkas): array
    {
        return [
            $berkas->kode_daftar,
            $berkas->siswa?->name,
            $berkas->kk,
            $berkas->akta,
            $berkas->ktp,
            $berkas->ijazah,
            $berkas->kip,
            $berkas->piagam,
            $berkas->foto,
            optional($berkas->created_at)->format('d-m-Y H:i'),
        ];
    }
}
