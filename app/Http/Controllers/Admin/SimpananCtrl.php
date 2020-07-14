<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Admin;
use App\Model\User;
use App\Model\Simpanan;
use App\Model\Simpanan\OpsiSimpanan;
use App\Model\Simpanan\OpsiSimpananLain;

use App\Model\SimpananBerjangka;



class SimpananCtrl extends Controller
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

    public function __invoke(){
    	return view('admin.simpanan.v_atur_simpanan');

    }


/*
=================================
| bagian pengaturan simpanan umum
==================================
*/
    function atur_umum(){
    	return view('admin.simpanan.opsi_simpanan_umum');
    }

    function atur_umum_update(Request $request){
    	$request->validate([
    		'pokok' => 'required',
    		'wajib' => 'required',
    		'sukarela' => 'required'
    	]);

    	OpsiSimpanan::where('id', 1)->update([
    		'simpanan_pokok' => $request->pokok,
    		'simpanan_wajib' => $request->wajib,
    		'biaya_buku' => $request->buku,
    		'biaya_admin' => $request->admin,
    		'sukarela_min' => $request->sukarela,
    		'bunga' => $request->bunga
    	]);

    	return redirect('/admin/pengaturan/simpanan-umum')->with('alert-success','Data telah diperbaharui');

    }

// end pengaturan simpanan umum

/*
=================================
| bagian pengaturan simpanan deposit
==================================
*/

 function atur_deposit(){
    	return view('admin.simpanan.opsi_simpanan_deposit');
    }
    function atur_deposit_act(Request $request){

    }

    function atur_deposit_update(Request $request){

    }


// end pengaturan simpanan deposit


/*
=================================
| bagian pengaturan simpanan umroh
==================================
*/
 function atur_lain(){
    	return view('admin.simpanan.opsi_simpanan_lain');
    }
    function atur_lain_act(Request $request){

    }

    function atur_lain_update(Request $request){

    }


// end pengaturan simpanan umroh


/*
=================================
| bagian pengaturan simpanan pendidikan
==================================
*/

 // end pengaturan simpanan pendidikan


}
