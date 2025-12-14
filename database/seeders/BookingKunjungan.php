<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingKunjungan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('booking_kunjungan')->insert([
            [
                'nama_lengkap' => 'Rizky Pratama',
                'nik' => '3374101201990001',
                'email' => 'rizky@mail.com',
                'no_hp' => '081234567890',
                'instansi' => 'PT Energi Nusantara',
                'id_bidang' => 1,
                'keperluan' => 'Permohonan konsultasi perizinan',
                'tanggal_kunjungan' => Carbon::now()->addDays(2),
                'jam_kunjungan' => '10:00:00',
                'id_status' => 1, // Menunggu Konfirmasi
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
