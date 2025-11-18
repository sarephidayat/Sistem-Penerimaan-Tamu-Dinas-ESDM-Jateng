<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterNamaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('master_nama')->insert([

            // Dinas (1)
            ['nama' => 'Agus Sugiharto, S.T., M.T.', 'id_bidang' => 1],

            // Sekretariat (2)
            ['nama' => 'Endro Hudiyono, S.T.', 'id_bidang' => 2],
            ['nama' => 'M. Zainul Muhtarom, S.T.', 'id_bidang' => 2],

            // Bidang Geologi dan Air Tanah (3)
            ['nama' => 'Heru Sugiharto, S.T., M.T.', 'id_bidang' => 3],
            ['nama' => 'Hadi Susanto, S.T.', 'id_bidang' => 3],

            // Bidang Mineral dan Batubara (4)
            ['nama' => 'Agus Azis, S.T., M.Si.', 'id_bidang' => 4],

            // Bidang Ketenagalistrikan (5)
            ['nama' => 'Suhardi, S.T., M.Si.', 'id_bidang' => 5],
            ['nama' => 'Sigit Widiadi, S.T., M.S.', 'id_bidang' => 5],

            // Bidang Energi Baru Terbarukan (6)
            ['nama' => 'Diah Ayu Ratna Sari, S.T.', 'id_bidang' => 6],
            ['nama' => 'Sinung Sugeng Arianto, S.T.', 'id_bidang' => 6],

            // Cabang Kendeng Selatan (7)
            ['nama' => 'Dwi Suryono, S.T., M.T.', 'id_bidang' => 7],
            ['nama' => 'Suyatmi, S.H., M.M.', 'id_bidang' => 7],
            ['nama' => 'Archibald Anugroho Nagel, S.T., M.Eng', 'id_bidang' => 7],
            ['nama' => '—', 'id_bidang' => 7], // posisi kosong (Kepala Seksi Energi)

            // Cabang Kendeng Muria (8)
            ['nama' => 'Hery Kurniawan, S.T.', 'id_bidang' => 8],
            ['nama' => 'Eko Budi Susanto, S.T.', 'id_bidang' => 8],
            ['nama' => 'Budiyanto, S.T.', 'id_bidang' => 8],

            // Cabang Semarang–Demak (9)
            ['nama' => 'Tyas Andajani, S.T.', 'id_bidang' => 9],
            ['nama' => 'Moh Taufiq, S.T.', 'id_bidang' => 9],
            ['nama' => 'Yan Herwindo Arita, S.T.', 'id_bidang' => 9],

            // Cabang Ungaran–Telomoyo (10)
            ['nama' => 'Rival Gautama, S.T., M.T.', 'id_bidang' => 10],
            ['nama' => 'Ari Widayanto, S.T., M.Si.', 'id_bidang' => 10],
            ['nama' => 'Ardhiatma Rista Rinanda, S.T., M.Sc.', 'id_bidang' => 10],
            ['nama' => 'Susanto, S.T.', 'id_bidang' => 10],

            // Cabang Solo (11)
            ['nama' => 'Abdul Charis, S.H., M.H.', 'id_bidang' => 11],
            ['nama' => 'Puguh Dwi Hartanto, S.T.', 'id_bidang' => 11],
            ['nama' => 'Heri Subekti, S.T.', 'id_bidang' => 11],
            ['nama' => 'Taufan Riza Pahlevi, S.T.', 'id_bidang' => 11],

            // Cabang Merapi (12)
            ['nama' => 'Irwan Edhie Kuntjoro, S.T., M.T.', 'id_bidang' => 12],
            ['nama' => 'Hery Kurniawan, S.T.', 'id_bidang' => 12],
            ['nama' => 'Eko Budi Susanto, S.T.', 'id_bidang' => 12],
            ['nama' => 'Budiyanto, S.T.', 'id_bidang' => 12],

            // Cabang Serayu Selatan (13)
            ['nama' => 'Panut Priyanto, S.T., M.T.', 'id_bidang' => 13],
            ['nama' => 'Dwi Catur Apriliani, S.T.', 'id_bidang' => 13],
            ['nama' => 'Marlin Evalia, S.T.', 'id_bidang' => 13],
            ['nama' => 'Ayu Septiana, S.T.', 'id_bidang' => 13],

            // Cabang Serayu Tengah (14)
            ['nama' => 'Yohanes Pambudi Hadi, S.T., M.Si.', 'id_bidang' => 14],
            ['nama' => 'Ridwan Rulianto Sandarunaika P.', 'id_bidang' => 14],
            ['nama' => 'Taufiq Widayanto, S.T.', 'id_bidang' => 14],
            ['nama' => 'Sigit Widiadi, S.T., M.S.', 'id_bidang' => 14],

            // Cabang Slamet Selatan (15)
            ['nama' => 'Mahendra Dwiatmoko, S.E.', 'id_bidang' => 15],
            ['nama' => 'Wara Hesti Utami, S.Sos.', 'id_bidang' => 15],
            ['nama' => 'Dwiana Nurariyanto, S.T.', 'id_bidang' => 15],
            ['nama' => 'Saptono Purwo Pranggoro, S.T., M.T.', 'id_bidang' => 15],

            // Cabang Slamet Utara (16)
            ['nama' => 'Ipong Hartanto, S.E., M.Si.', 'id_bidang' => 16],
            ['nama' => '—', 'id_bidang' => 16],
            ['nama' => 'Mahbub Junaedi, S.T., M.T.', 'id_bidang' => 16],
            ['nama' => 'Risdianto, S.T., M.Si.', 'id_bidang' => 16],

            // Cabang Serayu Utara (17)
            ['nama' => 'Agus Dwi Ibnu Wibowo, S.', 'id_bidang' => 17],
            ['nama' => 'Asrianto, A.P., M.Si.', 'id_bidang' => 17],
            ['nama' => 'Andrian Mayka Ariawan, S.T., M.En.', 'id_bidang' => 17],
            ['nama' => 'Tunggul Purwono Ade', 'id_bidang' => 17],

            // Cabang Sewu Lawu (18)
            ['nama' => 'Budi Setiyawan, S.T.', 'id_bidang' => 18],
            ['nama' => 'Bambang Pamungkas, S.P.', 'id_bidang' => 18],
            ['nama' => 'Yulianto, S.T., M.T.', 'id_bidang' => 18],
            ['nama' => 'Ir. Siti Nurul Chusnah, M.T.', 'id_bidang' => 18],

            // UPT Laboratorium ESDM (19)
            ['nama' => 'Mashfufah, S.T.', 'id_bidang' => 19],
            ['nama' => 'Usri Batianik, S.Sos.', 'id_bidang' => 19],
            ['nama' => 'Thomas Teguh Pristiwanto, S.T., M.T.', 'id_bidang' => 19],
            ['nama' => 'Fery Yunita, S.T., M.M.', 'id_bidang' => 19],
        ]);
    }
}
