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
        if(!Schema::hasTable('tbl_pinjaman')){ 
            Schema::create('tbl_pinjaman', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('anggota_id');
                $table->text('pinjaman_kode');
                $table->dateTime('pinjaman_aju');
                $table->dateTime('pinjaman_tgl');
                $table->text('pinjaman_jumlah');
                $table->text('pinjaman_skema_angsuran');
                $table->text('pinjaman_bunga');
                $table->text('pinjaman_angsuran_lama');
                $table->text('pinjaman_ket')->nullable();
                $table->text('ket_usaha')->nullable();
                $table->text('alamat_usaha')->nullable();
                $table->text('nisbah_koperasi')->nullable();
                $table->text('nisbah_anggota')->nullable();

                $table->text('pinjaman_status')->comment('0=masih diajukan,1=disetujui operator,2=ditolak operator');

            });
        }
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
