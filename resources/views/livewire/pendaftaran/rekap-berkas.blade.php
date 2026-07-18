<x-card>
    <h2 class="my-3 text-xl font-bold text-slate-600">Rekap Berkas</h2>
    <section class="px-7 bg-white border-b">
        <div class="my-3">
            <x-input wire:model.live.debounce.500ms="search" icon="magnifying-glass" placeholder="Cari ..."
                class="w-auto text-slate-600" />
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
                            Keterangan
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
                                FC Akta : {{ str($user->berkas?->akta)->title() }} <br>
                                FC KK : {{ str($user->berkas?->kk)->title() }} <br>
                                FC KTP : {{ str($user->berkas?->ktp)->title() }} <br>
                                FC Ijazah : {{ str($user->berkas?->ijazah)->title() }} <br>
                                FC KIP/PIP : {{ str($user->berkas?->kip)->title() }} <br>
                                FC Piagam : {{ str($user->berkas?->piagam)->title() }} <br>
                                Pas Foto : {{ str($user->berkas?->foto)->title() }} <br>
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
