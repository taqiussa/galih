<?php

namespace App\Livewire\Pendaftaran;

use App\Models\Berkas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

class InputBerkas extends Component
{
    use WireUiActions;

    public $user;
    public $nama;
    public $sekolahDasar;
    public $sekolahAsal;

    public $kode_daftar;
    public $akta;
    public $kk;
    public $ktp;
    public $ijazah;
    public $kip;
    public $piagam;
    public $foto;

    protected $rules = [
        'kode_daftar' => 'required',
        'akta' => 'nullable',
        'kk' => 'nullable',
        'ktp' => 'nullable',
        'ijazah' => 'nullable',
        'kip' => 'nullable',
        'piagam' => 'nullable',
        'foto' => 'nullable',
    ];

    public function mount() {}

    public function render()
    {
        return view('livewire.pendaftaran.input-berkas');
    }

    public function updatedKodeDaftar()
    {
        $this->user = Siswa::with(['biodata'])
            ->whereKodeDaftar($this->kode_daftar)
            ->first();

        $this->nama = $this->user->name;
        $this->sekolahAsal = $this->user->biodata?->nama_sekolah_asal;
        $this->sekolahDasar = $this->user->biodata?->nama_sekolah_dasar;
    }

    public function simpan()
    {

        $this->validate();
        $attributes = [
            'kode_daftar' => $this->kode_daftar,
        ];

        $values = [
            'akta' => $this->akta,
            'kk' => $this->kk,
            'ktp' => $this->ktp,
            'ijazah' => $this->ijazah,
            'kip' => $this->kip,
            'piagam' => $this->piagam,
            'foto' => $this->foto,
            'user_id' => Auth::id(),
        ];

        Berkas::updateOrCreate($attributes, $values);

        $this->notification()->send([
            'icon' => 'success',
            'title' => 'Berhasil!',
            'description' => 'Berhasil Simpan Data Berkas.',
        ]);
    }
}
