<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_transaksi')->insert([
            ['Transaksi_ID' => 'T001', 'Barang_ID' => 'B001', 'Jumlah' => 10, 'Stok' => 100, 'Total' => 500000],
            ['Transaksi_ID' => 'T001', 'Barang_ID' => 'B002', 'Jumlah' => 5, 'Stok' => 200, 'Total' => 300000],
            ['Transaksi_ID' => 'T002', 'Barang_ID' => 'B003', 'Jumlah' => 20, 'Stok' => 150, 'Total' => 900000],
            ['Transaksi_ID' => 'T003', 'Barang_ID' => 'B004', 'Jumlah' => 15, 'Stok' => 50, 'Total' => 1050000],
        ]);
    }
}
