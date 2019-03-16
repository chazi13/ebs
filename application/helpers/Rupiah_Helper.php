<?php
defined('BASEPATH') OR die('No direct script access allowed!');

function rupiah($nominal)
{
    $rupiah = 'Rp. ';
    $rupiah .= number_format($nominal, 2, ',', '.');
    return $rupiah;
}
