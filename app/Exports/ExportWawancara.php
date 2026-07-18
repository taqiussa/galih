<?php

namespace App\Exports;

use App\Models\Wawancara;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportWawancara implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize
{
    private int $no = 1;

    public function query()
    {
        return Wawancara::query()
            ->with([
                'siswa.biodata',
                'ekstrakurikuler',
                'guru',
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
            'Alasan Memilih',
            'Keinginan',
            'Siap Tata Tertib',
            'Ekstrakurikuler',
            'Mata Pelajaran Favorit',
            'Perilaku Buruk',
            'Kendala Pergaulan',
            'Kendala Kehidupan',
            'Riwayat Penyakit',
            'Harapan',
            'Catatan',
            'Pewawancara',
            'Status',
            'Tanggal Wawancara',
        ];
    }

    public function map($wawancara): array
    {
        return [
            $this->no++,
            $wawancara->kode_daftar,
            $wawancara->siswa?->name,
            $wawancara->siswa?->biodata?->jenis_kelamin,
            $wawancara->alasan_memilih,
            $wawancara->keinginan,
            $wawancara->siap_tata_tertib ? 'Ya' : 'Tidak',
            $wawancara->ekstrakurikuler?->nama,
            $wawancara->mata_pelajaran_favorit,
            $wawancara->perilaku_buruk,
            $wawancara->kendala_pergaulan,
            $wawancara->kendala_kehidupan,
            $wawancara->riwayat_penyakit,
            $wawancara->harapan,
            $wawancara->catatan,
            $wawancara->guru?->name,
            ucfirst($wawancara->diterima),
            optional($wawancara->created_at)->format('d-m-Y H:i'),
        ];
    }
}
