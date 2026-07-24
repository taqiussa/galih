<?php

namespace App\Livewire\Seragam;

use App\Exports\ExportSeragam;
use App\Models\Siswa;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

#[Title('Hasil Ukur Seragam')]
class HasilUkurSeragam extends Component
{
    use WithPagination;

    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function download_data()
    {
        return Excel::download(new ExportSeragam(), 'Hasil Ukur Seragam.xlsx');
    }

    #[Computed]
    public function dataSeragam()
    {
        return Siswa::query()
            ->select('id', 'kode_daftar', 'name')
            ->with([
                'biodata:kode_daftar,jenis_kelamin',
                'seragam:id,kode_daftar,atasan,bawahan,olah_raga,peci',
            ])
            ->whereHas('seragam')
            ->get();
    }

    #[Computed]
    public function rekap()
    {
        $putra = $this->dataSeragam
            ->filter(fn($siswa) => $siswa->biodata?->jenis_kelamin === 'L');

        $putri = $this->dataSeragam
            ->filter(fn($siswa) => $siswa->biodata?->jenis_kelamin === 'P');

        return [
            'putra' => [
                'total' => $putra->count(),

                'atasan' => $putra
                    ->pluck('seragam.atasan')
                    ->filter()
                    ->countBy()
                    ->sortKeys(),

                'bawahan' => $putra
                    ->pluck('seragam.bawahan')
                    ->filter()
                    ->countBy()
                    ->sortKeys(),

                'olahraga' => $putra
                    ->pluck('seragam.olah_raga')
                    ->filter()
                    ->countBy()
                    ->sortKeys(),

                'peci' => $putra
                    ->pluck('seragam.peci')
                    ->filter()
                    ->countBy()
                    ->sortKeys(),
            ],

            'putri' => [
                'total' => $putri->count(),

                'atasan' => $putri
                    ->pluck('seragam.atasan')
                    ->filter()
                    ->countBy()
                    ->sortKeys(),

                'bawahan' => $putri
                    ->pluck('seragam.bawahan')
                    ->filter()
                    ->countBy()
                    ->sortKeys(),

                'olahraga' => $putri
                    ->pluck('seragam.olah_raga')
                    ->filter()
                    ->countBy()
                    ->sortKeys(),
            ],
        ];
    }

    #[Computed]
    public function listSiswa()
    {
        return Siswa::query()
            ->with([
                'biodata:kode_daftar,jenis_kelamin',
                'seragam:id,kode_daftar,atasan,bawahan,olah_raga,peci',
            ])
            ->whereHas('seragam')
            ->when(
                $this->search,
                fn($q) => $q->where('name', 'like', '%' . $this->search . '%')
            )
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.seragam.hasil-ukur-seragam');
    }
}
