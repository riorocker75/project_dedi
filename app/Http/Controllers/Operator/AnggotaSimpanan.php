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
use App\Model\Simpanan\OpsiSimpanan;

use App\Model\Simpanan\SimpananBerjangka;
use App\Model\Simpanan\OpsiSimpananBerjangka;


class AnggotaSimpanan extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-op')){
                return redirect('login/operator')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }

    function __invoke(){
        // $data=Anggota::where();
        return view('operator.data_aju_simpanan');
    }

    function tambah_mohon(){
        $data=Anggota::where('status',1)->get();
        return view('operator.data_simpanan_mohon',[
            'anggota' => $data
        ]);
    }

/*
==============================
|   Pengajuan simpanan umum
==============================
*/    
    function aju_sim_umum($id){
        return view('operator.simpanan.op_aju_simpanan_umum');
    }

    function aju_umum_act(Request $request,$id){

    }


/*
================================
|   Pengajuan simpanan deposit
================================
*/ 
    function aju_sim_deposit($id){
        return view('operator.simpanan.op_aju_simpanan_deposit');
    }
    function aju_deposit_act(Request $request,$id){}

/*
==================================
|   Pengajuan simpanan umroh
==================================
*/     

    function aju_sim_umroh($id){
        return view('operator.simpanan.op_aju_simpanan_umroh');

    }
    function aju_umroh_act(Request $request,$id){

    }


/*
==================================
|   Pengajuan simpanan pendidikan
==================================
*/      
    function aju_sim_pendidikan($id){
        return view('operator.simpanan.op_aju_simpanan_pendidikan');

    }
    function aju_pendidikan_act(Request $request,$id){}



}
