<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblKategoriPinjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tbl_kategori_pinjaman')){ 
            Schema::create('tbl_kategori_pinjaman', function (Blueprint $table) {
               $table->bigIncrements('kategori_id');
               $table->text('kategori_jenis');
               $table->text('kategori_besar_pinjaman');
               $table->text('kategori_lama_pinjaman');
               $table->text('kategori_besar_bunga');
               $table->text('kategori_angsuran')->nullable();
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
        Schema::dropIfExists('tbl_kategori_pinjaman');

    }
}
