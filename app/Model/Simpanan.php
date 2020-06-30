<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
     protected $table= "tbl_simpanan";
    public $timestamps = false;
    protected $fillable =[
        'anggota_id',
        'simpanan_id_kategori',
        'simpanan_jumlah'
    ];
}
