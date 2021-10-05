<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Barang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table){
            $table-integer('id', 11)->autoIncrements();
            $table->string('nama', 30);
            $table->string('merek', 30);
            $table->double('hargajual');
            $table->double('hargabeli');
            $table->float('stok');
            $table->float('stokmin');
            $table->integer('pemasok_id');
            $table->integer('kategori_id');
            $table->integer('satuan_id');
            $table->string('foto', 255);
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
        Schema::dropIfExists('barangs');
    }
}
