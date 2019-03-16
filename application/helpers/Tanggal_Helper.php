<?php
defined('BASEPATH') OR die('No direct script access allowed!');

function bulan($date)
{
    $bulan = [
        'January' => 'Januari',
        'February' => 'Februari',
        'March' => 'Maret',
        'April' => 'April',
        'May' => 'Mai',
        'June' => 'Juni',
        'July' => 'Juli',
        'August' => 'Agustus',
        'September' => 'September',
        'October' => 'Oktober',
        'November' => 'November',
        'December' => 'Desember'
    ];
    $month = date('F', strtotime($date));
    return $bulan[$month];
}

function hari($date)
{
    $hari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jum\'at',
        'Saturday' => 'Sabtu'
    ];
    $day = date('l', strtotime($date));
    return $hari[$day];
}

function tgl($date)
{
    $hari = hari($date);
    $bulan = bulan($date);
    $tgl = $hari . ', ' . date('d', strtotime($date)) . ' ' . $bulan . ' ' . date('Y', strtotime($date));
    return $tgl;
}
