<x-card>

    <div class="space-y-6">
        <div class="py-3">
            <x-button label="Download" wire:click.prevent='download_data' icon="arrow-down-tray"
                wire:loading.attr='disabled' spinner="download_data" />
        </div>
        <div class="text-center">
            <h2 class="text-lg font-bold uppercase text-slate-700">
                Rekapitulasi Hasil Ukur Seragam
            </h2>

            <div class="mt-4 flex justify-center gap-8 text-sm font-semibold text-slate-600">
                <span>Total Putra : {{ $this->rekap['putra']['total'] }}</span>
                <span>Total Putri : {{ $this->rekap['putri']['total'] }}</span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-slate-200 text-sm">
                <thead class="bg-slate-100">
                    <tr>
                        <th class="border px-4 py-3 text-left">
                            Kategori
                        </th>
                        <th class="border px-4 py-3 text-left">
                            Putra
                        </th>
                        <th class="border px-4 py-3 text-left">
                            Putri
                        </th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td class="border px-4 py-3 font-semibold">
                            Atasan OSIS & Pramuka
                        </td>

                        <td class="border px-4 py-3">
                            @foreach ($this->rekap['putra']['atasan'] as $ukuran => $jumlah)
                                {{ strtoupper($ukuran) }} : {{ $jumlah }}<br>
                            @endforeach
                        </td>

                        <td class="border px-4 py-3">
                            @foreach ($this->rekap['putri']['atasan'] as $ukuran => $jumlah)
                                {{ strtoupper($ukuran) }} : {{ $jumlah }}<br>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <td class="border px-4 py-3 font-semibold">
                            Bawahan OSIS & Pramuka
                        </td>

                        <td class="border px-4 py-3">
                            @foreach ($this->rekap['putra']['bawahan'] as $ukuran => $jumlah)
                                {{ strtoupper($ukuran) }} : {{ $jumlah }}<br>
                            @endforeach
                        </td>

                        <td class="border px-4 py-3">
                            @foreach ($this->rekap['putri']['bawahan'] as $ukuran => $jumlah)
                                {{ strtoupper($ukuran) }} : {{ $jumlah }}<br>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <td class="border px-4 py-3 font-semibold">
                            Setelan Olahraga
                        </td>

                        <td class="border px-4 py-3">
                            @foreach ($this->rekap['putra']['olahraga'] as $ukuran => $jumlah)
                                {{ strtoupper($ukuran) }} : {{ $jumlah }}<br>
                            @endforeach
                        </td>

                        <td class="border px-4 py-3">
                            @foreach ($this->rekap['putri']['olahraga'] as $ukuran => $jumlah)
                                {{ strtoupper($ukuran) }} : {{ $jumlah }}<br>
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <td class="border px-4 py-3 font-semibold">
                            Peci
                        </td>

                        <td class="border px-4 py-3">
                            @foreach ($this->rekap['putra']['peci'] as $ukuran => $jumlah)
                                {{ strtoupper($ukuran) }} : {{ $jumlah }}<br>
                            @endforeach
                        </td>

                        <td class="border px-4 py-3 text-slate-400">
                            -
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div class="flex items-center justify-between gap-4">
            <x-input wire:model.live.debounce.500ms="search" placeholder="Cari siswa..." class="max-w-md" />
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-slate-200 text-sm">
                <thead class="bg-slate-100">
                    <tr>
                        <th class="border px-3 py-2">No</th>
                        <th class="border px-3 py-2">Nama</th>
                        <th class="border px-3 py-2">JK</th>
                        <th class="border px-3 py-2">Atasan</th>
                        <th class="border px-3 py-2">Bawahan</th>
                        <th class="border px-3 py-2">Olahraga</th>
                        <th class="border px-3 py-2">Peci</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($this->listSiswa as $siswa)
                        <tr>
                            <td class="border px-3 py-2">
                                {{ $this->listSiswa->firstItem() + $loop->index }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $siswa->name }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $siswa->biodata?->jenis_kelamin }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $siswa->seragam?->atasan }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $siswa->seragam?->bawahan }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $siswa->seragam?->olah_raga }}
                            </td>

                            <td class="border px-3 py-2">
                                {{ $siswa->seragam?->peci }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border px-3 py-8 text-center">
                                Data tidak ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $this->listSiswa->links() }}

    </div>

</x-card>
