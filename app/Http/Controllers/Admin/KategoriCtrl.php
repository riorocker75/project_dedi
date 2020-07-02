<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Admin;
use App\Model\User;
use App\Model\Cat_Pinjaman;
use App\Model\Cat_Simpanan;


class KategoriCtrl extends Controller
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


	public function kategori_simpanan(){
		$kategori = DB::table('tbl_kategori_simpanan')->get();
		return view('admin/v_kategori_simpanan',['kategori' => $kategori]);
	}


	public function kategori_simpanan_act(Request $request){
		DB::table('tbl_kategori_simpanan')->insert([
			'kategori_jenis' =>$request->jenis,
			'kategori_biaya_simpanan' =>$request->besar		
		]);
		return redirect('dashboard/admin/kategori_simpanan');
	}

	public function kategori_simpanan_hapus($id){
		DB::table('tbl_kategori_simpanan')->where('kategori_id',$id)->delete();
		return redirect('dashboard/admin/kategori_simpanan');
	}

	public function kategori_simpanan_update(Request $request){
		DB::table('tbl_kategori_simpanan')->where('kategori_id',$request->id)->update([
			'kategori_jenis' => $request->jenis,
			'kategori_biaya_simpanan' => $request->besar
		]);
		return redirect('dashboard/admin/kategori_simpanan');
	}

}
