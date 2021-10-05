<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penjualan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table){
            $table->integer('faktur', 11)->autoIncrements();
            $table->date('tgl');
            $table->integer('pelanggan_id');
            $table->string('status', 20);
            $table->double('tharga');
            $table->double('tbayar');
            $table->double('tkembali');
            $table->string('descr');
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
        Schema::dropIfExists('penjualans');
    }
}
