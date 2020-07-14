<?php

namespace App\Http\Controllers\Anggota;

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
class Ang_Transaksi extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-ang')){
                return redirect('login/anggota')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }

    public function __invoke(){

    }

    function histori_simpanan(){
        // disini ambil session id nya buat nampilin wher dari simpanan`
        return view('anggota.transaksi.ang_transaksi_simpanan');
    }

}
