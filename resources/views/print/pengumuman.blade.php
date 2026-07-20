@extends('layouts.print')
@section('title', 'Print Pengumuman')
@section('content')
    <div class="border-b-2 border-slate-600 pb-2">
        <div class="relative flex items-center justify-center">
            <img src="{{ asset('images/logo56.png') }}" alt="logo" class="absolute left-0 w-24 h-24">

            <div class="text-center">
                <div class="uppercase tracking-wide text-slate-600 font-bold">
                    Yayasan Miftahul Huda
                </div>

                <div class="text-2xl uppercase tracking-[.2em] text-slate-600 font-bold">
                    SMP Miftahul Huda
                </div>

                <div class="text-slate-600 text-xs mt-1">
                    <div>Jl. Masjid No. 2 Peron - Limbangan, Kab. Kendal - Jawa Tengah</div>
                    <div>HP. 087880001111, 082280001111, 085780001111 E-mail: smpmifda@gmail.com</div>
                    <div>Website : www.smpmiftahulhudaperon.com</div>
                </div>
            </div>
        </div>
    </div>
    <h1 class="mb-2 font-bold text-center uppercase text-slate-700 text-md">
        pengumuman
        <br>
        no : psb/smp-mifda/{{ str_replace(' ', '', $user->biodata?->tahun) }}
    </h1>
    <h1 class="text-sm text-center uppercase text-slate-600">tentang</h1>
    <h1 class="mb-10 text-sm font-bold text-center uppercase text-slate-700">
        penerimaan santri baru
        <br>
        SMP MIFTAHUL HUDA
        tahun {{ $user->biodata?->tahun }}
    </h1>
    <div class="px-10 text-sm text-slate-600">
        Berdasarkan hasil tes seleksi penerimaan peserta didik baru tahun ajaran {{ $user->biodata?->tahun }} SMP
        Miftahul Huda, yang
        meliputi :
    </div>
    @php
        $alquran = $user->seleksiAgama->firstWhere('jenis', 'alquran');
        $hafalan = $user->seleksiAgama->firstWhere('jenis', 'hafalan');
        $wawancara = $user->wawancara;

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
                        {{ $user->akademik?->nilai }}
                    </td>
                    <td class="border border-slate-600 px-2">
                        Benar : {{ $user->akademik?->benar ?? '-' }} <br>
                        Salah : {{ $user->akademik?->salah ?? '-' }}
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

                {{-- <tr>
                    <td class="border border-slate-600 text-center">4</td>
                    <td class="border border-slate-600 px-2">Alasan Memilih</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->alasan_memilih }}
                    </td>
                </tr>

                <tr>
                    <td class="border border-slate-600 text-center">5</td>
                    <td class="border border-slate-600 px-2">Keinginan</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->keinginan }}
                    </td>
                </tr>

                <tr>
                    <td class="border border-slate-600 text-center">6</td>
                    <td class="border border-slate-600 px-2">Siap Tata Tertib</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->siap_tata_tertib ? 'Ya' : 'Tidak' }}
                    </td>
                </tr>

                <tr>
                    <td class="border border-slate-600 text-center">7</td>
                    <td class="border border-slate-600 px-2">Ekstrakurikuler</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->ekstrakurikuler?->nama ?? '-' }}
                    </td>
                </tr>

                <tr>
                    <td class="border border-slate-600 text-center">8</td>
                    <td class="border border-slate-600 px-2">Mata Pelajaran Favorit</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->mata_pelajaran_favorit }}
                    </td>
                </tr>

                <tr>
                    <td class="border border-slate-600 text-center">9</td>
                    <td class="border border-slate-600 px-2">Perilaku Buruk</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->perilaku_buruk ?: '-' }}
                    </td>
                </tr>

                <tr>
                    <td class="border border-slate-600 text-center">10</td>
                    <td class="border border-slate-600 px-2">Kendala Pergaulan</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->kendala_pergaulan ?: '-' }}
                    </td>
                </tr>

                <tr>
                    <td class="border border-slate-600 text-center">11</td>
                    <td class="border border-slate-600 px-2">Kendala Kehidupan</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->kendala_kehidupan ?: '-' }}
                    </td>
                </tr>

                <tr>
                    <td class="border border-slate-600 text-center">12</td>
                    <td class="border border-slate-600 px-2">Riwayat Penyakit</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->riwayat_penyakit ?: '-' }}
                    </td>
                </tr>

                <tr>
                    <td class="border border-slate-600 text-center">13</td>
                    <td class="border border-slate-600 px-2">Harapan</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->harapan }}
                    </td>
                </tr> --}}

                {{-- <tr>
                    <td class="border border-slate-600 text-center">14</td>
                    <td colspan="2" class="border border-slate-600 px-2">Catatan Pewawancara</td>
                    <td colspan="2" class="border border-slate-600 px-2">
                        {{ $wawancara?->catatan ?: '-' }}
                    </td>
                </tr> --}}

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
                    <td class="font-bold uppercase">: {{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-[30%] pl-5">tempat, tanggal lahir</td>
                    <td class="font-bold uppercase">: {{ $user->biodata?->tempat_lahir }},
                        {{ tanggal($user->biodata?->tanggal_lahir) }}</td>
                </tr>
                <tr>
                    <td class="capitalize w-[30%] pl-5">no. pendaftaran</td>
                    <td class="font-bold uppercase">: {{ $user->kode_daftar }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">asal sekolah</td>
                    <td class="font-bold uppercase">: {{ $user->biodata?->nama_sekolah_dasar }}</td>
                </tr>
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-center capitalize">dinyatakan :</td>
                </tr>
                <tr>
                    <td colspan="2" class="text-xl font-bold text-center uppercase">
                        @if ($user->diterima == 'diterima')
                            Diterima
                        @elseif ($user->diterima == 'tidak diterima')
                            wajib mengikuti tes ulang / remidi
                        @else
                            belum selesai mengikuti tes
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @if ($user->diterima == 'diterima')
        <div class="px-10 pt-5 text-sm text-justify text-slate-600">
            Sebagai Peserta Didik Baru di SMP MIFTAHUL HUDA
            , mohon
            segera melakukan proses pembayaran seragam dan melengkapi persyaratan.
        </div>
    @endif
    <div class="pl-10 mt-5 text-sm text-slate-600">
        Demikian pengumuman ini kami sampaikan, atas perhatian dan kerjasamanya kami sampaikan terimakasih.
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
@endsection
