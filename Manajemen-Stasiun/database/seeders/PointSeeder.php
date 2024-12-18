<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('point')->insert([
            ['nama' => 'Stasiun Gambir', "longitude" => "106.845", "latitude" => "-6.175", 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Stasiun Bekasi', "longitude" => "106.845", "latitude" => "-6.175", 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Stasiun Bandung', "longitude" => "106.845", "latitude" => "-6.175", 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Stasiun Semarang Tawang', "longitude" => "106.845", "latitude" => "-6.175", 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Stasiun Surabaya Gubeng', "longitude" => "106.845", "latitude" => "-6.175", 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
