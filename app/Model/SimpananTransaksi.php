<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SimpananTransaksi extends Model
{
    protected $table="tbl_simpanan_transaksi";
    public $timestamps = false;
    protected $fillable =[
        'anggota_id',
        'kode_rekening',
        'operator_id',
        'jumlah_transaksi',
        'tgl_transaksi',
        'jenis_transaksi'
      
    ];
}
