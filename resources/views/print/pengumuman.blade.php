@extends('layouts.print')
@section('title', 'Print Formulir Pendaftaran')
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
    <div class="pt-2 pl-10 mb-2 text-sm text-slate-600">
        <table class="w-[80%] capitalize border border-slate-600">
            <tbody>
                <tr class="font-bold text-center">
                    <td class="border border-slate-600 py-1 px-2 w-[5%]">no.</td>
                    <td class="px-2 py-1 border border-slate-600">jenis tes</td>
                    <td class="px-2 py-1 border border-slate-600">hasil</td>
                    <td class="px-2 py-1 border border-slate-600">keterangan</td>
                </tr>
                <tr>
                    @php
                        $nilaiAkademik = $user->akademik?->nilai;
                        $nilaiAlquran = $user->seleksiAgama->where('jenis', 'alquran')->first()?->nilai;
                        $nilaiHafalan = $user->seleksiAgama->where('jenis', 'hafalan')->first()?->nilai;

                        $jumlahNilai = ($nilaiAkademik ?? 0) + ($nilaiAlquran ?? 0) + ($nilaiHafalan ?? 0);

                        $semuaTesSelesai =
                            !is_null($nilaiAkademik) && !is_null($nilaiAlquran) && !is_null($nilaiHafalan);

                        $rataRata = $semuaTesSelesai ? floor($jumlahNilai / 3) : null;
                    @endphp
                    <td class="border border-slate-600 py-1 px-2 w-[5%] text-center" rowspan="5">1.</td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 font-bold">hasil tes akademik, meliputi :</td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 text-center font-bold text-xl" rowspan="5">
                        {{ $nilaiAkademik }}
                    </td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 text-center font-bold text-xl" rowspan="5">
                        @if (!is_null($nilaiAkademik) && $nilaiAkademik >= 85)
                            Sangat Baik
                        @elseif (!is_null($nilaiAkademik) && $nilaiAkademik >= 75)
                            Baik
                        @elseif(!is_null($nilaiAkademik) && $nilaiAkademik >= 65)
                            Cukup
                        @else
                            Kurang
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600">a. Bahasa Indonesia</td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600">b. pendidikan agama dan budi pekerti</td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600">c. matematika</td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600">d. pengetahuan umum</td>
                </tr>
                <tr>
                    <td class="border border-slate-600 py-1 px-2 w-[5%] text-center" rowspan="4">2.</td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 font-bold">hasil tes baca Al-Qur'an, meliputi :
                    </td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 text-center font-bold text-xl" rowspan="4">
                        {{ $nilaiAlquran }}
                    </td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 text-center font-bold text-xl" rowspan="4">
                        @if (!is_null($nilaiAlquran) && $nilaiAlquran >= 85)
                            Sangat Baik
                        @elseif (!is_null($nilaiAlquran) && $nilaiAlquran >= 75)
                            Baik
                        @elseif(!is_null($nilaiAlquran) && $nilaiAlquran >= 65)
                            Cukup
                        @else
                            Kurang
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600">a. tajwid</td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600">b. makhrojul huruf</td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600">c. kelancaran membaca</td>
                </tr>
                </tr>
                <tr>
                    <td class="border border-slate-600 py-1 px-2 w-[5%] text-center" rowspan="4">3.</td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 font-bold">hasil tes hafalan, meliputi :
                    </td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 text-center font-bold text-xl" rowspan="4">
                        {{ $nilaiHafalan }}
                    </td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 text-center font-bold text-xl" rowspan="4">
                        @if (!is_null($nilaiHafalan) && $nilaiHafalan >= 85)
                            Sangat Baik
                        @elseif (!is_null($nilaiHafalan) && $nilaiHafalan >= 75)
                            Baik
                        @elseif($nilaiHafalan && $nilaiHafalan >= 65)
                            Cukup
                        @else
                            Kurang
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600">a. tajwid</td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600">b. makhrojul huruf</td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600">c. kelancaran menghafal</td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600 font-bold" colspan="2">jumlah nilai</td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 font-bold text-center text-lg">
                        {{ $nilaiAkademik + $nilaiAlquran + $nilaiHafalan }}
                    </td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 font-bold"></td>
                </tr>
                <tr>
                    <td class="px-2 py-1 pl-5 border border-slate-600 font-bold" colspan="2">rata - rata nilai</td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 font-bold text-center text-lg">
                        @if ($semuaTesSelesai)
                            {{ $rataRata }}
                        @endif
                    </td>
                    <td class="px-2 py-1 pl-5 border border-slate-600 font-bold text-center text-lg">
                        @if ($semuaTesSelesai && $rataRata >= 85)
                            Sangat Baik
                        @elseif ($semuaTesSelesai && $rataRata >= 75)
                            Baik
                        @elseif ($semuaTesSelesai && $rataRata >= 65)
                            Cukup
                        @elseif ($semuaTesSelesai)
                            Kurang
                        @endif
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
                        @if ($semuaTesSelesai && $rataRata >= 65)
                            Diterima
                        @elseif ($semuaTesSelesai)
                            wajib mengikuti tes formatif / lanjutan
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
