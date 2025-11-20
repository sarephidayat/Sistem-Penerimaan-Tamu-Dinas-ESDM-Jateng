<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterStatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('master_status')->insert([
            [
                'nama_status' => 'Menunggu',
            ],
            [
                'nama_status' => 'Disetujui',
            ],
            [
                'nama_status' => 'Ditolak',
            ],
            [
                'nama_status' => 'Check-out',
            ],
        ]);
    }
}
