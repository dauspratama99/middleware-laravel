<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(KategoriSeeder::class);
        // $this->call(PelangganSeeder::class);
        // $this->call(SatuanSeeder::class);
        // $this->call(PemasokSeeder::class);
        $this->call(BarangSeeder::class);
    }
}
