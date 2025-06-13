<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            ['Barang_ID' => 'B001', 'Nama_Barang' => 'Urea', 'Jenis_ID' => 'J001', 'Harga' => 50000],
            ['Barang_ID' => 'B002', 'Nama_Barang' => 'KCL', 'Jenis_ID' => 'J002', 'Harga' => 60000],
            ['Barang_ID' => 'B003', 'Nama_Barang' => 'ZA', 'Jenis_ID' => 'J001', 'Harga' => 45000],
            ['Barang_ID' => 'B004', 'Nama_Barang' => 'SP-36', 'Jenis_ID' => 'J002', 'Harga' => 70000],
        ]);
    }
}
