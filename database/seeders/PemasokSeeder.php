<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PemasokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pemasoks')->insert([
            'pemasok_nama' => 'PT Bantal Berguling',
            'pemasok_telp' => '0987654321',
            'pemasok_alamat' => 'Bikini Bottom',
            'pemasok_desc' => 'Data ini hanyalah hoax belaka',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('pemasoks')->insert([
            'pemasok_nama' => 'CV Selimuti Kasur',
            'pemasok_telp' => '0123456789',
            'pemasok_alamat' => 'Land of Dawn',
            'pemasok_desc' => 'Data ini tidak benar',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('pemasoks')->insert([
            'pemasok_nama' => 'PT Masuk Lemari',
            'pemasok_telp' => '1231231234',
            'pemasok_alamat' => 'Underworld',
            'pemasok_desc' => 'ini adalah keterangan',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('pemasoks')->insert([
            'pemasok_nama' => 'PT Coba-coba',
            'pemasok_telp' => '435234212',
            'pemasok_alamat' => 'Langit ke 3',
            'pemasok_desc' => 'Data ini tidak bisa dipercaya',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('pemasoks')->insert([
            'pemasok_nama' => 'CV Kain',
            'pemasok_telp' => '5674255533',
            'pemasok_alamat' => 'Kebun Sutra',
            'pemasok_desc' => 'Produser kain',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
