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

    function aju_sim_umum(){
        return view('operator.simpanan.op_aju_simpanan_umum');
    }

    function aju_sim_deposit(){
        return view('operator.simpanan.op_aju_simpanan_deposit');
    }

    function aju_sim_umroh(){
        return view('operator.simpanan.op_aju_simpanan_umroh');

    }
    function aju_sim_pendidikan(){
        return view('operator.simpanan.op_aju_simpanan_pendidikan');

    }


}
