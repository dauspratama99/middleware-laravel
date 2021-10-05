<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_name' => 'Admin',
            'user_uname' => 'Dummy',
            'user_password' => 'admin123',
            'user_status' => 'Admin',
            'user_foto' => 'dsdsdsds',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'user_name' => 'User',
            'user_uname' => 'Dummy2',
            'user_password' => 'user123',
            'user_status' => 'User',
            'user_foto' => 'dsdsdsds',
            'created_at' => \Carbon\Carbon::now(),
        ]);
        DB::table('users')->insert([
            'user_name' => 'Pemilik',
            'user_uname' => 'Dummy3',
            'user_password' => 'pemilik123',
            'user_status' => 'Pemilik',
            'user_foto' => 'dsdsdsds',
            'created_at' => \Carbon\Carbon::now(),
        ]);
    }
}
