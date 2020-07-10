<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Admin;
use App\Model\User;
use App\Model\Anggota;
use App\Model\Operator;
use App\Model\Pinjaman;
use App\Model\Cat_Pinjaman;
use App\Model\Simpanan;

class AnggotaGabung extends Controller
{
   function __invoke(){
       $data=Anggota::where('status',0)->get();
        return view('operator.data_gabung_anggota',[
            'data_mohon' =>$data
        ]);
   }

   function detail_pemohon($id){
    $data=Anggota::where('anggota_id',$id)->get();
    return view('operator.data_gabung_detail',[
        'anggota' =>$data
    ]);
   }

   function gabung_act(Request $request){
       
   }




}
