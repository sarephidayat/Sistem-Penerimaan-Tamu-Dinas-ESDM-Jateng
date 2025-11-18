<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterJabatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('master_jabatan')->insert([

            // ======= Level Dinas =======
            ['id' => 1, 'nama_jabatan' => 'Kepala Dinas'],

            // ======= Sekretariat =======
            ['id' => 2, 'nama_jabatan' => 'Sekretaris'],
            ['id' => 3, 'nama_jabatan' => 'Kepala Sub Bagian Umum dan Kepegawaian'],
            ['id' => 4, 'nama_jabatan' => 'Kepala Sub Bagian Keuangan'],
            ['id' => 5, 'nama_jabatan' => 'Kepala Sub Bagian Perencanaan'],

            // ======= Bidang Geologi =======
            ['id' => 6, 'nama_jabatan' => 'Kepala Bidang Geologi'],
            ['id' => 7, 'nama_jabatan' => 'Kepala Seksi Vulkanologi'],
            ['id' => 8, 'nama_jabatan' => 'Kepala Seksi Air Tanah'],

            // ======= Bidang Mineral & Batubara =======
            ['id' => 9, 'nama_jabatan' => 'Kepala Bidang Mineral dan Batubara'],
            ['id' => 10, 'nama_jabatan' => 'Kepala Seksi Pengusahaan'],
            ['id' => 11, 'nama_jabatan' => 'Kepala Seksi Pengawasan'],

            // ======= Bidang Ketenagalistrikan =======
            ['id' => 12, 'nama_jabatan' => 'Kepala Bidang Ketenagalistrikan'],
            ['id' => 13, 'nama_jabatan' => 'Kepala Seksi Teknik Ketenagalistrikan'],
            ['id' => 14, 'nama_jabatan' => 'Kepala Seksi Pengawasan Teknik'],

            // ======= Bidang EBTKE =======
            ['id' => 15, 'nama_jabatan' => 'Kepala Bidang Energi Baru Terbarukan'],
            ['id' => 16, 'nama_jabatan' => 'Kepala Seksi Panas Bumi'],
            ['id' => 17, 'nama_jabatan' => 'Kepala Seksi Bioenergi'],

            // ======= Cabang-cabang =======
            // Template: Kepala Cabang, Kasubbag TU, Kasi Geologi, Kasi Energi
            ['id' => 18, 'nama_jabatan' => 'Kepala Cabang Kendeng Selatan'],
            ['id' => 19, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Kendeng Selatan'],
            ['id' => 20, 'nama_jabatan' => 'Kepala Seksi Geologi Kendeng Selatan'],
            ['id' => 21, 'nama_jabatan' => 'Kepala Seksi Energi Kendeng Selatan'],

            ['id' => 22, 'nama_jabatan' => 'Kepala Cabang Semarang - Demak'],
            ['id' => 23, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Semarang - Demak'],
            ['id' => 24, 'nama_jabatan' => 'Kepala Seksi Geologi Semarang - Demak'],
            ['id' => 25, 'nama_jabatan' => 'Kepala Seksi Energi Semarang - Demak'],

            ['id' => 26, 'nama_jabatan' => 'Kepala Cabang Ungaran - Telomoyo'],
            ['id' => 27, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Ungaran - Telomoyo'],
            ['id' => 28, 'nama_jabatan' => 'Kepala Seksi Geologi Ungaran - Telomoyo'],
            ['id' => 29, 'nama_jabatan' => 'Kepala Seksi Energi Ungaran - Telomoyo'],

            ['id' => 30, 'nama_jabatan' => 'Kepala Cabang Solo'],
            ['id' => 31, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Solo'],
            ['id' => 32, 'nama_jabatan' => 'Kepala Seksi Geologi Solo'],
            ['id' => 33, 'nama_jabatan' => 'Kepala Seksi Energi Solo'],

            ['id' => 34, 'nama_jabatan' => 'Kepala Cabang Merapi'],
            ['id' => 35, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Merapi'],
            ['id' => 36, 'nama_jabatan' => 'Kepala Seksi Geologi Merapi'],
            ['id' => 37, 'nama_jabatan' => 'Kepala Seksi Energi Merapi'],

            ['id' => 38, 'nama_jabatan' => 'Kepala Cabang Serayu Selatan'],
            ['id' => 39, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Serayu Selatan'],
            ['id' => 40, 'nama_jabatan' => 'Kepala Seksi Geologi Serayu Selatan'],
            ['id' => 41, 'nama_jabatan' => 'Kepala Seksi Energi Serayu Selatan'],

            ['id' => 42, 'nama_jabatan' => 'Kepala Cabang Serayu Tengah'],
            ['id' => 43, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Serayu Tengah'],
            ['id' => 44, 'nama_jabatan' => 'Kepala Seksi Geologi Serayu Tengah'],
            ['id' => 45, 'nama_jabatan' => 'Kepala Seksi Energi Serayu Tengah'],

            ['id' => 46, 'nama_jabatan' => 'Kepala Cabang Slamet Selatan'],
            ['id' => 47, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Slamet Selatan'],
            ['id' => 48, 'nama_jabatan' => 'Kepala Seksi Geologi Slamet Selatan'],
            ['id' => 49, 'nama_jabatan' => 'Kepala Seksi Energi Slamet Selatan'],

            ['id' => 50, 'nama_jabatan' => 'Kepala Cabang Slamet Utara'],
            ['id' => 51, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Slamet Utara'],
            ['id' => 52, 'nama_jabatan' => 'Kepala Seksi Geologi Slamet Utara'],
            ['id' => 53, 'nama_jabatan' => 'Kepala Seksi Energi Slamet Utara'],

            ['id' => 54, 'nama_jabatan' => 'Kepala Cabang Serayu Utara'],
            ['id' => 55, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Serayu Utara'],
            ['id' => 56, 'nama_jabatan' => 'Kepala Seksi Geologi Serayu Utara'],
            ['id' => 57, 'nama_jabatan' => 'Kepala Seksi Energi Serayu Utara'],

            ['id' => 58, 'nama_jabatan' => 'Kepala Cabang Sewu Lawu'],
            ['id' => 59, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha Sewu Lawu'],
            ['id' => 60, 'nama_jabatan' => 'Kepala Seksi Geologi Sewu Lawu'],
            ['id' => 61, 'nama_jabatan' => 'Kepala Seksi Energi Sewu Lawu'],

            // ======= UPT LAB =======
            ['id' => 62, 'nama_jabatan' => 'Kepala UPT Lab'],
            ['id' => 63, 'nama_jabatan' => 'Kepala Sub Bagian Tata Usaha UPT Lab'],
            ['id' => 64, 'nama_jabatan' => 'Kepala Seksi Layanan Pengujian UPT Lab'],
            ['id' => 65, 'nama_jabatan' => 'Kepala Seksi Peralatan UPT Lab'],
        ]);
    }
}
