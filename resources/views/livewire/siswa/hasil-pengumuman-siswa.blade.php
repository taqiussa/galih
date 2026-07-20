<x-card>

    <div class="max-w-3xl mx-auto">

        <div class="bg-base-100 rounded-2xl shadow-xl border overflow-hidden">

            <div class="bg-primary text-primary-content p-8 text-center">
                <h1 class="text-3xl font-bold">
                    Hasil Seleksi PSB
                </h1>

                <p class="opacity-90 mt-2">
                    Penerimaan Santri Baru
                </p>
            </div>

            <div class="p-8">

                <div class="grid md:grid-cols-2 gap-4 mb-8">

                    <div class="rounded-xl border p-4">
                        <div class="text-sm text-gray-500">
                            Nama Peserta
                        </div>

                        <div class="font-bold text-lg">
                            {{ $siswa->name }}
                        </div>
                    </div>

                    <div class="rounded-xl border p-4">
                        <div class="text-sm text-gray-500">
                            Kode Pendaftaran
                        </div>

                        <div class="font-bold text-lg">
                            {{ $siswa->kode_daftar }}
                        </div>
                    </div>

                </div>

                @if (is_null($siswa->diterima))
                    <div class="text-center py-8">

                        <div class="w-24 h-24 rounded-full bg-info/10 flex items-center justify-center mx-auto mb-5">

                            <x-icon name="clock" class="w-14 h-14 text-info" />

                        </div>

                        <x-badge info xl label="BELUM DIUMUMKAN" />

                        <h2 class="text-2xl font-bold mt-5">
                            Pengumuman Belum Tersedia
                        </h2>

                        <p class="text-gray-500 mt-3 max-w-xl mx-auto">
                            Hasil seleksi masih dalam proses.
                            Silakan menunggu hingga panitia mengumumkan hasil
                            seleksi secara resmi.
                        </p>

                    </div>
                @elseif($siswa->diterima == 'diterima')
                    <div class="text-center py-8">

                        <div class="w-28 h-28 rounded-full bg-success/10 flex items-center justify-center mx-auto mb-6">

                            <x-icon name="check-circle" class="w-16 h-16 text-success" />

                        </div>

                        <x-badge positive xl label="DITERIMA" />

                        <h2 class="text-4xl font-extrabold text-success mt-5">
                            Selamat!
                        </h2>

                        <p class="mt-4 text-lg">
                            Anda dinyatakan
                            <span class="font-bold text-success">
                                LULUS
                            </span>
                            seleksi Penerimaan Peserta Didik Baru.
                        </p>

                        @php
                            $hafalan = $this->hasil?->seleksiAgama?->firstWhere('jenis', 'hafalan');
                            $bacaan = $this->hasil?->seleksiAgama?->firstWhere('jenis', 'alquran');
                        @endphp

                        <details class="mt-8 group rounded-2xl border border-base-300 bg-base-100 shadow-sm">

                            <summary
                                class="flex items-center justify-between cursor-pointer px-6 py-5 font-semibold text-lg list-none">

                                <div class="flex items-center gap-3">
                                    <x-icon name="clipboard-document-list" class="w-6 h-6 text-primary" />
                                    <span>Lihat Hasil Seleksi</span>
                                </div>

                                <div class="transition-transform duration-300 group-open:rotate-180">
                                    <x-icon name="chevron-down" class="w-5 h-5" />
                                </div>

                            </summary>

                            <div class="border-t border-base-200 p-6">

                                <div class="grid gap-5 md:grid-cols-3">

                                    <div class="card bg-primary text-primary-content shadow">

                                        <div class="card-body items-center text-center">

                                            <div class="text-sm opacity-80">
                                                Akademik
                                            </div>

                                            <div class="text-5xl font-extrabold">
                                                {{ $this->hasil?->akademik?->nilai ?? '-' }}
                                            </div>

                                        </div>

                                    </div>

                                    <div class="card bg-success text-success-content shadow">

                                        <div class="card-body items-center text-center">

                                            <div class="text-sm opacity-80">
                                                Hafalan
                                            </div>

                                            <div class="text-5xl font-extrabold">
                                                {{ $hafalan?->nilai ?? '-' }}
                                            </div>

                                        </div>

                                    </div>

                                    <div class="card bg-secondary text-secondary-content shadow">

                                        <div class="card-body items-center text-center">

                                            <div class="text-sm opacity-80">
                                                Bacaan Al-Qur'an
                                            </div>

                                            <div class="text-5xl font-extrabold">
                                                {{ $bacaan?->nilai ?? '-' }}
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </details>

                        <div class="mt-8 bg-success/10 border border-success/20 rounded-xl p-5">

                            <p class="font-semibold">
                                Silakan melakukan daftar ulang sesuai jadwal
                                yang telah ditentukan oleh panitia.
                            </p>

                            <x-button href="{!! route('siswa.print-pengumuman.print', ['kode_daftar' => auth()->user()->kode_daftar]) !!}" target="blank__" label="print hasil" icon="printer"
                                positive />


                        </div>

                    </div>
                @else
                    <div class="text-center py-8">

                        <div class="w-28 h-28 rounded-full bg-error/10 flex items-center justify-center mx-auto mb-6">

                            <x-icon name="x-circle" class="w-16 h-16 text-error" />

                        </div>

                        <x-badge negative xl label="TIDAK DITERIMA" />

                        <h2 class="text-4xl font-extrabold text-error mt-5">
                            Mohon Maaf
                        </h2>

                        <p class="mt-4 text-lg gap-2">
                            Anda belum dinyatakan lulus pada seleksi
                            Penerimaan Peserta Didik Baru.
                        </p>


                        @php
                            $hafalan = $this->hasil?->seleksiAgama?->firstWhere('jenis', 'hafalan');
                            $bacaan = $this->hasil?->seleksiAgama?->firstWhere('jenis', 'alquran');
                        @endphp

                        <details class="mt-8 group rounded-2xl border border-base-300 bg-base-100 shadow-sm">

                            <summary
                                class="flex items-center justify-between cursor-pointer px-6 py-5 font-semibold text-lg list-none">

                                <div class="flex items-center gap-3">
                                    <x-icon name="clipboard-document-list" class="w-6 h-6 text-primary" />
                                    <span>Lihat Hasil Seleksi</span>
                                </div>

                                <div class="transition-transform duration-300 group-open:rotate-180">
                                    <x-icon name="chevron-down" class="w-5 h-5" />
                                </div>

                            </summary>

                            <div class="border-t border-base-200 p-6">

                                <div class="grid gap-5 md:grid-cols-3">

                                    <div class="card bg-primary text-primary-content shadow">

                                        <div class="card-body p-5 text-center">

                                            <h3 class="font-semibold text-lg">
                                                Akademik
                                            </h3>

                                            <div class="text-6xl font-extrabold leading-none mt-2">
                                                {{ $this->hasil?->akademik?->nilai ?? '-' }}
                                            </div>

                                            <div class="text-sm opacity-80">
                                                Nilai Akhir
                                            </div>

                                            <div class="divider my-3"></div>

                                            <div class="grid grid-cols-2 gap-3 text-sm">

                                                <div class="rounded-lg bg-white/10 p-2">
                                                    <div class="opacity-80">Benar</div>
                                                    <div class="font-bold text-lg">
                                                        {{ $this->hasil?->akademik?->benar ?? 0 }}
                                                    </div>
                                                </div>

                                                <div class="rounded-lg bg-white/10 p-2">
                                                    <div class="opacity-80">Salah</div>
                                                    <div class="font-bold text-lg">
                                                        {{ $this->hasil?->akademik?->salah ?? 0 }}
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="card bg-success text-success-content shadow">

                                        <div class="card-body items-center text-center">

                                            <div class="text-sm opacity-80">
                                                Hafalan
                                            </div>

                                            <div class="text-5xl font-extrabold">
                                                {{ $hafalan?->nilai ?? '-' }}
                                            </div>

                                        </div>

                                    </div>

                                    <div class="card bg-secondary text-secondary-content shadow">

                                        <div class="card-body items-center text-center">

                                            <div class="text-sm opacity-80">
                                                Bacaan Al-Qur'an
                                            </div>

                                            <div class="text-5xl font-extrabold">
                                                {{ $bacaan?->nilai ?? '-' }}
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </details>

                        <div class="mt-8 bg-error/10 border border-error/20 rounded-xl p-5">

                            <p>
                                Terima kasih telah mengikuti proses seleksi.
                                Tetap semangat dan semoga memperoleh hasil
                                terbaik pada kesempatan berikutnya.
                            </p>

                            <x-button href="{!! route('siswa.print-pengumuman.print', ['kode_daftar' => auth()->user()->kode_daftar]) !!}" target="blank__" label="print hasil" icon="printer"
                                positive />

                        </div>

                    </div>
                @endif

            </div>

        </div>
    </div>

</x-card>
