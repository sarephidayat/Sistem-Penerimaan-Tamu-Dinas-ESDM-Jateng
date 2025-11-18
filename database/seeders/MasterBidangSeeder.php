<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MasterBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_bidang')->insert([
            ['nama_bidang' => 'Dinas'],
            ['nama_bidang' => 'Sekretariat'],
            ['nama_bidang' => 'Bidang Geologi dan Air Tanah'],
            ['nama_bidang' => 'Bidang Mineral dan Batubara'],
            ['nama_bidang' => 'Bidang Ketenagalistrikan'],
            ['nama_bidang' => 'Bidang Energi Baru Terbarukan'],

            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Kendeng Selatan'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Kendeng Muria'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Semarang Demak'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Ungaran-Telomoyo'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Solo'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Merapi'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Serayu Selatan'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Serayu Tengah'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Slamet Selatan'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Slamet Utara'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Serayu Utara'],
            ['nama_bidang' => 'Cabang Dinas ESDM Wilayah Sewu Lawu'],

            ['nama_bidang' => 'UPT Laboratorium ESDM'],
        ]);
    }
}
