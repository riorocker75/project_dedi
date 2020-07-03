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
            'nik' => 'required|max:16|unique:tbl_anggota,anggota_nik,'.$id.',anggota_id',
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
      
        return redirect('anggota/data-pribadi/'.$id.'')->with('alert-success','Data telah diperbaharui');
    }

    // mulai pinjam
    function data_pinjam($id){
        $data= Pinjaman::where('anggota_id', $id)->get();

        return view('anggota.data_pinjam',[
            'data_pinjam'=> $data
        ]);
    }

    function aju_pinjam(){
        $data_catpj=Cat_Pinjaman::all();
        return view('anggota.aju_pinjam' ,['cat_pinjam' => $data_catpj]);
    }

    function aju_pinjam_act(Request $request){
        $id= Session::get('ang_id');
        $nominal =$request->jlh_pinjam;
        $angsur =$request->lama_angsur;
        $rand="PNJ-".rand('1000','9999');
        $jas=Cat_Pinjaman::where('kategori_id',$angsur)->first();

        // hitung logika skema
        $bunga=$jas->kategori_besar_bunga/100;
        
        $cicilan=$nominal/$jas->kategori_lama_pinjaman;
        $per_bunga=($nominal*$bunga) /$jas->kategori_lama_pinjaman;

        $total_cicil=$cicilan+$per_bunga;

        $date=date('Y-m-d');
        $this->validate($request,[
            'jlh_pinjam' => 'required|min:2',
            'lama_angsur' => 'required',
        ]);
        Pinjaman::create([
            'anggota_id' => Session::get('ang_id'),
            'pinjaman_kode' =>$rand,
            'pinjaman_tgl'=> $date,
            'pinjaman_jumlah'=> $nominal,
            'pinjaman_skema_angsuran' => $total_cicil,
            'pinjaman_bunga' => $jas->kategori_besar_bunga,
            'pinjaman_angsuran_lama' => $jas->kategori_lama_pinjaman,
            'pinjaman_status' => 0 
        ]);
        return redirect('anggota/data-pinjaman/'.$id.'')->with('alert-success','Pinjaman sudah dikirim, Mohon menuggu verifikasi !!');

    }

    function cek_angsuran(Request $request){
        $nominal = $request->nominal;
        $angsur =$request->angsur;
        $jas=Cat_Pinjaman::where('kategori_id',$angsur)->first();
        $bunga=$jas->kategori_besar_bunga/100;
        
        $cicilan=$nominal/$jas->kategori_lama_pinjaman;
        $per_bunga=($nominal*$bunga) /$jas->kategori_lama_pinjaman;

        $total_cicil=$cicilan+$per_bunga;

        if($nominal > $jas->kategori_besar_pinjaman){
            echo "Anda melewati limit, harap isi sesuai limit";
        }else{
            $hx=round($total_cicil,2);
            return "Rp.&nbsp;".number_format($hx)."/bulan";
        }
    }


}
