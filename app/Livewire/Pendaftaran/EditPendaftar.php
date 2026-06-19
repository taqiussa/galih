<?php

namespace App\Livewire\Pendaftaran;

use App\Traits\GetData;
use Livewire\Component;
use App\Models\Siswa;
use App\Models\Biodata;
use Livewire\Attributes\Title;
use WireUi\Traits\WireUiActions;

#[Title('Edit Pendaftar')]
class EditPendaftar extends Component
{
    use WireUiActions;
    use GetData;

    // Identitas Calon Siswa
    public $user;
    public $tahun;
    public $siswa;
    public $kategori;
    public $kode_daftar;
    public $tingkat;
    public $nama;
    public $nik;
    public $nisn;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $jenis_kelamin;
    public $status;
    public $anak_ke;
    public $gelombang;

    // Alamat
    public $alamat_lengkap;
    public $provinsi;
    public $kabupaten;
    public $kecamatan;
    public $desa;
    public $rt;
    public $rw;
    public $kode_pos;

    // Sekolah Dasar
    public $nama_sekolah_dasar;
    public $provinsi_sekolah_dasar;
    public $kabupaten_sekolah_dasar;
    public $kecamatan_sekolah_dasar;
    public $desa_sekolah_dasar;

    // Sekolah Asal
    public $nama_sekolah_pindahan;
    public $provinsi_sekolah_pindahan;
    public $kabupaten_sekolah_pindahan;
    public $kecamatan_sekolah_pindahan;
    public $desa_sekolah_pindahan;

    //Orang Tua
    public $nama_ayah;
    public $pekerjaan_ayah;
    public $nama_ibu;
    public $pekerjaan_ibu;
    public $penghasilan;
    public $telepon;
    public $kip;

    //Wali
    public $nama_wali;
    public $pekerjaan_wali;
    public $alamat_wali;
    public $telepon_wali;

    protected $rules = [
        'kategori' => 'required',
        'tahun' => 'required',
        'gelombang' => 'required',
        'tingkat' => 'required',
        'nama' => 'required',
        'nisn' => 'nullable',
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'status' => 'required',
        'anak_ke' => 'required',
        'nik' => 'required',
        'alamat_lengkap' => 'nullable',
        'rt' => 'nullable',
        'rw' => 'nullable',
        'desa' => 'required',
        'kecamatan' => 'required',
        'kabupaten' => 'required',
        'provinsi' => 'required',
        'nama_sekolah_dasar' => 'required',
        'desa_sekolah_dasar' => 'required',
        'kecamatan_sekolah_dasar' => 'required',
        'kabupaten_sekolah_dasar' => 'required',
        'provinsi_sekolah_dasar' => 'required',
        'nama_ayah' => 'nullable',
        'nama_ibu' => 'nullable',
        'pekerjaan_ayah' => 'nullable',
        'pekerjaan_ibu' => 'nullable',
        'penghasilan' => 'nullable',
        'telepon' => 'nullable',
    ];

    public function mount($id)
    {
        $this->user = Siswa::query()
            ->with([
                'biodata'
            ])
            ->whereKodeDaftar($id)
            ->first();

        $this->kode_daftar = $this->user->kode_daftar;

        if ($this->user->biodata?->pindahan) {
            $this->kategori = $this->user->biodata?->jenis_kelamin === 'L' ? 'C' : 'D';
        } else {
            $this->kategori = $this->user->biodata?->jenis_kelamin === 'P' ? 'B' : 'A';
        }

        $this->gelombang = $this->user->gelombang;
        $this->nama = $this->user->name;
        $this->tingkat = $this->user->tingkat;
        $this->tahun = $this->user->biodata?->tahun;
        $this->nik = $this->user->biodata?->nik;
        $this->tempat_lahir = $this->user->biodata?->tempat_lahir;
        $this->tanggal_lahir = $this->user->biodata?->tanggal_lahir;
        $this->jenis_kelamin = $this->user->biodata?->jenis_kelamin;
        $this->nisn = $this->user->biodata?->nisn;
        $this->status = $this->user->biodata?->status;
        $this->anak_ke = $this->user->biodata?->anak_ke;

        $this->alamat_lengkap = $this->user->biodata?->alamat_lengkap;
        $this->provinsi = $this->user->biodata?->provinsi;
        $this->kabupaten = $this->user->biodata?->kabupaten;
        $this->kecamatan = $this->user->biodata?->kecamatan;
        $this->desa = $this->user->biodata?->desa;
        $this->rt = $this->user->biodata?->rt;
        $this->rw = $this->user->biodata?->rw;
        $this->kode_pos = $this->user->biodata?->kode_pos;

        $this->nama_sekolah_dasar = $this->user->biodata?->nama_sekolah_dasar;
        $this->provinsi_sekolah_dasar = $this->user->biodata?->provinsi_sekolah_dasar;
        $this->kabupaten_sekolah_dasar = $this->user->biodata?->kabupaten_sekolah_dasar;
        $this->kecamatan_sekolah_dasar = $this->user->biodata?->kecamatan_sekolah_dasar;
        $this->desa_sekolah_dasar = $this->user->biodata?->desa_sekolah_dasar;
        $this->nama_sekolah_pindahan = $this->user->biodata?->nama_sekolah_pindahan;
        $this->provinsi_sekolah_pindahan = $this->user->biodata?->provinsi_sekolah_pindahan;
        $this->kabupaten_sekolah_pindahan = $this->user->biodata?->kabupaten_sekolah_pindahan;
        $this->kecamatan_sekolah_pindahan = $this->user->biodata?->kecamatan_sekolah_pindahan;
        $this->desa_sekolah_pindahan = $this->user->biodata?->desa_sekolah_pindahan;

        $this->nama_ayah = $this->user->biodata?->nama_ayah;
        $this->pekerjaan_ayah = $this->user->biodata?->pekerjaan_ayah;
        $this->nama_ibu = $this->user->biodata?->nama_ibu;
        $this->pekerjaan_ibu = $this->user->biodata?->pekerjaan_ibu;
        $this->telepon = $this->user->biodata?->telepon;
        $this->penghasilan = $this->user->biodata?->penghasilan;
        $this->kip = $this->user->biodata?->kip;

        $this->nama_wali = $this->user->biodata?->nama_wali;
        $this->pekerjaan_wali = $this->user->biodata?->pekerjaan_wali;
        $this->telepon_wali = $this->user->biodata?->telepon_wali;
        $this->alamat_wali = $this->user->biodata?->alamat_wali;
    }

