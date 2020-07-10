<?php

use Illuminate\Database\Seeder;
use App\Model\Pekerjaan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Pekerjaan_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_pekerjaan')->delete();
        Pekerjaan::create([
            'id' => 1,
            'pekerjaan' => "Pegawai Negeri Sipil (PNS)"

        ]);
    }
}
