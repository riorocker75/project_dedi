<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPinjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pinjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('anggota_id');
            $table->text('pinjaman_kode');
            $table->dateTime('pinjaman_tgl');
            $table->text('pinjaman_jumlah');
            $table->text('pinjaman_skema_angsuran');
            $table->text('pinjman_bunga');
            $table->text('pinjaman_angsuran_lama');
            $table->text('pinjaman_status')->comment('0=masih diajukan,1=disetujui operator,2=ditolak operator,3=disetujui admin,4=ditolak admin');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_pinjaman');
    }
}