    public function render()
    {
        return view('livewire.pendaftaran.edit-pendaftar');
    }

    public function simpan()
    {

        $this->validate();

        try {

            $pindahan = 0;
            if ($this->kategori == 'C' || $this->kategori == 'D') {
                $pindahan = 1;
            }

            Siswa::query()
                ->whereKodeDaftar($this->kode_daftar)
                ->update(
                    [
                        'name' => $this->nama,
                        'tingkat' => $this->tingkat,
                        'gelombang' => $this->gelombang,
                    ]
                );

            Biodata::query()
                ->whereKodeDaftar($this->kode_daftar)
                ->update(
                    [
                        'jenis_kelamin' => $this->jenis_kelamin,
                        'nik' => $this->nik,
                        'nisn' => $this->nisn,
                        'tempat_lahir' => $this->tempat_lahir,
                        'tanggal_lahir' => $this->tanggal_lahir,
                        'status' => $this->status,
                        'anak_ke' => $this->anak_ke,
                        'nama_ayah' => $this->nama_ayah,
                        'pekerjaan_ayah' => $this->pekerjaan_ayah,
                        'nama_ibu' => $this->nama_ibu,
                        'pekerjaan_ibu' => $this->pekerjaan_ibu,
                        'penghasilan' => $this->penghasilan,
                        'kip' => $this->kip,
                        'telepon' => $this->telepon,
                        'kode_pos' => $this->kode_pos,
                        'alamat_lengkap' => $this->alamat_lengkap,
                        'rt' => $this->rt,
                        'rw' => $this->rw,
                        'desa' => $this->desa,
                        'kecamatan' => $this->kecamatan,
                        'kabupaten' => $this->kabupaten,
                        'provinsi' => $this->provinsi,
                        'pindahan' => $pindahan,
                        'nama_sekolah_dasar' => $this->nama_sekolah_dasar,
                        'desa_sekolah_dasar' => $this->desa_sekolah_dasar,
                        'kecamatan_sekolah_dasar' => $this->kecamatan_sekolah_dasar,
                        'kabupaten_sekolah_dasar' => $this->kabupaten_sekolah_dasar,
                        'provinsi_sekolah_dasar' => $this->provinsi_sekolah_dasar,
                        'nama_sekolah_pindahan' => $this->nama_sekolah_pindahan,
                        'desa_sekolah_pindahan' => $this->desa_sekolah_pindahan,
                        'kecamatan_sekolah_pindahan' => $this->kecamatan_sekolah_pindahan,
                        'kabupaten_sekolah_pindahan' => $this->kabupaten_sekolah_pindahan,
                        'provinsi_sekolah_pindahan' => $this->provinsi_sekolah_pindahan,
                        'nama_wali' => $this->nama_wali,
                        'pekerjaan_wali' => $this->pekerjaan_wali,
                        'alamat_wali' => $this->alamat_wali,
                        'telepon_wali' => $this->telepon_wali
                    ]
                );


            $this->notification()->send([
                'icon' => 'success',
                'title' => 'Sukses Mengupdate!',
                'description' => 'Berhasil Update Siswa.',
            ]);

            // $this->redirectRoute('pendaftaran.data-pendaftar', navigate: true);
            $this->js("
                setTimeout(() => {
                    Livewire.navigate('" . route('pendaftaran.data-pendaftar') . "');
                }, 1000);
            ");
        } catch (\Throwable $th) {

            dd($th);
        }
    }

    public function updatedKategori()
    {
        // $this->kode_daftar = $this->kategori . $this->get_kode_pendaftaran();

        if ($this->kategori == 'A' || $this->kategori == 'C') {
            $this->jenis_kelamin = 'L';
        } else {
            $this->jenis_kelamin = 'P';
        }

        if ($this->kategori == 'A' || $this->kategori == 'B') {
            $this->tingkat = 7;
        } else {
            $this->tingkat = '';
        }
    }
}
