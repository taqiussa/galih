<?php

namespace App\Livewire\Pendaftaran;

use App\Traits\GetData;
use Livewire\Component;
use App\Models\Siswa;
use App\Models\Biodata;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use WireUi\Traits\WireUiActions;

#[Title('Input Pendaftaran')]
class InputPendaftaran extends Component
{
    use WireUiActions;
    use GetData;

    // Identitas Calon Siswa
    public $kategori;
    public $kode_daftar;
    public $tahun;
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

    // Sekolah pindahan
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

    public $siswa;

    protected $rules = [
        'kategori' => 'required',
        'gelombang' => 'required',
        'tingkat' => 'required',
        'nama' => 'required|string',
        'nisn' => 'required|numeric',
        'jenis_kelamin' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required',
        'status' => 'required',
        'anak_ke' => 'required',
        'nik' => 'required|numeric',
        'kip' => 'required',
        'alamat_lengkap' => 'required',
        'rt' => 'required|numeric',
        'rw' => 'required|numeric',
        'desa' => 'required',
        'kecamatan' => 'required',
        'kabupaten' => 'required',
        'provinsi' => 'required',
        'nama_sekolah_dasar' => 'required',
        'desa_sekolah_dasar' => 'required',
        'kecamatan_sekolah_dasar' => 'required',
        'kabupaten_sekolah_dasar' => 'required',
        'provinsi_sekolah_dasar' => 'required',
        'nama_ayah' => 'required',
        'nama_ibu' => 'required',
        'pekerjaan_ayah' => 'required',
        'pekerjaan_ibu' => 'required',
        'penghasilan' => 'required|numeric',
        'telepon' => 'required',
    ];

    protected $messages = [
        'kategori.required' => 'harus diisi',
        'gelombang.required' => 'harus diisi',
        'tingkat.required' => 'harus diisi',
        'nama.required' => 'harus diisi',
        'nama.string' => 'harus berupa huruf',
        'nisn.numeric' => 'harus berupa angka',
        'nisn.digits' => 'minimal 10 angka',
        'jenis_kelamin.required' => 'harus diisi',
        'tempat_lahir.required' => 'harus diisi',
        'tanggal_lahir.required' => 'harus diisi',
        'status.required' => 'harus diisi',
        'anak_ke.required' => 'harus diisi',
        'nik.required' => 'harus diisi',
        'nik.numeric' => 'harus berupa angka',
        'alamat_lengkap.required' => 'harus diisi',
        'rt.required' => 'harus diisi',
        'rt.numeric' => 'harus berupa angka',
        'rw.required' => 'harus diisi',
        'rw.numeric' => 'harus berupa angka',
        'desa.required' => 'harus diisi',
        'kecamatan.required' => 'harus diisi',
        'kabupaten.required' => 'harus diisi',
        'provinsi.required' => 'harus diisi',
        'nama_sekolah_dasar.required' => 'harus diisi',
        'desa_sekolah_dasar.required' => 'harus diisi',
        'kecamatan_sekolah_dasar.required' => 'harus diisi',
        'kabupaten_sekolah_dasar.required' => 'harus diisi',
        'provinsi_sekolah_dasar.required' => 'harus diisi',
        'nama_ayah.required' => 'harus diisi',
        'nama_ibu.required' => 'harus diisi',
        'pekerjaan_ayah.required' => 'harus diisi',
        'pekerjaan_ibu.required' => 'harus diisi',
        'penghasilan.required' => 'harus diisi',
        'penghasilan.numeric' => 'harus berupa angka',
        'telepon.required' => 'harus diisi',
    ];

    public function mount()
    {
        $this->tahun = $this->get_data_tahun();
        $this->tanggal_lahir = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.pendaftaran.input-pendaftaran');
    }

    public function simpan()
    {

        try {
            $this->validate();
        } catch (\Throwable $th) {

            $this->dialog()->show([
                'icon' => 'error',
                'title' => 'Error Dialog!',
                'description' => 'Ada Data Kosong, Silahkan Cek Kembali.',
            ]);

            throw $th;
        }

        try {
            $this->kode_daftar = $this->get_kode_pendaftaran();

            $pindahan = 0;
            if ($this->kategori == 'C' || $this->kategori == 'D') {
                $pindahan = 1;
            }

            $user = Siswa::create(
                [
                    'name' => strtoupper($this->nama),
                    'gelombang' => $this->gelombang,
                    'username' => $this->kode_daftar,
                    'kode_daftar' => $this->kode_daftar,
                    'password' => bcrypt('123456789'),
                    'tanggal_daftar' => date('Y-m-d'),
                    'is_online' => 0,
                    'tingkat' => $this->tingkat,
                    'user_id' => Auth::id(),
                ]
            );

            $payload = [
                'kode_daftar'     => $this->kode_daftar,
                'alamat_lengkap'  => $this->alamat_lengkap,
                'rt'              => $this->rt,
                'rw'              => $this->rw,
                'kode_pos'        => $this->kode_pos,
                'desa'            => $this->desa,
                'kecamatan'       => $this->kecamatan,
                'kabupaten'       => $this->kabupaten,
                'provinsi'        => $this->provinsi,
                'tahun'           => $this->tahun,
                'nik'             => $this->nik,
                'nisn'            => $this->nisn,
                'jenis_kelamin'   => $this->jenis_kelamin,
                'tempat_lahir'    => $this->tempat_lahir,
                'tanggal_lahir'   => $this->tanggal_lahir,
                'status'          => $this->status,
                'anak_ke'         => $this->anak_ke,
                'nama_ayah'       => strtoupper($this->nama_ayah),
                'pekerjaan_ayah'  => $this->pekerjaan_ayah,
                'nama_ibu'        => strtoupper($this->nama_ibu),
                'pekerjaan_ibu'   => $this->pekerjaan_ibu,
                'penghasilan'     => $this->penghasilan,
                'telepon'         => $this->telepon,
                'kip'             => $this->kip,
                'pindahan'        => $pindahan,
                'nama_sekolah_dasar'      => strtoupper($this->nama_sekolah_dasar),
                'desa_sekolah_dasar'         => $this->desa_sekolah_dasar,
                'kecamatan_sekolah_dasar'    => $this->kecamatan_sekolah_dasar,
                'kabupaten_sekolah_dasar'    => $this->kabupaten_sekolah_dasar,
                'provinsi_sekolah_dasar'     => $this->provinsi_sekolah_dasar,
                'nama_wali'       => strtoupper($this->nama_wali),
                'pekerjaan_wali'  => $this->pekerjaan_wali,
                'alamat_wali'     => $this->alamat_wali,
                'telepon_wali'    => $this->telepon_wali,
            ];

            if (in_array($this->kategori, ['C', 'D'])) {
                $payload = array_merge($payload, [
                    'nama_sekolah_pindahan'        => strtoupper($this->nama_sekolah_pindahan),
                    'desa_sekolah_pindahan'        => $this->desa_sekolah_pindahan,
                    'kecamatan_sekolah_pindahan'   => $this->kecamatan_sekolah_pindahan,
                    'kabupaten_sekolah_pindahan'   => $this->kabupaten_sekolah_pindahan,
                    'provinsi_sekolah_pindahan'    => $this->provinsi_sekolah_pindahan,
                ]);
            }

            Biodata::create($payload);

            $this->siswa = $user;

            $this->notification()->send([
                'icon' => 'success',
                'title' => 'Berhasil!',
                'description' => 'Berhasil Simpan Pendaftar.',
            ]);
        } catch (\Throwable $th) {

            // DB::rollBack();

            dd($th);
        }
    }

    // Updated For Kategori Pendaftar
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
