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
use App\Model\User;


class AnggotaCtrl extends Controller
{
    //
    public function __construct()
	{
		$this->middleware(function ($request, $next) {
			if(!Session::get('login-adm')){
				return redirect('login/admin')->with('alert-danger','Dilarang Masuk Terlarang');
			}
			return $next($request);
		});

	}

	public function anggota(){
		$anggota = DB::table('tbl_anggota')->get();
		return view('admin/v_anggota',['anggota' => $anggota]);
	}

	public function anggota_tabungan($id){
		$anggota = DB::table('tbl_anggota')->where('anggota_id',$id)->get();
		// $kategori = DB::table('tbl_kategori_simpanan')->get();
		$simpanan = DB::table('tbl_simpanan')
			->join('tbl_anggota', 'tbl_simpanan.anggota_id', '=', 'tbl_anggota.anggota_id')
			->join('tbl_kategori_simpanan', 'tbl_simpanan.simpanan_id_kategori', '=', 'tbl_simpanan.simpanan_id')
			->where('tbl_simpanan.anggota_id', $id)->get();

		return view('admin/v_anggota_tabungan',['simpanan' => $simpanan], ['anggota'=>$anggota]);
	}



}
