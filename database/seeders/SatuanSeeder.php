<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('satuans')->insert([
            'satuan_nama' => 'Buah',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('satuans')->insert([
            'satuan_nama' => 'Pieces',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('satuans')->insert([
            'satuan_nama' => 'Set',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('satuans')->insert([
            'satuan_nama' => 'Hasta',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('satuans')->insert([
            'satuan_nama' => 'Papan',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('satuans')->insert([
            'satuan_nama' => 'Paket',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('satuans')->insert([
            'satuan_nama' => 'Box',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
