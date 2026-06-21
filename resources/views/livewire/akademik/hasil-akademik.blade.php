<x-card>
    <section class="bg-white border-b px-7">
        <div class="my-3">
            <x-input wire:model.live.debounce.500ms="search" icon="magnifying-glass" placeholder="Cari ..."
                class="w-auto text-slate-600" />
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kode Daftar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Hasil Tes Akademik
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nilai Akademik
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->listSiswa as $key => $user)
                        <tr
                            class="border-b odd:bg-white even:bg-slate-200 dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                            <td scope="row"
                                class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $this->listSiswa->firstItem() + $key }}
                            </td>
                            <td scope="row"
                                class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-2">
                                {{ $user->kode_daftar }}
                            </td>
                            <td class="px-6 py-2">
                                Benar :
                                {{ $user->akademik?->benar }}
                                <br>
                                Salah :
                                {{ $user->akademik?->salah }}
                            </td>
                            <td class="px-6 py-2">
                                {{ $user->akademik?->nilai }}
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
