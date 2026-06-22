<div>
    <x-card class="flex space-y-4 flex-col h-screen">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Input Berkas</h2>
        <div class="lg:grid lg:grid-cols-3 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-select label="Kode Pendaftaran" wire:model.live="kode_daftar" placeholder="Pilih Kode Daftar"
                :async-data="route('get-pendaftar')" option-label="kode_daftar" option-value="kode_daftar" option-description="name" />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model.defer="nama" label="Nama Calon Siswa" disabled />
            <x-input wire:model.defer="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
            <x-input wire:model.defer="sekolahAsal" label="Sekolah Asal" class="font-bold " corner-hint="(Pindahan)"
                disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model='akta' label='FC Akta'>
                <option value="">Pilih</option>
                <option value="ada">Ada</option>
                <option value="belum ada">Belum ada</option>
            </x-native-select>
            <x-native-select wire:model='kk' label='FC KK'>
                <option value="">Pilih</option>
                <option value="ada">Ada</option>
                <option value="belum ada">Belum ada</option>
            </x-native-select>
            <x-native-select wire:model='ktp' label='FC KTP'>
                <option value="">Pilih</option>
                <option value="ada">Ada</option>
                <option value="belum ada">Belum ada</option>
            </x-native-select>
            <x-native-select wire:model='ijazah' label='FC Ijazah'>
                <option value="">Pilih</option>
                <option value="ada">Ada</option>
                <option value="belum ada">Belum ada</option>
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-native-select wire:model='kip' label='KIP/PIP (Jika Ada)'>
                <option value="">Pilih</option>
                <option value="ada">Ada</option>
                <option value="belum ada">Belum ada</option>
            </x-native-select>
            <x-native-select wire:model='piagam' label='Piagam/Sertifikat (Jika Ada)'>
                <option value="">Pilih</option>
                <option value="ada">Ada</option>
                <option value="belum ada">Belum ada</option>
            </x-native-select>
            <x-native-select wire:model='foto' label='Pas Foto'>
                <option value="">Pilih</option>
                <option value="ada">Ada</option>
                <option value="belum ada">Belum ada</option>
            </x-native-select>
        </div>
        <div class="py-5">
            <x-button wire:click.prevent="simpan" positive label="simpan" spinner="simpan" loading-delay="short"
                class="w-auto" />
        </div>
    </x-card>
</div>
