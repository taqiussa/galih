<div>
    <x-card>
        <section class="py-8 px-7 bg-white border-b">
            <div class="my-3">
                <x-input wire:model.live.debounce.500ms="search" icon="magnifying-glass" placeholder="Cari ..."
                    class="w-auto text-slate-600" />
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
                                Nama Sekolah
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Sekolah Asal (pindahan)
                            </th>
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
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </td>
                                <td scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $user->name }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $user->kode_daftar }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $user->sekolahSd->nama ?? '' }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $user->sekolahAsal->nama ?? '' }}
                                </td>
                                <td class="py-4 px-6">
                                    <x-button wire:click.prevent="confirm({{ $user->id }})" positive
                                        label="Izinkan" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </x-card>
</div>
