<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_anggota', function (Blueprint $table) {
            $table->bigIncrements('anggota_id');
            $table->text('anggota_kode');
            $table->text('anggota_username');
            $table->text('anggota_password');
            $table->text('anggota_nik');
            $table->text('anggota_nama');
            $table->text('anggota_agama')->nullable();
            $table->text('anggota_kelamin');
            $table->text('anggota_tempat_lahir')->nullable();
            $table->date('anggota_tanggal_lahir')->nullable();
            $table->text('anggota_alamat_ktp')->nullable();
            $table->text('anggota_alamat_sekarang')->nullable();
            $table->text('anggota_kontak');
            $table->text('anggota_pekerjaan');
            $table->text('anggota_gaji');
            $table->text('lvl_pinjaman')->nullable();
            $table->text('foto')->nullable();
            $table->text('status_pinjaman')->nullable()->comment('0=tahap review,1=layak,2=tidak layak');
            $table->text('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_anggota');
    }
}
