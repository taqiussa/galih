<div>
    <x-card class="flex flex-col space-y-4">

        <h2 class="mt-3 text-xl font-bold text-slate-600">
            Seleksi Wawancara
        </h2>

        {{-- Pencarian Siswa --}}
        <div class="lg:grid lg:grid-cols-3 lg:gap-2 flex flex-col space-y-4 lg:space-y-0">
            <x-select label="Kode Pendaftaran" wire:model.live="kode_daftar" placeholder="Pilih Kode Daftar"
                :async-data="route('get-pendaftar')" option-label="kode_daftar" option-value="kode_daftar" option-description="name" />
        </div>

        {{-- Biodata --}}
        <div class="lg:grid lg:grid-cols-3 lg:gap-2 flex flex-col space-y-4 lg:space-y-0">
            <x-input wire:model="nama" label="Nama Calon Siswa" disabled />
            <x-input wire:model="sekolahDasar" label="Sekolah Dasar" disabled />
            <x-input wire:model="sekolahAsal" label="Sekolah Asal" corner="(Pindahan)" disabled />
        </div>

        {{-- 1 --}}
        <x-textarea wire:model="alasan_memilih" label="1. Mengapa memilih melanjutkan di SMP MIFTAHUL HUDA?" />

        {{-- 2,3 --}}
        <div class="lg:grid lg:grid-cols-2 lg:gap-2 flex flex-col space-y-4 lg:space-y-0">

            <x-native-select wire:model="keinginan" label="2. Melanjutkan di SMP berbasis pesantren ini karena">
                <option value="">Pilih</option>
                <option value="Sendiri">Keinginan Sendiri</option>
                <option value="Orang Tua">Keinginan Orang Tua</option>
                <option value="Bersama">Keinginan Bersama</option>
                <option value="Ikut Teman">Ikut Teman</option>
            </x-native-select>

            <x-native-select wire:model="siap_tata_tertib" label="3. Siap mengikuti tata tertib">
                <option value="">Pilih</option>
                <option value="1">Siap</option>
                <option value="0">Belum Siap</option>
            </x-native-select>

        </div>

        {{-- 4,5 --}}
        <div class="lg:grid lg:grid-cols-2 lg:gap-2 flex flex-col space-y-4 lg:space-y-0">

            <x-native-select wire:model="ekstrakurikuler_id" label="4. Ekstrakurikuler yang diminati">

                <option value="">Pilih Ekstrakurikuler</option>

                @foreach ($listEkstrakurikuler as $ekstra)
                    <option value="{{ $ekstra->id }}">
                        {{ $ekstra->nama }}
                    </option>
                @endforeach

            </x-native-select>

            <x-input wire:model="mata_pelajaran_favorit" label="5. Mata pelajaran yang paling disukai" />

        </div>

        {{-- 6 --}}
        <x-textarea wire:model="perilaku_buruk" label="6. Perilaku buruk yang pernah dilakukan"
            placeholder="Contoh: Merokok, membully, berkelahi, dll." />

        {{-- 7 --}}
        <x-textarea wire:model="kendala_pergaulan" label="7. Kendala dalam pergaulan atau bersosial"
            placeholder="Contoh: Introvert, penakut, kurang percaya diri, dll." />

        {{-- 8 --}}
        <x-textarea wire:model="kendala_kehidupan" label="8. Kendala dalam menjalani kehidupan sehari-hari"
            placeholder="Contoh: Kurang disiplin, lambat belajar, dll." />

        {{-- 9 --}}
        <x-textarea wire:model="riwayat_penyakit" label="9. Riwayat penyakit atau gejala yang dialami"
            placeholder="Kosongkan jika tidak ada." />

        {{-- 10 --}}
        <x-textarea wire:model="harapan" label="10. Harapan setelah diterima di SMP MIFTAHUL HUDA" />

        {{-- Catatan --}}
        <x-textarea wire:model="catatan" label="Catatan Pewawancara" />

        <div class="flex justify-end mt-3">
            <x-button wire:click.prevent="simpan" positive label="Simpan" spinner="simpan" loading-delay="short" />
        </div>

    </x-card>
</div>
