<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'kategori_nama' => 'Lemari',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('kategoris')->insert([
            'kategori_nama' => 'Meja',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('kategoris')->insert([
            'kategori_nama' => 'Kasur',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('kategoris')->insert([
            'kategori_nama' => 'Seprai',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('kategoris')->insert([
            'kategori_nama' => 'Bantal',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
