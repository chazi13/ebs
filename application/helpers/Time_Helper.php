<?php
defined('BASEPATH') OR die('No direct script access allowed!');

function time_past($time)
{
    $tanggal = $time;

    $waktu = strtotime($tanggal);
    $sekarang = time(date('d-m-Y'));
    $arrdata = array(
        "hari" => 86400,
        "jam" => 3600,
        "menit" => 60,
        "detik" => 0
    );
    $jarak = $sekarang - $waktu;

    foreach($arrdata as $kata => $constant) {
        $waktu_lalu = disposisi($jarak, $constant, $kata);
        if ($waktu_lalu) {
            break;
        }
    }

    echo $waktu_lalu;
}

function disposisi($jarak, $c, $kata)
{
    $r = ($c) ? floor($jarak / $c) : $jarak;
    if ($r) {
        // $jarak -= $r * $c;
        $kata_return = $r . ' ' . $kata . ' lalu';
        if ($r == 1 && $kata == 'hari') {
            $kata_return = 'kemarin';
        } elseif ($r > 1 && $kata == 'hari') {
            $kata_return = tgl($jarak);
        }
        return $kata_return;
    } else
        return "";
}
