@extends('layouts.print')
@section('title', 'Print Formulir Pendaftaran')
@section('content')
    <div class="flex justify-center p-2">
        <div class="grid grid-rows-2 grid-flow-col gap-0 text-center border-b-2 border-slate-600">
            <div class="row-span-2 place-self-center">
                <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-24 h-24">
            </div>
            <div class="col-span-2">
                <span class=" uppercase tracking-wide text-slate-600 font-bold">yayasan miftahul huda</span><br>
                <span class="text-2xl uppercase tracking-[.2em] text-slate-600 font-bold">smp miftahul huda</span>
            </div>
            <div class="col-span-2 text-slate-600 text-xs ">
                <span>Jl. Masjid No. 2 Peron - Limbangan , Kab. Kendal - Jawa Tengah</span><br>
                <span>HP. 087880001111, 082280001111 , 085780001111 E-mail: smpmifda@gmail.com</span><br>
                <span>Website : www.smpmiftahulhudaperon.com</span>
            </div>
        </div>
    </div>
    <h1 class="font-bold text-center uppercase text-slate-700 text-md">
        formulir pendaftaran penerimaan santri baru
        <br>
        tahun ajaran {{ $user->biodata?->tahun }}
    </h1>
    <div class="flex justify-end mr-10 text-right text-slate-600">
        <div class="flex flex-col">
            <span class="capitalize">no. pendaftaran :
                <span class="font-bold">{{ $user->kode_daftar }}</span>
            </span>
            <span class="capitalize">
                @switch(substr($user->kode_daftar,0,1))
                    @case('A')
                        pendaftaran siswa baru kelas : {{ $user->tingkat }}
                    @break

                    @case('B')
                        pendaftaran siswi baru kelas : {{ $user->tingkat }}
                    @break

                    @case('C')
                        pendaftaran siswa pindahan kelas : {{ $user->tingkat }}
                    @break

                    @case('D')
                        pendaftaran siswi pindahan kelas : {{ $user->tingkat }}
                    @break

                    @default
                @endswitch

            </span>
        </div>
    </div>
    <div class="pl-10 text-sm text-slate-600">
        <table class="w-full">
            <tbody>
                <tr>
                    <th class="font-bold text-left uppercase" colspan="2">a. identitas calon siswa</th>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">1. nama lengkap</td>
                    <td class="uppercase">: {{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">2. nik</td>
                    <td class="uppercase">: {{ $user->biodata?->nik }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">3. nisn</td>
                    <td class="uppercase">: {{ $user->biodata?->nisn }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">4. tempat, tanggal lahir</td>
                    <td class="uppercase">: {{ $user->biodata?->tempat_lahir }},
                        {{ \Carbon\Carbon::parse($user->biodata?->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">5. alamat </td>
                    <td class="uppercase">: {{ $user->biodata?->alamat_lengkap }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">kelurahan / desa </td>
                    <td class="uppercase">: {{ $user->biodata?->village?->name }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">kecamatan </td>
                    <td class="uppercase">: {{ $user->biodata?->district?->name }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">kabupaten / kota </td>
                    <td class="uppercase">: {{ $user->biodata?->city?->name }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">provinsi </td>
                    <td class="uppercase">: {{ $user->biodata?->provinsi }}</td>
                </tr>
                <tr>
                    <th class="font-bold text-left uppercase" colspan="2">&nbsp;</th>
                </tr>
                <tr>
                    <th class="font-bold text-left uppercase" colspan="2">b. data sekolah asal</th>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">1. nama sekolah dasar</td>
                    <td class="uppercase">: {{ $user->biodata?->nama_sekolah_dasar }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">2. alamat sekolah</td>
                    <td class="uppercase"></td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">kelurahan / desa </td>
                    <td class="uppercase">: {{ $user->biodata?->desa_sekolah_dasar }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">kecamatan </td>
                    <td class="uppercase">: {{ $user->biodata?->kecamatan_sekolah_dasar }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">kabupaten / kota </td>
                    <td class="uppercase">: {{ $user->biodata?->kabupaten_sekolah_dasar }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">provinsi </td>
                    <td class="uppercase">: {{ $user->biodata?->provinsi_sekolah_dasar }}</td>
                </tr>
                <tr>
                    <th class="font-bold text-left uppercase" colspan="2">&nbsp;</th>
                </tr>
                <tr>
                    <th class="font-bold text-left uppercase" colspan="2">c. data orang tua / wali</th>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">1. nama ayah</td>
                    <td class="uppercase">: {{ $user->biodata?->nama_ayah }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">pekerjaan ayah</td>
                    <td class="uppercase">: {{ $user->biodata?->pekerjaan_ayah }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">2. nama ibu</td>
                    <td class="uppercase">: {{ $user->biodata?->nama_ibu }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">pekerjaan ibu</td>
                    <td class="uppercase">: {{ $user->biodata?->pekerjaan_ibu }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">3. kontak orang tua</td>
                    <td class="uppercase">: {{ $user->biodata?->telepon }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">4. nama wali</td>
                    <td class="uppercase">: {{ $user->biodata?->nama_wali }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-10 capitalize">kontak wali</td>
                    <td class="uppercase">: {{ $user->biodata?->telepon_wali }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">5. kip</td>
                    <td class="uppercase">: {{ $user->biodata?->kip ? 'Ada' : 'Tidak Ada' }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">6. penghasilan orang tua</td>
                    <td class="uppercase">: {{ rupiah($user->biodata?->penghasilan) }}</td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-end mt-5 mr-10">
            <div class="flex flex-col space-y-10">
                <span class="text-center">
                    {{ \Carbon\Carbon::parse($user->tanggal_daftar)->translatedFormat('l, d F Y') }}

                    <br>
                    Calon Santri
                </span>
                <span class="font-bold text-center underline">
                    {{ $user->name }}
                </span>
            </div>
        </div>
    </div>

    <div style="page-break-before: always"></div>
    <div class="flex justify-center p-2">
        <div class="grid grid-rows-2 grid-flow-col gap-0 text-center border-b-2 border-slate-600">
            <div class="row-span-2 place-self-center">
                <img src="{{ Storage::disk('s3')->url('smp/public/logoalfahp.png') }}" alt="logo" class="w-24 h-24">
            </div>
            <div class="col-span-2">
                <span class=" uppercase tracking-wide text-slate-600 font-bold">yayasan miftahul huda</span><br>
                <span class="text-2xl uppercase tracking-[.2em] text-slate-600 font-bold">smp miftahul huda</span>
            </div>
            <div class="col-span-2 text-slate-600 text-xs ">
                <span>Jl. Kampir-Sudipayung, Kec. Ngampel, Kab. Kendal - Jawa Tengah</span><br>
                <span>HP. 087880001111, 082280001111 , 085780001111 E-mail: smpmifda@gmail.com</span><br>
                <span>Website : www.smpmifda.sch.id</span>
            </div>
        </div>
    </div>
    <h1 class="font-bold text-center uppercase text-slate-700 text-md">
        kartu pendaftaran
        <br>
        seleksi penerimaan santri baru
        tahun ajaran {{ $user->biodata?->tahun }}
    </h1>

    <div class="pt-5 pl-10 text-sm text-slate-600">
        <table class="w-full">
            <tbody>
                <tr>
                    <td class="capitalize w-[30%] pl-5">no. pendaftaran</td>
                    <td class="font-bold uppercase">: {{ $user->kode_daftar }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">nama</td>
                    <td class="font-bold uppercase">: {{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="w-2/5 pl-5 capitalize">asal sekolah</td>
                    <td class="font-bold uppercase">: {{ $user->biodata?->nama_sekolah_dasar }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h1 class="pt-5 pl-10 font-bold uppercase text-slate-700 text-md">
        keterangan
    </h1>
    <span class="pt-5 pl-10 text-sm text-slate-600">
        Kartu ini jangan sampai rusak / hilang. Dibawa ketika melakukan tes seleksi dan daftar ulang (bagi yang lolos
        seleksi) serta pengambilang seragam
    </span>
    <div class="pl-10 text-sm text-slate-600">
        <table class="w-full border-separate border-spacing-5">
            <tbody>
                <tr>
                    <td class="font-bold uppercase " colspan="5">a. tes seleksi</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">1. tes agama</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:
                        @if ($user->gelombang != 1)
                            Lulus
                        @endif
                    </td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">4. tes minat dan bakat</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:
                        @if ($user->gelombang != 1)
                            Lulus
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">2. tes akademik</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:
                        @if ($user->gelombang != 1)
                            Lulus
                        @endif
                    </td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">5. tes wawancara</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:

                        @if ($user->gelombang != 1)
                            Lulus
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">3. tes kesehatan</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:
                        @if ($user->gelombang != 1)
                            Lulus
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="font-bold uppercase whitespace-nowrap" colspan="2">b. pembayaran daftar ulang</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600"
                        colspan="2">:</td>
                </tr>
                <tr>
                    <td class="font-bold uppercase " colspan="5">c. pengambilan seragam</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">1. baju osis</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">7. kaos olah raga</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">2. baju batik</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">8. celana olah raga</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">3. baju pramuka</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">9. peci / jilbab</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">4. celana / rok osis</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">10. handsduk</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">5. celana / rok batik</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">11. ikat pinggang</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                </tr>
                <tr>
                    <td class="w-[10%]">&nbsp;</td>
                    <td class="w-[25%] capitalize whitespace-nowrap">6. celana / rok pramuka</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                    <td class="w-[25%] capitalize whitespace-nowrap pl-5">12. kaos kaki</td>
                    <td class="w-1/5 capitalize border-b-2 border-dotted whitespace-nowrap border-slate-600">:</td>
                </tr>
            </tbody>
        </table>
        <div class="flex justify-end mt-5 mr-10">
            <div class="flex flex-col space-y-10">
                <span class="text-center">
                    Ngampel,
                    {{ \Carbon\Carbon::parse($user->tanggal_daftar)->translatedFormat('l, d F Y') }}
                    <br>
                    Petugas Pendaftaran
                </span>
                <span class="font-bold text-center underline">
                    {{ $user->guru?->name }}
                </span>
            </div>
        </div>
    </div>
@endsection
