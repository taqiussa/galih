<x-card>
    <h2 class="my-3 text-xl font-bold text-slate-600">Hasil Pengumuman</h2>
    <section class="px-7 bg-white border-b">
        <div class="my-3 md:grid md:grid-cols-4 md:gap-5 space-y-3 md:space-y-0">
            <div class="col-span-3">
                <x-input wire:model.live.debounce.500ms="search" icon="magnifying-glass" placeholder="Cari ..."
                    class="w-auto text-slate-600" />
            </div>
            <x-native-select wire:model.live='terima'>
                <option value="">Pilih</option>
                <option value="0">Tidak Diterima</option>
                <option value="1">Diterima</option>
            </x-native-select>
        </div>
        <div class="py-3">
            <x-button label="Download" wire:click.prevent='download_data' icon="arrow-down-tray"
                wire:loading.attr='disabled' spinner="download_data" />
        </div>
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            #
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Nama
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Kode Daftar
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Sekolah Dasar
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Seleksi Akademik
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Seleksi Agama
                        </th>
                        {{-- <th scope="col" class="py-3 px-6">
                            Seleksi Wawancara
                        </th> --}}
                        <th scope="col" class="py-3 px-6">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->listSiswa as $key => $user)
                        <tr :key="$key"
                            class="odd:bg-white even:bg-slate-200 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                            <td scope="row"
                                class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $this->listSiswa->firstItem() + $key }}
                            </td>
                            <td scope="row"
                                class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </td>
                            <td class="py-2 px-6">
                                {{ $user->kode_daftar }}
                            </td>
                            <td class="py-2 px-6">
                                {{ $user->biodata?->nama_sekolah_dasar }}
                            </td>
                            <td class="py-2 px-6 whitespace-nowrap">
                                {{ $user->akademik?->nilai }}
                            </td>
                            <td class="py-2 px-6">
                                Bacaan : {{ $user->seleksiAgama->where('jenis', 'alquran')->first()?->nilai }}
                                Hafalan : {{ $user->seleksiAgama->where('jenis', 'hafalan')->first()?->nilai }}
                            </td>
                            {{-- <td class="py-2 px-6">
                                Tinggi : {{ $user->seleksiWawancara?->tinggi }} <br>
                                Berat : {{ $user->seleksiWawancara?->berat }} <br>
                                Rambut : {{ $user->seleksiWawancara?->model_rambut }} <br>
                                Minus : {{ $user->seleksiWawancara?->mata_minus }} <br>
                                Penyakit : {{ $user->seleksiWawancara?->penyakit_lain }}
                            </td> --}}
                            <td class="flex text-center py-2 px-6">
                                <x-button href="{!! route('pengumuman.print-pengumuman.print', ['kode_daftar' => $user->kode_daftar]) !!}" target="blank__" label="print" icon="printer"
                                    positive />

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
