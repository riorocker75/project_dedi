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
use App\Model\Anggota;
use App\Model\Operator;
use App\Model\Pinjaman;


use App\Model\Simpanan;
use App\Model\Simpanan\TransaksiSimpananLain;
use App\Model\PinjamanTransaksi;
use App\Model\SimpananTransaksi;

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

	function detail_anggota($id){
		$data= Anggota::where('anggota_id',$id)->get();
		return view('admin.v_anggota_edit',[
			'data' =>$data
		]);
	}

	function tambah_anggota(){
		return view('admin.v_anggota_tambah');
	}

	function tambah_anggota_act(Request $request){
		$nik = $request->nik;
        $nama = $request->nama;
        $kelamin = $request->kelamin;
        $alamat_ktp = $request->alamat;
        $kontak = $request->kontak;
        $tgl_lahir = $request->tgl_lahir;
        $username = $request->username;
        $password = $request->password;
		$kode ="AG-".rand('1000','9999');
		$date=date('Y-m-d');
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
       $data->anggota_tempat_lahir =$request->tempat_lahir;
       $data->anggota_kontak = $kontak;
       $data->anggota_gaji =$request->gaji;
       $data->anggota_pekerjaan = $request->kerja;
       $data->status_pinjaman =$request->status_pinjaman;
	   $data->tgl_gabung =$date;
	   $data->suami_istri=$request->suami_istri;

	   $data->status_simpanan=0;
	   $data->status_deposit=0;
	   $data->status_umroh=0;
	   $data->status_pendidikan=0;



       $data->status = 1;
       $data->save();

    //    $lastInsertedId= $data->anggota_id;

        return redirect('/dashboard/admin/anggota')->with('alert-success','Data telah disimpan');
	}


	function update_anggota(Request $request,$id){
		$nik = $request->nik;
        $nama = $request->nama;
        $alamat_ktp = $request->alamat_ktp;
        $kontak = $request->kontak;
        $tgl_lahir = $request->tanggal_lahir;
        $username = $request->username;
		$password = $request->password;
		
		$this->validate($request, [
            'nama' => 'required|min:4',
            'nik' => 'required|min:4|unique:tbl_anggota,anggota_nik,'.$nik.',anggota_nik',
            'username' => 'required|min:4|unique:tbl_anggota,anggota_username,'.$username.',anggota_username',
            'kontak' => 'required|min:4',
            'alamat_ktp' => 'required|min:4',
            'gaji' =>'required'
		]);
		
		Anggota::where('anggota_id',$id)->update([
			'anggota_nama' =>$nama,
			'anggota_nik' => $nik,
			'anggota_username' =>$username,
			'anggota_tanggal_lahir' =>$tgl_lahir,
			'anggota_tempat_lahir' =>$request->tempat_lahir,
			'anggota_alamat_ktp' =>$alamat_ktp,
			'anggota_alamat_sekarang' => $request->alamat_sekarang,
			'anggota_kontak' =>$kontak,
			'anggota_pekerjaan' =>$request->pekerjaan,
			'anggota_gaji' =>$request->gaji,
			'suami_istri' =>$request->suami_istri,
			'status_pinjaman' =>$request->status_pinjaman
		]);

		if($request->password != ""){
			$this->validate($request, [
				'password' => 'min:4'
			]);
			Anggota::where('anggota_id',$id)->update([
				'anggota_password' =>bcrypt($password)
			]);
		}	

        return redirect('/admin/detail/anggota/'.$id)->with('alert-success','Data telah dirubah');

	}

	function hapus_anggota($id){
		Anggota::where('anggota_id',$id)->delete();
        return redirect('/dashboard/admin/anggota')->with('alert-danger','Data telah dihapus');
	}





}
