<div>
    <x-card class="flex space-y-4 flex-col h-screen">
        <form wire:submit='simpan'>

            <h2 class="mt-3 text-xl font-bold text-slate-600">Seleksi Agama</h2>
            <div class="lg:grid lg:grid-cols-3 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
                <x-select label="Kode Pendaftaran" wire:model.live="kode_daftar" placeholder="Pilih Kode Daftar"
                    :async-data="route('get-pendaftar')" option-label="kode_daftar" option-value="kode_daftar" option-description="name" />
            </div>
            <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
                <x-input wire:model="nama" label="Nama Calon Siswa" disabled />
                <x-input wire:model="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
                <x-input wire:model="sekolahAsal" label="Sekolah Pindahan" class="font-bold " corner="(Pindahan)"
                    disabled />
            </div>
            <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
                <x-native-select wire:model='pilihan' label='Pilih Tes Agama'>
                    <option value="">Pilih</option>
                    <option value="alquran">Al Qur'an</option>
                    <option value="hafalan">Hafalan</option>
                </x-native-select>
                <x-input type='number' wire:model="nilai" label="Masukkan Nilai" corner="(max 100)" />
            </div>
            <div class="py-5">
                <x-button type="submit" positive label="simpan" spinner="simpan" loading-delay="short"
                    class="w-auto" />
            </div>
        </form>
        <h2 class="mt-3 text-xl font-bold text-slate-600">Hasil Seleksi Agama</h2>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input type='number' disabled wire:model="nilaiQuran" label="Nilai Al Qur'an" corner="(max 100)" />
            <x-input type='number' disabled wire:model="nilaiHafalan" label="Nilai Hafalan" corner="(max 100)" />
            <x-input type='number' disabled wire:model="ratarata" label="Rata - Rata Nilai" corner="(max 100)" />
        </div>
    </x-card>
</div>
