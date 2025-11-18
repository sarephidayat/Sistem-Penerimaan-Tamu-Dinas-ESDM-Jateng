<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserPegawaiSeeder extends Seeder
{
    /**
     * Helper untuk membuat array pegawai.
     * membersihkan nip (hapus semua non-digit)
     */
    private function pegawai(string $nama, int $id_bidang, int $id_jabatan, string $nip_raw): array
    {
        // hapus semua karakter bukan digit (bersihkan spasi, tanda, dsb)
        $nip = preg_replace('/\D+/', '', $nip_raw) ?: '0000';

        return [
            'nama_pegawai' => $nama,
            'id_bidang' => $id_bidang,
            'id_jabatan' => $id_jabatan,
            'nip' => $nip,
            'username' => $nip,
            'password' => Hash::make($nip),
        ];
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_pegawai')->insert([

            // ===== 1. DINAS =====
            $this->pegawai('Agus Sugiharto, S.T., M.T.', 1, 1, '19710416 199803 1 010'),

            // ===== 2. SEKRETARIAT =====
            $this->pegawai('Endro Hudiyono, S.T.', 2, 2, '19760519 1904121001'),
            $this->pegawai('M. Zainul Muhtarom, S.T.', 2, 3, '19761023 201001 1008'), // Kasubag (Sekretariat)

            // ===== 3. Bidang Geologi & Air Tanah =====
            $this->pegawai('Heru Sugiharto, S.T., M.T.', 3, 6, '19690410 199803 1 010'), // Kepala Bidang Geologi
            $this->pegawai('Hadi Susanto, S.T.', 3, 8, '19850518 2011011 004'), // Kepala Seksi Air Tanah

            // ===== 4. Bidang Mineral & Batubara =====
            $this->pegawai('Agus Azis, S.T., M.Si.', 4, 10, '19710218 2006041002'), // Kasi Pengusahaan (Mineral)

            // ===== 5. Bidang Ketenagalistrikan =====
            $this->pegawai('Suhardi, S.T., M.Si.', 5, 12, '19700602 199603 1 004'), // Kepala Bidang Ketenagalistrikan

            // ===== 6. Bidang EBT =====
            $this->pegawai('Diah Ayu Ratna Sari, S.T.', 6, 15, '19870536 2009-03 2009'), // Kepala Bidang EBT
            $this->pegawai('Sinung Sugeng Arianto, S.T.', 6, 16, '19731002 2003121002'), // Kasi Panas Bumi (EBT)

            // ===== 7. Cabang Kendeng Selatan ===== (pola: 18..21)
            $this->pegawai('Dwi Suryono, S.T., M.T.', 7, 18, '19781102 200312 1 007'), // Kepala Cabang Kendeng Selatan
            $this->pegawai('Suyatmi, S.H., M.M.', 7, 19, '19690607 1990122 001'), // Kasubag TU Kendeng Selatan
            $this->pegawai('Archibald Anugroho Nagel, S.T., M.Eng', 7, 20, '19850124 2009031007'), // Kasi Geologi Kendeng Selatan

            // ===== 9. Cabang Semarang–Demak ===== (22..25)
            $this->pegawai('Tyas Andajani, S.T.', 9, 22, '19720125 199703 2 003'), // Kepala Cabang Semarang - Demak
            $this->pegawai('Moh Taufiq, S.T.', 9, 23, '19780312 2006041001'), // Kasubag TU Semarang - Demak
            $this->pegawai('Yan Herwindo Arita, S.T.', 9, 25, '19721014 200604'), // Kasi Energi Semarang - Demak

            // ===== 10. Cabang Ungaran–Telomoyo ===== (26..29)
            $this->pegawai('Rival Gautama, S.T., M.T.', 10, 26, '19751001 199903 1 002'), // Kepala Cabang Ungaran - Telomoyo
            $this->pegawai('Ari Widayanto, S.T., M.Si.', 10, 27, '19710526 2006041011'), // Kasubag TU Ungaran - Telomoyo
            $this->pegawai('Ardhiatma Rista Rinanda, S.T., M.Sc.', 10, 28, '19860818 2011011012'), // Kasi Geologi Ungaran - Telomoyo
            $this->pegawai('Susanto, S.T.', 10, 29, '19790131 2009031002'), // Kasi Energi Ungaran - Telomoyo

            // ===== 11. Cabang Solo ===== (30..33)
            $this->pegawai('Abdul Charis, S.H, M.H.', 11, 30, '19720525 199103 1 004'), // Kepala Cabang Solo
            $this->pegawai('Puguh Dwi Hartanto, S.T', 11, 31, '19740414 200501 1008'), // Kasubag TU Solo
            $this->pegawai('Heri Subekti, S.T.', 11, 32, '19820922 2010011013'), // Kasi Geologi Solo
            $this->pegawai('Taufan Riza Pahlevi, S.T.', 11, 33, '19720413 2006041005'), // Kasi Energi Solo

            // ===== 12. Cabang Merapi ===== (34..37)
            $this->pegawai('Hery Kurniawan, S.T.', 12, 35, '19790428 2011011005'), // Kasubag TU Merapi
            $this->pegawai('Eko Budi Susanto, S.T.', 12, 36, '19800115 2006041009'), // Kasi Geologi Merapi
            $this->pegawai('Budiyanto, S.T.', 12, 37, '19840305 2010011016'), // Kasi Energi Merapi

            // ===== 13. Cabang Serayu Selatan ===== (38..41)
            $this->pegawai('Panut Priyanto, S.T.,M.T.', 13, 38, '19720507 199803 1 006'), // Kepala Cabang Serayu Selatan
            $this->pegawai('Dwi Catur Apriliani, S.T', 13, 39, '19810424 2010012021'), // Kasubag TU Serayu Selatan
            $this->pegawai('Marlin Evalia, S.T.', 13, 40, '19770304 2011012005'), // Kasi Geologi Serayu Selatan
            $this->pegawai('Ayu Septiana, S.T.', 13, 41, '19860903 2010012018'), // Kasi Energi Serayu Selatan

            // ===== 14. Cabang Serayu Tengah ===== (42..45)
            $this->pegawai('Yohanes Pambudi Hadi, S.T.,M.Si.', 14, 42, '19710708 2006041003'), // Kepala Cabang Serayu Tengah
            $this->pegawai('Ridwan Rulianto Sandarunaika P.', 14, 43, '19760124 2010011008'), // Kasubag TU Serayu Tengah
            $this->pegawai('Taufiq Widayanto, S.T', 14, 44, '19791103 2011011002'), // Kasi Geologi Serayu Tengah
            $this->pegawai('Sigit Widiadi, S.T.,M.S', 14, 45, '19711208 2003121005'), // Kasi Energi Serayu Tengah

            // ===== 15. Cabang Slamet Selatan ===== (46..49)
            $this->pegawai('Mahendra Dwiatmoko, S.E.', 15, 46, '19801027 2006041009'), // Kepala Cabang Slamet Selatan
            $this->pegawai('Wara Hesti Utami, S.Sos', 15, 47, '19680323 199703 2002'), // Kasubag TU Slamet Selatan
            $this->pegawai('Dwiana Nurariyanto, S.T.', 15, 48, '19821215 2013011005'), // Kasi Geologi Slamet Selatan
            $this->pegawai('Saptono Purwo Pranggoro, S.T., M.T.', 15, 49, '19800031003'), // Kasi Energi Slamet Selatan (disetujui)

            // ===== 16. Cabang Slamet Utara ===== (50..53)
            $this->pegawai('Ipong Hartanto, S.E., M.Si.', 16, 50, '19800911 2006041005'), // Kepala Cabang Slamet Utara
            $this->pegawai('Mahbub Junaedi, S.T.,M.T.', 16, 52, '19691010 200312 1 004'), // Kasi Geologi Slamet Utara
            $this->pegawai('Risdianto, S.T., M.Si', 16, 53, '19790312 2010011014'), // Kasi Energi Slamet Utara

            // ===== 17. Cabang Serayu Utara ===== (54..57)
            $this->pegawai('Agus Dwi Ibnu Wibowo, S.', 17, 54, '19780813 2000031 004'), // Kepala Cabang Serayu Utara
            $this->pegawai('Asrianto, A.P., M.Si.', 17, 55, '19740927 199311 1001'), // Kasubag TU Serayu Utara
            $this->pegawai('Andrian Mayka Ariawan, S.T., M.En.', 17, 56, '19870508 2010011 010'), // Kasi Geologi Serayu Utara
            $this->pegawai('Tunggul Purwono Ade', 17, 57, '19690101 1994032021'), // Kasi Energi Serayu Utara

            // ===== 18. Cabang Sewu Lawu ===== (58..61)
            $this->pegawai('Budi Setiyawan, S.T', 18, 58, '19810416 2009031007'), // Kepala Cabang Sewu Lawu
            $this->pegawai('Bambang Pamungkas, S.P.', 18, 59, '19810428 2006041011'), // Kasubag TU Sewu Lawu
            $this->pegawai('Yulianto, S.T.,M.T.', 18, 60, '19720723 2003121 003'), // Kasi Geologi Sewu Lawu
            $this->pegawai('Ir. Siti Nurul Chusnah, M.T', 18, 61, '19750908 2009031002'), // Kasi Energi Sewu Lawu

            // ===== 19. UPT LAB ESDM ===== (62..65)
            $this->pegawai('Mashfufah,S.T.', 19, 62, '19681209 199703 2 007'), // Kepala UPT Lab
            $this->pegawai('Usri Batianik, S.Sos', 19, 63, '19680423 199703 2002'), // Kasubag TU UPT Lab
            $this->pegawai('Thomas Teguh Pristiwanto, S.T., M.T.', 19, 64, '19691207 200312 1004'), // Kasi Layanan Pengujian UPT Lab
            $this->pegawai('Fery Yunita, S.T., M.M.', 19, 65, '19800609 200604 2 016'), // Kasi Peralatan UPT Lab

        ]);
    }
}
