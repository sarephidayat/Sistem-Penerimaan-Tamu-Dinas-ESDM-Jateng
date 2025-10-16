<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dosen')->insert([
            'nidn' => '100001',
            'nama_dosen' => 'Heri',
            'jenkel_dosen' => 'Pria',
            'alamat_dosen' => 'Entah',
        ]);

    }
}
