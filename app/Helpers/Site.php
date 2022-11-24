<?php

use Carbon\Carbon;
use App\Models\Suratjalan;

function test()
{
    return 'test';
}

function week()
{
    $now = Carbon::now();
    $tglAwal = $now->startOfWeek()->day - 1;
    $tglAkhir = $now->endOfWeek()->day - 1;
    $bulanAkhir = $now->endOfWeek()->month;
    $tahunAkhir = $now->endOfWeek()->year;
    $bulanAkhir = $now->locale('id')->monthName;

    $periode = $tglAwal . ' - ' . $tglAkhir . ' ' . $bulanAkhir . ' ' . $tahunAkhir;
    return $periode;
}

function hariIni()
{
    $now = Carbon::now();
    $tgl = $now->day;
    $bulan = $now->locale('id')->monthName;
    $tahun = $now->year;



    // $tgl = $hari . ' - ' . $tgl . ' ' . $bulan . ' ' . $tahun;
    $tanggal = $tgl . ' ' . $bulan . ' ' . $tahun;
    return $tanggal;
}
