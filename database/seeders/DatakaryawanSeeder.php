<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatakaryawanSeeder extends Seeder
{
    public function run()
    {
        DB::table('datakaryawan')->insert([
            [
                'nik' => '0100-0002',
                'nama' => 'John Doe',
                'pangkat' => 'Manager',
                'divisi' => 'Sales',
                'dealer' => 'Dealer A',
                'posisi' => 'Sales Executive',
                'divisiho' => 'Divisi 1',
                'password' => bcrypt('password123'),
            ],
            // Tambahkan data karyawan lainnya di sini
        ]);
    }
}
