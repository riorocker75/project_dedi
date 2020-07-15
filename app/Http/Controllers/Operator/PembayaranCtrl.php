<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Admin;
use App\Model\User;
use App\Model\Anggota;
use App\Model\Operator;
use App\Model\Pinjaman;

use App\Model\Simpanan;
use App\Model\Simpanan\TransaksiSimpananLain;
use App\Model\PinjamanTransaksi;
use App\Model\SimpananTransaksi;


class PembayaranCtrl extends Controller
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

    function bayar_pinjaman(){
        $data=Pinjaman::where('status_bayar',1)->orderBy('id','DESC')->get();
        return view('operator.pembayaran.data_bayar_pinjaman',[
           'data' => $data
        ]);
    }

    function detail_bayar_pinjaman($id){
        $data=Pinjaman::where('pinjaman_kode', $id)->get();
        $data_bayar=PinjamanTransaksi::where('pinjaman_kode',$id)->orderBy('id','DESC')->get();
        return view('operator.pembayaran.data_bayar_pinjaman_detail',[
            'data_bayar' => $data_bayar,
            'data' => $data
         ]);
    }

    function bayar_pinjaman_act(Request $request, $id){

    }

}
