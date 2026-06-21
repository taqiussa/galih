<div>
    <x-card class="flex space-y-4 flex-col h-screen">
        <h2 class="mt-3 text-xl font-bold text-slate-600">Print Pengumuman</h2>
        <div class="lg:grid lg:grid-cols-3 lg:gap-2 lg:space-y-0 flex flex-col space-y-4 mb-3">
            <x-select label="Kode Pendaftaran" wire:model.live="kode_daftar" placeholder="Pilih Kode Daftar"
                :async-data="route('get-pendaftar')" option-label="kode_daftar" option-value="kode_daftar" option-description="name" />
        </div>
        <div class="lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 flex flex-col space-y-4">
            <x-input wire:model="nama" label="Nama Calon Siswa" disabled />
            <x-input wire:model="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
            <x-input wire:model="sekolahAsal" label="Sekolah Pindahan" class="font-bold " corner="(Pindahan)"
                disabled />
        </div>
        <div class="py-3">
            <x-button href="{!! route('print.print-pengumuman.print', ['kode_daftar' => $kode_daftar]) !!}" target="blank__" label="print" icon="printer" positive />
        </div>
    </x-card>
</div>
