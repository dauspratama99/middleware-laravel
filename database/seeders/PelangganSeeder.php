<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggans')->insert([
            'pelanggan_nama' => 'Yve',
            'pelanggan_jenkel' => 'P',
            'pelanggan_nohp' => '111111111111',
            'pelanggan_alamat' => 'Land of Dawn',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('pelanggans')->insert([
            'pelanggan_nama' => 'Estes',
            'pelanggan_jenkel' => 'L',
            'pelanggan_nohp' => '111111111111',
            'pelanggan_alamat' => 'Land of Dawn',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('pelanggans')->insert([
            'pelanggan_nama' => 'Fanny',
            'pelanggan_jenkel' => 'P',
            'pelanggan_nohp' => '111111111111',
            'pelanggan_alamat' => 'Land of Dawn',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('pelanggans')->insert([
            'pelanggan_nama' => 'Gussion',
            'pelanggan_jenkel' => 'L',
            'pelanggan_nohp' => '111111111111',
            'pelanggan_alamat' => 'Land of Dawn',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('pelanggans')->insert([
            'pelanggan_nama' => 'Harith',
            'pelanggan_jenkel' => 'L',
            'pelanggan_nohp' => '111111111111',
            'pelanggan_alamat' => 'Land of Dawn',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('pelanggans')->insert([
            'pelanggan_nama' => 'Guinnevere',
            'pelanggan_jenkel' => 'P',
            'pelanggan_nohp' => '111111111111',
            'pelanggan_alamat' => 'Land of Dawn',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('pelanggans')->insert([
            'pelanggan_nama' => 'Hanzo',
            'pelanggan_jenkel' => 'L',
            'pelanggan_nohp' => '111111111111',
            'pelanggan_alamat' => 'Land of Dawn',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
