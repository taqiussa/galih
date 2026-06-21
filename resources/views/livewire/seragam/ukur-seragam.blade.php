<x-card class="flex flex-col space-y-4 ">
    <h2 class="mt-3 text-xl font-bold text-slate-600">Ukur Seragam</h2>
    <div class="flex flex-col space-y-4 lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 mb-3">
        <x-select label="Kode Pendaftaran" wire:model.live="kode_daftar" placeholder="Pilih Kode Daftar" :async-data="route('get-pendaftar')"
            option-label="kode_daftar" option-value="kode_daftar" option-description="name" />
        <x-input wire:model="nama" label="Nama Calon Siswa" disabled />
        <x-input wire:model="sekolahDasar" label="Sekolah Dasar" class="font-bold " disabled />
        <x-input wire:model="sekolahAsal" label="Sekolah Asal" class="font-bold " corner="(Pindahan)" disabled />
    </div>
    <div class="flex flex-col space-y-4 lg:grid lg:grid-cols-4 lg:gap-2 lg:space-y-0 mb-3">
        <x-native-select wire:model='atasan' label="Baju" corner="OSIS/PRAMUKA">
            <option value="">Pilih Ukuran</option>
            @foreach (arrayUkuran() as $item)
                <option value="{{ $item->value }}">{{ Str::upper($item->value) }}</option>
            @endforeach
        </x-native-select>
        <x-native-select wire:model='bawahan' label="Celana/Rok" corner="OSIS/PRAMUKA">
            <option value="">Pilih Ukuran</option>
            @for ($i = 24; $i < 43; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </x-native-select>
        <x-native-select wire:model='olah_raga' label="Setelan Olah Raga">
            <option value="">Pilih Ukuran</option>
            @foreach (arrayUkuran() as $item)
                <option value="{{ $item->value }}">{{ Str::upper($item->value) }}</option>
            @endforeach
        </x-native-select>
        <x-native-select wire:model='peci' label="Peci">
            <option value="">Pilih Ukuran</option>
            @for ($i = 2; $i < 11; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </x-native-select>
    </div>
    <div class="flex justify-end">
        <x-button wire:click.prevent="simpan" positive label="simpan" spinner="simpan" loading-delay="short"
            class="w-auto" />
    </div>
</x-card>
