<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table="tbl_pinjaman";
    public $timestamps = false;
    protected $fillable =[
        'pinjaman_kode',
        'pinjaman_tgl',
        'pinjaman_nama',
        'pinjaman_jumlah',
        'pinjaman_skema_angsuran',
        'pinjaman_bunga',
        'pinjaman_angsuran_lama',
        'pinjaman_status'
    ];

    
}
