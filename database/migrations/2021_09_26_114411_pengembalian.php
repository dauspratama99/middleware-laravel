<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengembalian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table){
            $table->integer('id_pengembalian', 11)->autoIncrements();
            $table->integer('penjualan_faktur');
            $table->integer('pelanggan_id');
            $table->date('penjualan_tgl');
            $table->date('tglretur');
            $table->integer('barang_id');
            $table->float('jml');
            $table->text('descr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengembalians');
    }
}
