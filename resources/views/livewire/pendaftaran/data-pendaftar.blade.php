<x-card>
    <div class="flex flex-col mb-10 space-y-7">
        <h2 class="text-2xl font-bold text-slate-600">Data Pendaftar</h2>
        <div class="my-3  space-y-3 mb-3">
            <form wire:submit='cari'>
                <x-input wire:model="search" icon="magnifying-glass" placeholder="Cari ..." class="text-slate-600" />
                <x-button type="submit" primary label="Cari" icon="magnifying-glass" class="hidden" />
            </form>
        </div>
        <div class="my-3  space-y-3 lg:grid lg:grid-cols-3 lg:space-y-0 mb-3 gap-3">
            <x-native-select wire:model.live.debounce.100ms='isOnline' label="Metode Daftar">
                <option value="">Pilih</option>
                <option value="0">Offline</option>
                <option value="1">Online</option>
            </x-native-select>
            <x-native-select wire:model.live.debounce.100ms='gelombang' label="Gelombang">
                <option value="">Pilih</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </x-native-select>
            <x-native-select wire:model.live.debounce.100ms='jenis_kelamin' label="Jenis Kelamin">
                <option value="">Pilih</option>
                <option value="L">Putra</option>
                <option value="P">Putri</option>
            </x-native-select>
        </div>
        <div class="py-3">
            <x-button label="Download" wire:click.prevent='download_data' icon="arrow-down-tray"
                wire:loading.attr='disabled' spinner="download_data" />
        </div>
        <x-siakad.skeleton />
        <div class="overflow-x-auto">
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
                            NIS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Gelombang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sekolah SD
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keterangan
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            panitia
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->listPendaftar as $key => $user)
                        <tr :key="$key"
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-300">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $this->listPendaftar->firstItem() + $key }}
                            </td>
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }} <br>
                                <span class="text-xs text-slate-500">

                                    Tanggal Daftar :
                                    {{ \Carbon\Carbon::parse($user->tanggal_daftar)->translatedFormat('l, d F Y') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->kode_daftar }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->nis }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $user->gelombang ?? '' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user->nama_sekolah_dasar }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                Provinsi : {{ $user->provinsi ?? '' }} <br>
                                Kabupaten : {{ $user->kabupaten ?? '' }} <br>
                                Kecamatan : {{ $user->kecamatan ?? '' }} <br>
                                Desa : {{ $user->desa ?? '' }} <br>
                                Telepon : {{ $user->telepon ?? '' }}
                            </td>
                            <td class="px-6 py-4 text-center align-middle">
                                <div class="flex justify-center items-center">
                                    @switch($user->is_online)
                                        @case(0)
                                            <div class="flex flex-col gap-2 items-center">
                                                <span
                                                    class="px-3 py-1 text-sm font-semibold text-yellow-800 bg-yellow-200 rounded-full dark:bg-yellow-700 dark:text-yellow-300 text-nowrap">
                                                    Offline
                                                </span>
                                                <span
                                                    class="px-3 py-1 text-sm font-semibold text-yellow-800 bg-yellow-200 rounded-full dark:bg-yellow-700 dark:text-yellow-300 text-nowrap">
                                                    {{ $user->guru }}
                                                </span>
                                            </div>
                                        @break

                                        @case(1)
                                            <span
                                                class="px-3 py-1 text-sm font-semibold text-green-800 bg-green-200 rounded-full dark:bg-green-700 dark:text-green-300 text-nowrap">
                                                Online
                                            </span>
                                        @break
                                    @endswitch
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center align-middle">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <x-button href="{{ route('pendaftaran.edit-pendaftar', $user->kode_daftar) }}"
                                        wire:navigate teal icon="pencil-square" label="Edit" />
                                    <x-button href="{{ route('print.formulir-pendaftaran', $user->kode_daftar) }}"
                                        target="__blank" cyan icon="printer" label="Formulir" />
                                    <x-button icon="trash" red wire:click.prevent='confirm({{ $user->id }})' />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="py-2 mt-5 overflow-x-auto">
            {{ $this->listPendaftar->onEachSide(1)->links() }}
        </div>
    </div>
</x-card>
