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
            'password' => bcrypt('whoami00'),
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

        // DB::table('plans')->insert([
        //     'user_id' => '1',
        //     'destination_name' => 'Braga',
        //     'schedule' => '20 April 2022',
        //     'people' => 'Gerin, Bowo, Adik, Ibra',
        //     'items' => 'Tas, Buku, Laptop',
        //     'transportation' => 'Mobil',
        // ]);
        DB::table('destinations')->insert([
            'destination_name' => 'Tangkuban Parahu',
            'description' => 'Gunung dengan pemandangan indah serta beragam cerita di belakagnya, berada di daerah subang dengan suasana yang sangat sejuk untuk dinikmati',
            'city' => 'Bandung',
            'address' => 'Cikahuripan, Kecamatan Lembang, Kabupaten Bandung, Jawa Barat.',
            'price' => 30000,
            'facilities' => 'Parkir, WC',
            'image' => 'https://iili.io/h8XuTX.jpg'
        ]);
        DB::table('destinations')->insert([
            'destination_name' => 'Braga',
            'description' => 'Spot terbaik di Kota Bandung, dengan suasana kolonial yang terasa kental, cocok untuk anda yang ingin merasakan wisata kota di Kota Bandung',
            'city' => 'Bandung',
            'address' => 'Jl Braga',
            'price' => 0,
            'facilities' => 'Parkir, WC',
            'image' => 'https://iili.io/h8XIpt.jpg'
        ]);
    }
}
