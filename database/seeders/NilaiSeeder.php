<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('nilai')->insert([
            'nim' => '1911010001',
            'kode_matkul' => '111',
            'semester' => 3,
            'nilai' => 90,
        ]);

    }
}
