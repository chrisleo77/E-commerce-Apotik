<?php

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
        DB::table('users')->insert(['name' => 'Admin', 'address' => 'Gg. Flora No. 211', 'role' => 'Admin', 'email' => 'admin@mail.com', 'password' => Hash::make('12345678')]);
        DB::table('users')->insert(['name' => 'Andrew Waluyo', 'address' => 'Gg. Ters. Pasir Koja No. 385', 'role' => 'User', 'email' => 'andrew@mail.com', 'password' => Hash::make('12345678')]);
        DB::table('users')->insert(['name' => 'Dewi Nasyidah', 'address' => 'Jr. Jayawijaya No. 560', 'role' => 'User', 'email' => 'dewi@mail.com', 'password' => Hash::make('12345678')]);
        DB::table('users')->insert(['name' => 'Irwan Gunarto', 'address' => 'Kpg. Bakau Griya Utama No. 643', 'role' => 'User', 'email' => 'irwan@mail.com', 'password' => Hash::make('12345678')]);
        DB::table('users')->insert(['name' => 'Rangga Prakasa', 'address' => 'Jr. Basudewo No. 462', 'role' => 'User', 'email' => 'rangga@mail.com', 'password' => Hash::make('12345678')]);
        DB::table('users')->insert(['name' => 'Seno Gunawan', 'address' => 'Jr. Raya ujungberung No. 340', 'role' => 'User', 'email' => 'seno@mail.com', 'password' => Hash::make('12345678')]);

    }
}
