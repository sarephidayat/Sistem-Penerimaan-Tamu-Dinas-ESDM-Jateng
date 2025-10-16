<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mahasiswa')->insert([
            'nim' => '1911010001',
            'nama' => 'Hery',
            'jenis_kelamin' => 'Pria',
            'kota_kelahiran' => 'Entah',
            'tanggal_kelahiran' => '1990-01-01',
            'alamat' => 'Entah',
            'program_studi' => 'Teknik Informatika',
            'tahun_masuk' => '2019',
        ]);

    }
}
