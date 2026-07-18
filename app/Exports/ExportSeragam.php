<?php

namespace App\Exports;

use App\Models\Seragam;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportSeragam implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    private int $no = 1;

    public function query()
    {
        return Seragam::query()
            ->with([
                'siswa.biodata',
            ])
            ->orderBy('kode_daftar');
    }

    public function headings(): array
    {
        return [
            'No',
            'Kode Daftar',
            'Nama',
            'Jenis Kelamin',
            'Atasan',
            'Bawahan',
            'Olahraga',
            'Peci',
        ];
    }

    public function map($seragam): array
    {
        return [
            $this->no++,
            $seragam->kode_daftar,
            $seragam->siswa?->name,
            $seragam->siswa?->biodata?->jenis_kelamin,
            strtoupper($seragam->atasan),
            strtoupper($seragam->bawahan),
            strtoupper($seragam->olah_raga),
            strtoupper($seragam->peci),
        ];
    }
}
