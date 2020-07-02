<?php

namespace App\Http\Controllers\Anggota;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;

use App\Model\Admin;
use App\Model\Anggota;
use App\Model\Operator;

use App\Model\User;
class AnggotaController extends Controller
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

    function __invoke(){
    	return view('anggota.anggota');
    }

    // perubahan data pribadi
    function data_pribadi($id){
        $data=Anggota::where('anggota_id' ,$id)->get();
        return view('anggota.data_pribadi', ['pribadi' => $data]);
    }

  
    function data_pribadi_update(Request $request,$id){

        $request->validate([
            'nik' => 'required|max:16',
            'nama' => 'required|max:30',
            'tempat_lahir' => 'required',
            'kontak' => 'required',
            'pekerjaan' => 'required',
            'alamat_sekarang' => 'required',
            'alamat_ktp' => 'required',
        ]);

        Anggota::where('anggota_id',$id)->update([
            'anggota_nik' => $request->nik,
            'anggota_nama' => $request->nama,
            'anggota_tanggal_lahir' => $request->tanggal_lahir,
            'anggota_tempat_lahir' => $request->tempat_lahir,
            'anggota_alamat_ktp' => $request->alamat_ktp,
            'anggota_alamat_sekarang' => $request->alamat_sekarang,
            'anggota_kontak' =>$request->kontak,
            'anggota_pekerjaan' =>$request->pekerjaan
        ]);
      
        return redirect('anggota/data-pribadi/$id')->with('alert-success','Data telah diperbaharui');


    }



}
