<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Admin;
use App\Model\Anggota;
use App\Model\Operator;

class TransaksiCtrl extends Controller
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

    function transaksi_simpanan(){
        
        return view('admin.transaksi.data_transaksi_simpanan');
    }

    function transaksi_simpanan_umum(){
        
        return view('admin.transaksi.dt_simpanan_umum');
    }

    // transaksi simmpanan berjangka
    function transaksi_deposito(){
        return view('admin.transaksi.dt_simpanan_berjangka');
    }

    function transaksi_umroh(){
        return view('admin.transaksi.dt_simpanan_umroh');
    }

    function transaksi_pendidikan(){
        return view('admin.transaksi.dt_simpanan_pendidikan');
    }

    function transaksi_pinjaman(){
        return view('admin.transaksi.data_transaksi_pinjaman');
    }





}
