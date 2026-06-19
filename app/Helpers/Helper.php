<?php

use Carbon\Carbon;



function formatUang($angka)
{
    return number_format($angka, 0, ',', '.');
}

function arrayKondisiKeluarga()
{
    return json_decode(json_encode(
        [
            [
                'id' => 1,
                'value' => 'Utuh',
            ],
            [
                'id' => 2,
                'value' => 'Cerai Hidup',
            ],
            [
                'id' => 3,
                'value' => 'Cerai Mati',
            ],
            [
                'id' => 4,
                'value' => 'Tidak Utuh',
            ],
            [
                'id' => 5,
                'value' => 'Terlantar',
            ],
        ]
    ), false);
}

function arrayKondisiOrangTua()
{
    return json_decode(json_encode(
        [
            [
                'id' => 1,
                'value' => 'Ada',
            ],
            [
                'id' => 2,
                'value' => 'Di Luar Negeri',
            ],
            [
                'id' => 3,
                'value' => 'Tidak Tahu',
            ],
            [
                'id' => 4,
                'value' => 'Meninggal',
            ],
        ]
    ), false);
}

function arrayUkuran()
{
    return json_decode(json_encode(
        [
            [
                'id' => 1,
                'value' => 'S',
            ],
            [
                'id' => 2,
                'value' => 'M',
            ],
            [
                'id' => 3,
                'value' => 'L',
            ],
            [
                'id' => 4,
                'value' => 'XL',
            ],
            [
                'id' => 5,
                'value' => '2XL',
            ],
            [
                'id' => 6,
                'value' => '3XL',
            ],
            [
                'id' => 6,
                'value' => '4XL',
            ],
            [
                'id' => 7,
                'value' => '5XL',
            ],
            [
                'id' => 8,
                'value' => 'Jumbo',
            ],
        ]
    ), false);
}

function ambilAngka($string)
{
    return str_replace(['Rp. ', '.'], '', $string);
}

function rupiah($angka)
{
    return 'Rp ' . number_format($angka, 0, ',', '.');
}

function tanggal($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('d F Y');
}

function jam($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('H:i:s');
}

function tanggalJam($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('d F Y H:i:s');
}

function hariTanggal($tanggal)
{
    return Carbon::parse($tanggal)->translatedFormat('l, d F Y');
}

function namaHari($hari)
{
    $nama_hari = '';

    switch ($hari) {
        case '1':
            $nama_hari = 'Senin';
            break;
        case '2':
            $nama_hari = 'Selasa';
            break;
        case '3':
            $nama_hari = 'Rabu';
            break;
        case '4':
            $nama_hari = 'Kamis';
            break;
        case '5':
            $nama_hari = 'Jumat';
            break;
        case '6':
            $nama_hari = 'Sabtu';
            break;

        default:
            # code...
            break;
    }

    return $nama_hari;
}

function namaBulan($bulan)
{
    return Carbon::parse(date('Y-' . $bulan . '-d'))->translatedFormat('F');
}
