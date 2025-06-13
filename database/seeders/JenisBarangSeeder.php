<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_barang')->insert([
            ['Jenis_ID' => 'J001', 'Jenis_Barang' => 'Pertanian'],
            ['Jenis_ID' => 'J002', 'Jenis_Barang' => 'Perkebunan'],
        ]);
    }
}
