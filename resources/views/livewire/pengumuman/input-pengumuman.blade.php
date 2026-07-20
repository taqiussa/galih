<div>
    <x-card class="flex space-y-4 flex-col h-screen">
        <form wire:submit='simpan'>

            <h2 class="mt-3 text-xl font-bold text-slate-600">Input Pengumuman</h2>
            <div class="lg:grid lg:grid-cols-3 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
                <x-select label="Kode Pendaftaran" wire:model.live="kode_daftar" placeholder="Pilih Kode Daftar"
                    :async-data="route('get-pendaftar')" option-label="kode_daftar" option-value="kode_daftar" option-description="name" />
            </div>
            <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
                <x-native-select wire:model='terima' label='Pilih Pengumuman'>
                    <option value="">Pilih Hasil</option>
                    <option value="diterima">Diterima</option>
                    <option value="tidak diterima">Tidak Diterima</option>
                </x-native-select>
            </div>
            <div class="py-5">
                <x-button type="submit" positive label="simpan" spinner="simpan" loading-delay="short"
                    class="w-auto" />
            </div>
        </form>
    </x-card>
</div>
