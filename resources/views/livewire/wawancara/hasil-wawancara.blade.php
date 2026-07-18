<x-card>
    <h2 class="my-3 text-xl font-bold text-slate-600">
        Hasil Seleksi Wawancara
    </h2>

    <section class="px-7 bg-white border-b">

        <div class="my-3">
            <x-input wire:model.live.debounce.500ms="search" icon="magnifying-glass" placeholder="Cari..."
                class="w-auto text-slate-600" />
        </div>
        <div class="py-3">
            <x-button label="Download" wire:click.prevent='download_data' icon="arrow-down-tray"
                wire:loading.attr='disabled' spinner="download_data" />
        </div>
        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-500">

                <thead class="text-xs uppercase bg-gray-50 text-gray-700">
                    <tr>
                        <th class="py-3 px-4">#</th>
                        <th class="py-3 px-4">Nama</th>
                        <th class="py-3 px-4">Kode Daftar</th>
                        <th class="py-3 px-4">Motivasi</th>
                        <th class="py-3 px-4">Minat</th>
                        <th class="py-3 px-4">Kondisi</th>
                        <th class="py-3 px-4">Harapan</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($this->listSiswa as $key => $user)
                        @php
                            $w = $user->wawancara;
                        @endphp

                        <tr class="odd:bg-white even:bg-slate-100 border-b hover:bg-slate-200">

                            <td class="py-2 px-4">
                                {{ $this->listSiswa->firstItem() + $key }}
                            </td>

                            <td class="py-2 px-4 font-semibold">
                                {{ $user->name }}
                            </td>

                            <td class="py-2 px-4">
                                {{ $user->kode_daftar }}
                            </td>

                            <td class="py-2 px-4">
                                <div>
                                    <b>Alasan :</b><br>
                                    {{ Str::limit($w?->alasan_memilih, 80) }}
                                </div>

                                <div class="mt-2">
                                    <b>Keinginan :</b>
                                    {{ $w?->keinginan }}
                                </div>

                                <div>
                                    <b>Tata tertib :</b>
                                    {{ $w?->siap_tata_tertib ? 'Siap' : 'Belum Siap' }}
                                </div>
                            </td>

                            <td class="py-2 px-4">
                                <div>
                                    <b>Ekstrakurikuler :</b><br>
                                    {{ $w?->ekstrakurikuler?->nama }}
                                </div>

                                <div class="mt-2">
                                    <b>Mapel Favorit :</b><br>
                                    {{ $w?->mata_pelajaran_favorit }}
                                </div>
                            </td>

                            <td class="py-2 px-4">
                                <div>
                                    <b>Perilaku :</b><br>
                                    {{ Str::limit($w?->perilaku_buruk, 50) ?: '-' }}
                                </div>

                                <div class="mt-2">
                                    <b>Pergaulan :</b><br>
                                    {{ Str::limit($w?->kendala_pergaulan, 50) ?: '-' }}
                                </div>

                                <div class="mt-2">
                                    <b>Kehidupan :</b><br>
                                    {{ Str::limit($w?->kendala_kehidupan, 50) ?: '-' }}
                                </div>

                                <div class="mt-2">
                                    <b>Penyakit :</b><br>
                                    {{ Str::limit($w?->riwayat_penyakit, 50) ?: '-' }}
                                </div>
                            </td>

                            <td class="py-2 px-4">
                                {{ Str::limit($w?->harapan, 80) }}
                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

        <div class="mt-3">
            {{ $this->listSiswa->links() }}
        </div>

    </section>
</x-card>
