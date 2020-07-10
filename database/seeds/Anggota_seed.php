<?php

use Illuminate\Database\Seeder;
use App\Model\Anggota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Anggota_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('tbl_anggota')->delete();
        Anggota::create([
            'anggota_id' => 1,
            'anggota_kode' => "AG-827",
            'anggota_username' => "anggota",
            'anggota_password' => bcrypt("anggota"),
            'anggota_nik' => 9900292828,
            'anggota_nama'=>"Dedi",
            'anggota_kelamin'=>"laki-laki",
            'anggota_tempat_lahir'=>"Hagu Barat Laut",
            'anggota_tanggal_lahir' => "1986-06-30",
            'anggota_alamat_ktp' => "Hagu Barat Laut",
            'anggota_alamat_sekarang' => "Hagu Barat Laut",
            'anggota_kontak' => "082272242022",
            'anggota_pekerjaan' => "1",
            'anggota_gaji' => "50000000",

            'status' => 3,
            'foto' => "" 

        ]);
        Anggota::create([
            'anggota_id' => 3,
            'anggota_kode' => "AG-341",
            'anggota_username' => "sumail",
            'anggota_password' => bcrypt("sumail"),
            'anggota_nik' => 9900292567,
            'anggota_nama'=>"Sumail",
            'anggota_kelamin'=>"laki-laki",
            'anggota_tempat_lahir'=>"Hagu Barat Laut",
            'anggota_tanggal_lahir' => "1996-06-30",
            'anggota_alamat_ktp' => "Hagu Barat Laut",
            'anggota_alamat_sekarang' => "Hagu Barat Laut",
            'anggota_kontak' => "082272242022",
            'anggota_pekerjaan' => "1",
            'anggota_gaji' => "70000000",

            'status' => 3,
            'foto' => "" 
        ]);

    }
    
}
