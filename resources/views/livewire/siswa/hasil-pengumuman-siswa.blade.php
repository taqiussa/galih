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
                @elseif($siswa->diterima)
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

                        <div class="mt-8 bg-success/10 border border-success/20 rounded-xl p-5">

                            <p class="font-semibold">
                                Silakan melakukan daftar ulang sesuai jadwal
                                yang telah ditentukan oleh panitia.
                            </p>

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

                        <p class="mt-4 text-lg">
                            Anda belum dinyatakan lulus pada seleksi
                            Penerimaan Peserta Didik Baru.
                        </p>

                        <div class="mt-8 bg-error/10 border border-error/20 rounded-xl p-5">

                            <p>
                                Terima kasih telah mengikuti proses seleksi.
                                Tetap semangat dan semoga memperoleh hasil
                                terbaik pada kesempatan berikutnya.
                            </p>

                        </div>

                    </div>
                @endif

            </div>

        </div>

    </div>

</x-card>
