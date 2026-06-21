<div>
    <x-card class="flex space-y-4 flex-col ">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Seleksi Wawancara</h2>
        <div class="lg:grid lg:grid-cols-3 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-select label="Kode Pendaftaran" wire:model.live="kode_daftar" placeholder="Pilih Kode Daftar"
                :async-data="route('get-pendaftar')" option-label="kode_daftar" option-value="kode_daftar" option-description="name" />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model="nama" label="Nama Calon Siswa" disabled />
            <x-input wire:model="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
            <x-input wire:model="sekolahAsal" label="Sekolah Asal" class="font-bold " corner="(Pindahan)" disabled />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model="tinggi" label="Tinggi badan" />
            <x-input wire:model='berat' label='Berat badan' />
            <x-input wire:model='model_rambut' label='Model Rambut' />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model='mata_minus' label='Mata minus' />
            <x-native-select wire:model='ngompol' label="Masih ngompol">
                <option value="">Pilih</option>
                <option value="0">Tidak ngompol</option>
                <option value="1">Ngompol</option>
            </x-native-select>
            <x-native-select wire:model='merokok' label="Merokok">
                <option value="">Pilih</option>
                <option value="0">Tidak merokok</option>
                <option value="1">Merokok</option>
            </x-native-select>
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model='penyakit_lain' label='Punya penyakit' corner="(penyakit dalam, sehat)" />
            <x-native-select wire:model='ekstrakurikuler_id' label='Pilihan Ekstrakurikuler'>
                <option value="">Pilih Ekstrakurikuler</option>
                @foreach ($listEkstrakurikuler as $ekstra)
                    <option value="{{ $ekstra->id }}">{{ $ekstra->nama }}</option>
                @endforeach
            </x-native-select>
        </div>
        <div class="flex justify-end">
            <x-button wire:click.prevent="simpan" positive label="simpan" spinner="simpan" loading-delay="short"
                class="w-auto" />
        </div>
    </x-card>
</div>
