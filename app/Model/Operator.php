<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table= "tbl_operator";
    public $timestamps = false;
    protected $fillable =[
        'operator_kode',
        'operator_nomot_pegawai',
        'operator_nama',
        'operator_kelamin',
        'operator_tanggal_lahir',
        'operator_tempat_lahir',
        'operator_alamat',
        'operator_kontak'
       
    ];
}
