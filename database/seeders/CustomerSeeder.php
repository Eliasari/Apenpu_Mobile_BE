<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer')->insert([
            [
                'Customer_ID' => 1,
                'nama_customer' => 'yosia',
                'email' => 'yosia@example.com',
                'password' => Hash::make('password'),
                'no_pembeli' => '081234567890',
                'alamat' => 'Jl. Mawar No. 123, Jakarta',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
