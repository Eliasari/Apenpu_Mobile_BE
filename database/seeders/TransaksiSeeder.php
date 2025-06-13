<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transaksi')->insert([
            ['Transaksi_ID' => 'T001', 'Tanggal_Transaksi' => '2024-11-27', 'Customer_ID' => 'C001', 'Karyawan_ID' => 'K001'],
            ['Transaksi_ID' => 'T002', 'Tanggal_Transaksi' => '2024-11-28', 'Customer_ID' => 'C002', 'Karyawan_ID' => 'K002'],
            ['Transaksi_ID' => 'T003', 'Tanggal_Transaksi' => '2024-11-29', 'Customer_ID' => 'C003', 'Karyawan_ID' => 'K003'],
        ]);
    }
}
