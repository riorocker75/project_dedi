<?php

function format_tanggal($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}


function status_bayar_pinjaman($status){
    switch($status){
        case 0:
            echo "Tahap Ajukan";
        break;
        case 1:
            echo "Masa Angsuran";
        break;
        case 2:
            echo"lunas";
        break;
        default:
        echo "none ";
        break;
    }
}
