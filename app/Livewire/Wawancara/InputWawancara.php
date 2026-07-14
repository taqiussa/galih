<?php

namespace App\Livewire\Wawancara;

use App\Models\Ekstrakurikuler;
use App\Models\Siswa;
use App\Models\Wawancara;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

#[Title('Input Wawancara')]
class InputWawancara extends Component
{
    use WireUiActions;

    public $kode_daftar;

    public $user;
    public $nama;
    public $sekolahDasar;
    public $sekolahAsal;

    public $alasan_memilih;
    public $keinginan;
    public $siap_tata_tertib = true;
    public $ekstrakurikuler_id;
    public $mata_pelajaran_favorit;
    public $perilaku_buruk;
    public $kendala_pergaulan;
    public $kendala_kehidupan;
    public $riwayat_penyakit;
    public $harapan;
    public $catatan;

    public $listEkstrakurikuler;

    protected $rules = [
        'kode_daftar' => 'required|exists:siswa,kode_daftar',
        'alasan_memilih' => 'required',
        'keinginan' => 'required|in:Sendiri,Orang Tua,Bersama,Ikut Teman',
        'siap_tata_tertib' => 'required|boolean',
        'ekstrakurikuler_id' => 'nullable|exists:ekstrakurikuler,id',
        'mata_pelajaran_favorit' => 'nullable|string|max:100',
        'perilaku_buruk' => 'nullable|string',
        'kendala_pergaulan' => 'nullable|string',
        'kendala_kehidupan' => 'nullable|string',
        'riwayat_penyakit' => 'nullable|string',
        'harapan' => 'nullable|string',
        'catatan' => 'nullable|string',
    ];

    public function mount()
    {
        $this->listEkstrakurikuler = Ekstrakurikuler::query()
            ->orderBy('nama')
            ->get();
    }

    public function render()
    {
        return view('livewire.wawancara.input-wawancara');
    }

    public function updatedKodeDaftar()
    {
        $this->user = Siswa::query()
            ->whereKodeDaftar($this->kode_daftar)
            ->with([
                'biodata',
                'wawancara',
            ])
            ->first();

        $this->nama = $this->user?->name;
        $this->sekolahAsal = $this->user?->biodata?->nama_sekolah_pindahan;
        $this->sekolahDasar = $this->user?->biodata?->nama_sekolah_dasar;

        $w = $this->user?->wawancara;

        $this->alasan_memilih = $w?->alasan_memilih;
        $this->keinginan = $w?->keinginan;
        $this->siap_tata_tertib = $w?->siap_tata_tertib ?? true;
        $this->ekstrakurikuler_id = $w?->ekstrakurikuler_id;
        $this->mata_pelajaran_favorit = $w?->mata_pelajaran_favorit;
        $this->perilaku_buruk = $w?->perilaku_buruk;
        $this->kendala_pergaulan = $w?->kendala_pergaulan;
        $this->kendala_kehidupan = $w?->kendala_kehidupan;
        $this->riwayat_penyakit = $w?->riwayat_penyakit;
        $this->harapan = $w?->harapan;
        $this->catatan = $w?->catatan;
    }

    public function simpan()
    {
        $this->validate();

        try {

            Wawancara::updateOrCreate(
                [
                    'kode_daftar' => $this->kode_daftar,
                ],
                [
                    'user_id' => Auth::id(),
                    'alasan_memilih' => $this->alasan_memilih,
                    'keinginan' => $this->keinginan,
                    'siap_tata_tertib' => $this->siap_tata_tertib,
                    'ekstrakurikuler_id' => $this->ekstrakurikuler_id,
                    'mata_pelajaran_favorit' => $this->mata_pelajaran_favorit,
                    'perilaku_buruk' => $this->perilaku_buruk,
                    'kendala_pergaulan' => $this->kendala_pergaulan,
                    'kendala_kehidupan' => $this->kendala_kehidupan,
                    'riwayat_penyakit' => $this->riwayat_penyakit,
                    'harapan' => $this->harapan,
                    'catatan' => $this->catatan,
                ]
            );

            $this->notification()->send([
                'icon' => 'success',
                'title' => 'Berhasil!',
                'description' => 'Data wawancara berhasil disimpan.',
            ]);

            $this->updatedKodeDaftar();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
