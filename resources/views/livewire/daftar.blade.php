<div class="flex flex-col mb-10 space-y-7 p-3 md:p-10">
    <h2 class="text-2xl font-bold text-slate-600">Form Pendaftaran Calon Siswa</h2>
    {{-- Identitas Siswa --}}
    <x-card class="flex flex-col space-y-4 mb-3 ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">A. Identitas Calon Siswa</h2>
        <div class="flex flex-col space-y-4 mb-3 lg:grid lg:grid-cols-3 lg:gap-2 lg:space-y-0">
            <x-native-select wire:model.live="kategori" label="Pendaftaran Siswa">
                <option value="">Pilih Kategori</option>
                <option value="A">Baru Putra</option>
                <option value="B">Baru Putri</option>
                <option value="C">Pindahan Putra</option>
                <option value="D">Pindahan Putri</option>
            </x-native-select>
            <x-native-select wire:model="tingkat" label="Pendaftaran Kelas">
                <option value="">Pilih Tingkat</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
            </x-native-select>
            <x-input wire:model="nama" label="Nama Lengkap" />
        </div>
        <div class="flex flex-col space-y-4 mb-3 lg:grid lg:grid-cols-3 lg:gap-2 lg:space-y-0">
            <x-input wire:model="nik" label="NIK" />
            <x-input wire:model="tempat_lahir" label="Tempat Lahir" />
            <x-input wire:model="tanggal_lahir" label="Tanggal Lahir" type="date" />
        </div>
        <div class="flex flex-col space-y-4 mb-3 lg:grid lg:grid-cols-3 lg:gap-2 lg:space-y-0">
            <x-native-select wire:model="jenis_kelamin" label="Jenis Kelamin" disabled>
                <option value="">Jenis Kelamin</option>
                <option value="L">Laki - Laki</option>
                <option value="P">Perempuan</option>
            </x-native-select>
            <x-native-select wire:model="status" label="Status">
                <option value="">Pilih Status</option>
                <option value="Anak Kandung">Anak Kandung</option>
                <option value="Anak Tiri">Anak Tiri</option>
                <option value="Anak Angkat">Anak Angkat</option>
            </x-native-select>
            <x-input wire:model="anak_ke" label="Anak Ke - Berapa" placeholder="1 , 2 , 3 ..."
                corner="contoh : 1 , 2, 3 ..." />
        </div>
    </x-card>

    {{-- Alamat Siswa --}}
    <x-card class="flex flex-col space-y-4 mb-3 ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">B. Alamat Calon Siswa</h2>
        <div>
            <x-textarea wire:model="alamat_lengkap" label="Alamat"
                placeholder="Jl. Hidayah No.7 , Perum Asri Blok A No. 6 ..."
                corner="contoh : Perum Asri Blok A No. 7" />
        </div>
        <div class="flex flex-col space-y-4 mb-3 lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0">
            <x-input wire:model="provinsi" label="Provinsi" />
            <x-input wire:model="kabupaten" label="kabupaten" />
            <x-input wire:model="kecamatan" label="kecamatan" />
            <x-input wire:model="desa" label="desa" />
        </div>
        <div class="flex flex-col space-y-4 mb-3 lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0">
            <x-input wire:model="rt" label='Rt' corner="contoh : 1, 2, 3 ..." />
            <x-input wire:model="rw" label='Rw' corner="contoh : 1, 2, 3 ..." />
            <x-input wire:model="kode_pos" label='Kode Pos (*optional)' />
        </div>
    </x-card>

    {{-- Data Orang Tua --}}
    <x-card class="flex flex-col space-y-4 mb-3 ">
        <h2 class="mt-2 text-xl font-bold text-slate-600">C. Data Orang Tua / Wali</h2>
        <div class="flex flex-col space-y-4 mb-3 lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0">
            <x-input wire:model="nama_ayah" label='Nama Ayah' />
            <x-input wire:model='pekerjaan_ayah' label='Pekerjaan Ayah' />
            <x-input wire:model='nama_ibu' label='Nama Ibu' />
            <x-input wire:model='pekerjaan_ibu' label='Pekerjaan Ibu' />
        </div>
        <div class="flex flex-col space-y-4 mb-3 lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0">
            <x-input wire:model='telepon' label='Nomor Telepon Orang Tua' placeholder="6281xxxxxx" />
            <x-currency label="Penghasilan" prefix="Rp." placeholder=" 10.000.000" thousands="." decimal=","
                wire:model="penghasilan" />
            <x-native-select wire:model="kip" label="KIP" corner="*jika punya">
                <option value="">Pilih</option>
                <option value="1">Ada</option>
                <option value="0">Tidak Ada</option>
            </x-native-select>
        </div>
        <h2 class="mt-2 text-xl font-bold text-slate-600">Data Wali (jika ikut orang tua kosongi saja)</h2>
        <div class="flex flex-col space-y-4 mb-3 lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0">
            <x-input wire:model='nama_wali' label='Nama Wali' />
            <x-input wire:model='pekerjaan_wali' label='Pekerjaan Wali' />
            <x-input wire:model='telepon_wali' label='Telepon Wali' placeholder="6281xxxxxx" />
        </div>
        <div>
            <x-textarea wire:model='alamat_wali' label='Alamat Wali' />
        </div>
    </x-card>
    {{-- Data Sekolah SD --}}
    <x-card class="flex flex-col space-y-4 mb-3 ">
        <h2 class="mt-2 text-xl font-bold text-slate-600">D. Data Sekolah Dasar</h2>
        <div class="lg:grid lg:grid-cols-2 lg:gap-2">
            <x-input wire:model="nama_sekolah_dasar" label="Nama Sekolah Dasar" />
            <x-input wire:model="nisn" label="NISN" />
        </div>
        <div class="flex flex-col space-y-4 mb-3 lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0">
            <x-input wire:model="provinsi_sekolah_dasar" label="Provinsi SD" />
            <x-input wire:model="kabupaten_sekolah_dasar" label="kabupaten SD" />
            <x-input wire:model="kecamatan_sekolah_dasar" label="kecamatan SD" />
            <x-input wire:model="desa_sekolah_dasar" label="desa SD" />
        </div>
    </x-card>

    {{-- Data Sekolah Asal --}}
    <x-card
        class="{{ $kategori == 'A' || $kategori == 'B' || $kategori == '' ? 'hidden' : 'flex space-y-4 mb-3 flex-col' }}">
        <h2 class="mt-2 text-xl font-bold text-slate-600">Data Sekolah Asal Pindahan</h2>
        <div class="flex flex-col space-y-4 mb-3 llg:grid lg:grid-cols-2 lg:gap-2 lg:space-y-0">
            <x-input wire:model="nama_sekolah_pindahan" label="Nama Sekolah Asal" />
        </div>
        <div class="flex flex-col space-y-4 mb-3 lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0">
            <x-input wire:model="provinsi_sekolah_pindahan" label="Provinsi Sekolah Pindahan" />
            <x-input wire:model="kabupaten_sekolah_pindahan" label="kabupaten Sekolah Pindahan" />
            <x-input wire:model="kecamatan_sekolah_pindahan" label="kecamatan Sekolah Pindahan" />
            <x-input wire:model="desa_sekolah_pindahan" label="desa Sekolah Pindahan" />
        </div>
    </x-card>

    <div class="flex justify-end space-x-3">
        <x-button wire:click.prevent="simpan" teal label="Simpan" spinner="simpan" />
    </div>
</div>
