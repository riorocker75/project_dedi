<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSimpananTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tbl_simpanan_transaksi')){ 
            Schema::create('tbl_simpanan_transaksi', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->text('anggota_id');
                $table->text('kode_rekening');
                $table->text('operator_id')->nullable();
                $table->text('jumlah_transaksi');
                $table->dateTime('tgl_transaksi');
                $table->text('jenis_transaksi')->nullable();
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
        Schema::dropIfExists('tbl_simpanan_transaksi');

    }
}
