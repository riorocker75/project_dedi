<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Model\Admin;
use App\Model\Pinjaman;
use App\Model\Cat_Pinjaman;
use App\Model\Cat_Simpanan;
use App\Model\Tabungan;
use App\Model\Simpanan;

use App\Model\Anggota;
use App\Model\Anggota_Gaji;

use App\Model\Operator;


class PengajuanCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-adm')){
                return redirect('login/admin')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }

    // data pengajuan anggota
    function anggota_gabung(){
        $data=Anggota::where('status',1)->orderBy('anggota_id','DESC')->get();
        return view('admin.v_data_gabung_anggota',[
            'data_mohon' =>$data
        ]);
    }

    function detail_gabung($id){
        $data=Anggota::where('anggota_id',$id)->get();
        return view('admin.v_data_gabung_detail',[
            'anggota' =>$data
        ]);
    }

    // data pengajuan mohon pinjam
    function date_peminjam(){
        
    }
}
