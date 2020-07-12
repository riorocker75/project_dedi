<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSimpanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            if(!Schema::hasTable('tbl_simpanan')){ 
            Schema::create('tbl_simpanan', function (Blueprint $table) {
                $table->bigIncrements('simpanan_id');
                $table->text('kode_rekening');
                $table->text('anggota_id');
                $table->text('total_simpanan');
                $table->text('kategori_simpanan');
                
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
        Schema::dropIfExists('tbl_simpanan');
    }
}
