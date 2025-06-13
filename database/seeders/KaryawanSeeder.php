<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawan')->insert([
            ['Karyawan_ID' => 'K001', 'Nama_Karyawan' => 'Kar', 'Gender' => 'L'],
            ['Karyawan_ID' => 'K002', 'Nama_Karyawan' => 'Kir', 'Gender' => 'P'],
            ['Karyawan_ID' => 'K003', 'Nama_Karyawan' => 'Kur', 'Gender' => 'L'],
        ]);
    }
}
