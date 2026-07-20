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
                            seleksi Penerimaan Peserta Didik Baru. <br>
                            <x-button href="{!! route('siswa.print-pengumuman.print', ['kode_daftar' => auth()->user()->kode_daftar]) !!}" target="blank__" label="print hasil" icon="printer"
                                positive />
                        </p>

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

                            <div class="border-b-2 border-slate-600 pb-2">
                                <div class="relative flex items-center justify-center">
                                    <img src="{{ asset('images/logo56.png') }}" alt="logo"
                                        class="absolute left-0 w-24 h-24">

                                    <div class="text-center">
                                        <div class="uppercase tracking-wide text-slate-600 font-bold">
                                            Yayasan Miftahul Huda
                                        </div>

                                        <div class="text-2xl uppercase tracking-[.2em] text-slate-600 font-bold">
                                            SMP Miftahul Huda
                                        </div>

                                        <div class="text-slate-600 text-xs mt-1">
                                            <div>Jl. Masjid No. 2 Peron - Limbangan, Kab. Kendal - Jawa Tengah</div>
                                            <div>HP. 087880001111, 082280001111, 085780001111 E-mail: smpmifda@gmail.com
                                            </div>
                                            <div>Website : www.smpmiftahulhudaperon.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mb-2 font-bold text-center uppercase text-slate-700 text-md">
                                pengumuman
                                <br>
                                no : psb/smp-mifda/{{ str_replace(' ', '', $this->hasil->biodata?->tahun) }}
                            </h1>
                            <h1 class="text-sm text-center uppercase text-slate-600">tentang</h1>
                            <h1 class="mb-10 text-sm font-bold text-center uppercase text-slate-700">
                                penerimaan santri baru
                                <br>
                                SMP MIFTAHUL HUDA
                                tahun {{ $this->hasil->biodata?->tahun }}
                            </h1>
                            <div class="px-10 text-sm text-slate-600">
                                Berdasarkan hasil tes seleksi penerimaan peserta didik baru tahun ajaran
                                {{ $this->hasil->biodata?->tahun }} SMP
                                Miftahul Huda, yang
                                meliputi :
                            </div>
                            @php
                                $alquran = $this->hasil->seleksiAgama->firstWhere('jenis', 'alquran');
                                $hafalan = $this->hasil->seleksiAgama->firstWhere('jenis', 'hafalan');
                                $wawancara = $this->hasil->wawancara;

                            @endphp

                            <div class="pt-2 pl-10 mb-2 text-sm text-slate-600">
                                <table class="w-full border border-slate-600">
                                    <thead>
                                        <tr class="font-bold text-center bg-slate-100">
                                            <td class="border border-slate-600 py-1 w-10">No</td>
                                            <td class="border border-slate-600 py-1">Jenis Tes</td>
                                            <td class="border border-slate-600 py-1">Hasil</td>
                                            <td class="border border-slate-600 py-1">Keterangan</td>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td class="border border-slate-600 text-center">1</td>
                                            <td class="border border-slate-600 px-2">Tes Akademik</td>
                                            <td class="border border-slate-600 text-center">
                                                {{ $this->hasil->akademik?->nilai }}
                                            </td>
                                            <td class="border border-slate-600 px-2">
                                                Benar : {{ $this->hasil->akademik?->benar ?? '-' }} <br>
                                                Salah : {{ $this->hasil->akademik?->salah ?? '-' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="border border-slate-600 text-center">2</td>
                                            <td class="border border-slate-600 px-2">Tes Baca Al-Qur'an</td>
                                            <td class="border border-slate-600 text-center">
                                                {{ $alquran?->nilai }}
                                            </td>
                                            <td class="border border-slate-600 px-2">
                                                Jenis : {{ $alquran?->jenis }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="border border-slate-600 text-center">3</td>
                                            <td class="border border-slate-600 px-2">Tes Hafalan</td>
                                            <td class="border border-slate-600 text-center">
                                                {{ $hafalan?->nilai }}
                                            </td>
                                            <td class="border border-slate-600 px-2">
                                                Jenis : {{ $hafalan?->jenis }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="border border-slate-600 text-center">4</td>
                                            <td class="border border-slate-600 px-2">Tes Wawancara</td>
                                            <td colspan="2" class="border border-slate-600 px-2">
                                                {{ $wawancara?->catatan ?: '-' }}
                                            </td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                            <span class="pl-10 text-sm text-slate-600">
                                Dengan ini memutuskan bahwa :
                            </span>
                            <div class="pt-5 pl-20 mb-5 text-sm text-slate-600">
                                <table class="w-full">
                                    <tbody>
                                        <tr>
                                            <td class="w-2/5 pl-5 capitalize">nama</td>
                                            <td class="font-bold uppercase">: {{ $this->hasil->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="capitalize w-[30%] pl-5">tempat, tanggal lahir</td>
                                            <td class="font-bold uppercase">:
                                                {{ $this->hasil->biodata?->tempat_lahir }},
                                                {{ tanggal($this->hasil->biodata?->tanggal_lahir) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="capitalize w-[30%] pl-5">no. pendaftaran</td>
                                            <td class="font-bold uppercase">: {{ $this->hasil->kode_daftar }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-2/5 pl-5 capitalize">asal sekolah</td>
                                            <td class="font-bold uppercase">:
                                                {{ $this->hasil->biodata?->nama_sekolah_dasar }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center capitalize">dinyatakan :</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-xl font-bold text-center uppercase">
                                                @if ($this->hasil->diterima == 'diterima')
                                                    Diterima
                                                @elseif ($this->hasil->diterima == 'tidak diterima')
                                                    wajib mengikuti tes ulang / remidi
                                                @else
                                                    belum selesai mengikuti tes
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if ($this->hasil->diterima == 'diterima')
                                <div class="px-10 pt-5 text-sm text-justify text-slate-600">
                                    Sebagai Peserta Didik Baru di SMP MIFTAHUL HUDA
                                    , mohon
                                    segera melakukan proses pembayaran seragam dan melengkapi persyaratan.
                                </div>
                            @endif
                            <div class="pl-10 mt-5 text-sm text-slate-600">
                                Demikian pengumuman ini kami sampaikan, atas perhatian dan kerjasamanya kami sampaikan
                                terimakasih.
                            </div>
                            <div class="pl-10 text-sm text-slate-600">
                                <div class="flex justify-end mt-5 mr-10">
                                    <div class="flex flex-col items-center space-y-1">
                                        <span class="text-center">
                                            Limbangan, {{ tanggal(date('Y-m-d')) }}
                                            <br>
                                            Kepala Sekolah
                                        </span>
                                        <div class=" py-12"></div>
                                        {{-- <img src="{{ asset('images/ttdkasek.png') }}" class="h-24" /> --}}
                                        <span class="font-bold text-center underline">
                                            Arief Fahmie,S.Pd.
                                        </span>
                                    </div>
                                </div>
                            </div>


                        </details>

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

                        <p class="mt-4 text-lg gap-2">
                            Anda belum dinyatakan lulus pada seleksi
                            Penerimaan Peserta Didik Baru. <br>
                            <x-button href="{!! route('siswa.print-pengumuman.print', ['kode_daftar' => auth()->user()->kode_daftar]) !!}" target="blank__" label="print hasil"
                                icon="printer" positive />
                        </p>


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

                            <div class="border-b-2 border-slate-600 pb-2">
                                <div class="relative flex items-center justify-center">
                                    <img src="{{ asset('images/logo56.png') }}" alt="logo"
                                        class="absolute left-0 w-24 h-24">

                                    <div class="text-center">
                                        <div class="uppercase tracking-wide text-slate-600 font-bold">
                                            Yayasan Miftahul Huda
                                        </div>

                                        <div class="text-2xl uppercase tracking-[.2em] text-slate-600 font-bold">
                                            SMP Miftahul Huda
                                        </div>

                                        <div class="text-slate-600 text-xs mt-1">
                                            <div>Jl. Masjid No. 2 Peron - Limbangan, Kab. Kendal - Jawa Tengah</div>
                                            <div>HP. 087880001111, 082280001111, 085780001111 E-mail: smpmifda@gmail.com
                                            </div>
                                            <div>Website : www.smpmiftahulhudaperon.com</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mb-2 font-bold text-center uppercase text-slate-700 text-md">
                                pengumuman
                                <br>
                                no : psb/smp-mifda/{{ str_replace(' ', '', $this->hasil->biodata?->tahun) }}
                            </h1>
                            <h1 class="text-sm text-center uppercase text-slate-600">tentang</h1>
                            <h1 class="mb-10 text-sm font-bold text-center uppercase text-slate-700">
                                penerimaan santri baru
                                <br>
                                SMP MIFTAHUL HUDA
                                tahun {{ $this->hasil->biodata?->tahun }}
                            </h1>
                            <div class="px-10 text-sm text-slate-600">
                                Berdasarkan hasil tes seleksi penerimaan peserta didik baru tahun ajaran
                                {{ $this->hasil->biodata?->tahun }} SMP
                                Miftahul Huda, yang
                                meliputi :
                            </div>
                            @php
                                $alquran = $this->hasil->seleksiAgama->firstWhere('jenis', 'alquran');
                                $hafalan = $this->hasil->seleksiAgama->firstWhere('jenis', 'hafalan');
                                $wawancara = $this->hasil->wawancara;

                            @endphp

                            <div class="pt-2 pl-10 mb-2 text-sm text-slate-600">
                                <table class="w-full border border-slate-600">
                                    <thead>
                                        <tr class="font-bold text-center bg-slate-100">
                                            <td class="border border-slate-600 py-1 w-10">No</td>
                                            <td class="border border-slate-600 py-1">Jenis Tes</td>
                                            <td class="border border-slate-600 py-1">Hasil</td>
                                            <td class="border border-slate-600 py-1">Keterangan</td>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td class="border border-slate-600 text-center">1</td>
                                            <td class="border border-slate-600 px-2">Tes Akademik</td>
                                            <td class="border border-slate-600 text-center">
                                                {{ $this->hasil->akademik?->nilai }}
                                            </td>
                                            <td class="border border-slate-600 px-2">
                                                Benar : {{ $this->hasil->akademik?->benar ?? '-' }} <br>
                                                Salah : {{ $this->hasil->akademik?->salah ?? '-' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="border border-slate-600 text-center">2</td>
                                            <td class="border border-slate-600 px-2">Tes Baca Al-Qur'an</td>
                                            <td class="border border-slate-600 text-center">
                                                {{ $alquran?->nilai }}
                                            </td>
                                            <td class="border border-slate-600 px-2">
                                                Jenis : {{ $alquran?->jenis }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="border border-slate-600 text-center">3</td>
                                            <td class="border border-slate-600 px-2">Tes Hafalan</td>
                                            <td class="border border-slate-600 text-center">
                                                {{ $hafalan?->nilai }}
                                            </td>
                                            <td class="border border-slate-600 px-2">
                                                Jenis : {{ $hafalan?->jenis }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="border border-slate-600 text-center">4</td>
                                            <td class="border border-slate-600 px-2">Tes Wawancara</td>
                                            <td colspan="2" class="border border-slate-600 px-2">
                                                {{ $wawancara?->catatan ?: '-' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <span class="pl-10 text-sm text-slate-600">
                                Dengan ini memutuskan bahwa :
                            </span>
                            <div class="pt-5 pl-20 mb-5 text-sm text-slate-600">
                                <table class="w-full">
                                    <tbody>
                                        <tr>
                                            <td class="w-2/5 pl-5 capitalize">nama</td>
                                            <td class="font-bold uppercase">: {{ $this->hasil->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="capitalize w-[30%] pl-5">tempat, tanggal lahir</td>
                                            <td class="font-bold uppercase">:
                                                {{ $this->hasil->biodata?->tempat_lahir }},
                                                {{ tanggal($this->hasil->biodata?->tanggal_lahir) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="capitalize w-[30%] pl-5">no. pendaftaran</td>
                                            <td class="font-bold uppercase">: {{ $this->hasil->kode_daftar }}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-2/5 pl-5 capitalize">asal sekolah</td>
                                            <td class="font-bold uppercase">:
                                                {{ $this->hasil->biodata?->nama_sekolah_dasar }}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-center capitalize">dinyatakan :</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-xl font-bold text-center uppercase">
                                                @if ($this->hasil->diterima == 'diterima')
                                                    Diterima
                                                @elseif ($this->hasil->diterima == 'tidak diterima')
                                                    wajib mengikuti tes ulang / remidi
                                                @else
                                                    belum selesai mengikuti tes
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @if ($this->hasil->diterima == 'diterima')
                                <div class="px-10 pt-5 text-sm text-justify text-slate-600">
                                    Sebagai Peserta Didik Baru di SMP MIFTAHUL HUDA
                                    , mohon
                                    segera melakukan proses pembayaran seragam dan melengkapi persyaratan.
                                </div>
                            @endif
                            <div class="pl-10 mt-5 text-sm text-slate-600">
                                Demikian pengumuman ini kami sampaikan, atas perhatian dan kerjasamanya kami sampaikan
                                terimakasih.
                            </div>
                            <div class="pl-10 text-sm text-slate-600">
                                <div class="flex justify-end mt-5 mr-10">
                                    <div class="flex flex-col items-center space-y-1">
                                        <span class="text-center">
                                            Limbangan, {{ tanggal(date('Y-m-d')) }}
                                            <br>
                                            Kepala Sekolah
                                        </span>
                                        <div class=" py-12"></div>
                                        {{-- <img src="{{ asset('images/ttdkasek.png') }}" class="h-24" /> --}}
                                        <span class="font-bold text-center underline">
                                            Arief Fahmie,S.Pd.
                                        </span>
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

                        </div>

                    </div>
                @endif

            </div>

        </div>
    </div>

</x-card>
