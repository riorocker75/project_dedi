<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Model\Admin;
use App\Model\Anggota;
use App\Model\Operator;
use App\Model\Anggota_Gaji;

use App\Model\User;

class AnggotaLogin extends Controller
{
     function __invoke(){
        if(!Session::get('login-ang')){
            return view('login/index_anggota');
        }else{
            return redirect('/dashboard/anggota');
        }
    }

    function loginCheck(Request $request){
    	$username = $request->username;
        $password = $request->password;
        $data = Anggota::where('anggota_username',$username)->first();
            if($data){
                 Session::flush();

                // cek status dulu
                if($data->status == "3"){
                       if(Hash::check($password,$data->anggota_password)){
                        Session::put('ang_id', $data->anggota_id);
                        Session::put('ang_nama', $data->anggota_nama);
                        Session::put('ang_username', $data->anggota_username);
                        Session::put('ang_kontak', $data->anggota_kontak);
                        Session::put('ang_nik', $data->anggota_nik);
                        Session::put('ang_status', $data->status);

                        Session::put('level', 3);
                        Session::put('login-ang',TRUE);
                             return redirect('/dashboard/anggota')->with('alert-success','Selamat Datang Kembali');
                        }else{
                            return redirect('/login/anggota')->with('alert-danger','Password atau Email, Salah !');
                        }   

                }else{
                  return redirect('/login/anggota')->with('alert-danger','Akun Kamu belum di verifikasi mohon bersabar!');
                }
              // end cek status 
            }else{
                return redirect('/login/anggota')->with('alert-danger','Password atau Email, Salah !');
            }
    }

  	public function logout(){
        Session::flush();
        return redirect('/login/anggota')->with('alert-success','Logout berhasil');
    }

    public function daftar(){
        return view('login.daftar_anggota');
    }

    public function daftar_act(Request $request){
      
        $nik = $request->nik;
        $nama = $request->nama;
        $kelamin = $request->kelamin;
        $alamat_ktp = $request->alamat;
        $kontak = $request->kontak;
        $tgl_lahir = $request->tgl_lahir;
        $username = $request->username;
        $password = $request->password;
        $kode ="AG-".rand('1000','9999');
    $this->validate($request, [
            'nama' => 'required|min:4',
            'nik' => 'required|min:4|unique:tbl_anggota,anggota_nik',
            'username' => 'required|min:4|unique:tbl_anggota,anggota_username',
            'password' => 'required|min:4',
            'kontak' => 'required|min:4',
            'kelamin' => 'required',
            'alamat' => 'required|min:4',
            'kerja' =>'required',
            'gaji' =>'required'
        ]);

       $data = new Anggota();
        $data->anggota_kode =$kode;
       $data->anggota_username =$username;
       $data->anggota_password = bcrypt($password);
       $data->anggota_nama = $nama;
       $data->anggota_nik = $nik;
       $data->anggota_kelamin = $kelamin;
       $data->anggota_alamat_ktp = $alamat_ktp;
       $data->anggota_tanggal_lahir = $tgl_lahir;
       $data->anggota_kontak = $kontak;
       $data->anggota_gaji =$request->gaji;
       $data->anggota_pekerjaan = $request->kerja;

       $data->status = 0;
       $data->save();

    //    $lastInsertedId= $data->anggota_id;

        
        return redirect('login/anggota')->with('alert-success','Tunggu verifikasi !!');

    }

    function cek_nik(){

    }

     function cek_username(){
        
    }


}
