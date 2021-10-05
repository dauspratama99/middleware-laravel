<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barangs')->insert([
            'barang_nama' => 'Lemari Jati Vanilla',
            'barang_merek' => 'Miyako',
            'barang_hargajual' => '500000',
            'barang_hargabeli' => '450000',
            'barang_stok' => '5',
            'barang_stokmin' => '3',
            'barang_pemasok_id' => '2',
            'barang_kategori_id' => '1',
            'barang_satuan_id' => '1',
            'barang_foto' => 'img',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('barangs')->insert([
            'barang_nama' => 'Bantal Lavender',
            'barang_merek' => 'Okoyama',
            'barang_hargajual' => '20000',
            'barang_hargabeli' => '15000',
            'barang_stok' => '9',
            'barang_stokmin' => '5',
            'barang_pemasok_id' => '1',
            'barang_kategori_id' => '1',
            'barang_satuan_id' => '2',
            'barang_foto' => 'img',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('barangs')->insert([
            'barang_nama' => 'Selimut Bulu Tebal',
            'barang_merek' => 'Pasea',
            'barang_hargajual' => '350000',
            'barang_hargabeli' => '280000',
            'barang_stok' => '4',
            'barang_stokmin' => '5',
            'barang_pemasok_id' => '3',
            'barang_kategori_id' => '2',
            'barang_satuan_id' => '1',
            'barang_foto' => 'img',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('barangs')->insert([
            'barang_nama' => 'Seprai Chanel',
            'barang_merek' => 'Corona',
            'barang_hargajual' => '70000',
            'barang_hargabeli' => '45000',
            'barang_stok' => '20',
            'barang_stokmin' => '20',
            'barang_pemasok_id' => '2',
            'barang_kategori_id' => '3',
            'barang_satuan_id' => '2',
            'barang_foto' => 'img',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
