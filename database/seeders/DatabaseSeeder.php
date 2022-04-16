<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Gerin Aryo Prasetia',
            'email' => 'gerinaryo14@gmail.com',
            'password' => bcrypt('1234'),
            'location' => 'Bandung',
            'age' => 12,
            'role' => 'user'
        ]);

        DB::table('admins')->insert([
            'name' => 'Joko',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);
    }
}
