<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        /**
         * =========================
         * 1. CHART MINGGUAN (LINE)
         * =========================
         */
        $rawWeek = Checkin::selectRaw('DAYOFWEEK(waktu_masuk) as hari, COUNT(*) as total')
            ->whereBetween('waktu_masuk', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->groupBy('hari')
            ->pluck('total', 'hari');

        $weekLabels = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $weekMap = [2 => 0, 3 => 1, 4 => 2, 5 => 3, 6 => 4, 7 => 5, 1 => 6];
        $weekData = array_fill(0, 7, 0);

        foreach ($rawWeek as $hari => $total) {
            $weekData[$weekMap[$hari]] = $total;
        }

        /**
         * =========================
         * 2. CHART BULANAN (BAR)
         * =========================
         */
        $rawMonth = Checkin::selectRaw('MONTH(waktu_masuk) as bulan, COUNT(*) as total')
            ->whereYear('waktu_masuk', Carbon::now()->year)
            ->groupBy('bulan')
            ->pluck('total', 'bulan');

        $monthLabels = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'Mei',
            'Jun',
            'Jul',
            'Agu',
            'Sep',
            'Okt',
            'Nov',
            'Des'
        ];
        $monthData = array_fill(0, 12, 0);

        foreach ($rawMonth as $bulan => $total) {
            $monthData[$bulan - 1] = $total;
        }

        /**
         * =========================
         * 3. BIDANG TERBANYAK (POLAR)
         * =========================
         */
        $bidangLabels = Checkin::join('master_bidang', 'checkin.id_bidang', '=', 'master_bidang.id')
            ->groupBy('master_bidang.nama_bidang')
            ->pluck('master_bidang.nama_bidang');

        $bidangData = Checkin::join('master_bidang', 'checkin.id_bidang', '=', 'master_bidang.id')
            ->groupBy('master_bidang.nama_bidang')
            ->selectRaw('COUNT(checkin.id) as total')
            ->pluck('total');

        /**
         * =========================
         * 4. JAM PALING RAMAI (KELOMPOK WAKTU)
         * =========================
         */

        $jamRamai = Checkin::selectRaw("
                SUM(CASE WHEN HOUR(waktu_masuk) >= 8  AND HOUR(waktu_masuk) < 10 THEN 1 ELSE 0 END) as pagi,
                SUM(CASE WHEN HOUR(waktu_masuk) >= 10 AND HOUR(waktu_masuk) < 13 THEN 1 ELSE 0 END) as siang,
                SUM(CASE WHEN HOUR(waktu_masuk) >= 13 AND HOUR(waktu_masuk) < 15 THEN 1 ELSE 0 END) as sore
            ")
            ->whereDate('waktu_masuk', Carbon::today())
            ->first();

        // Label & Data
        $hourLabels = [
            '08.00 - 10.00',
            '10.00 - 13.00',
            '13.00 - 15.00'
        ];

        $hourData = [
            $jamRamai->pagi ?? 0,
            $jamRamai->siang ?? 0,
            $jamRamai->sore ?? 0
        ];

        // Statistik
        $total_tamu_sedang_berkunjung = Checkin::whereDate('waktu_masuk', Carbon::today())
            ->doesntHave('checkout')
            ->count();

        $total_tamu_hari_ini = Checkin::whereDate('waktu_masuk', Carbon::today())->count();

        $total_tamu_minggu_ini = Checkin::whereBetween('waktu_masuk', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        $total_tamu_bulan_ini = Checkin::whereMonth('waktu_masuk', Carbon::now()->month)
            ->whereYear('waktu_masuk', Carbon::now()->year)
            ->count();

        // 🔥 INI KUNCI: TAMU HARI INI + CHECKOUT
        $tamu_hari_ini = Checkin::with([
            'bidang',
            'status',
            'checkout'
        ])
            ->whereDate('waktu_masuk', Carbon::today())
            ->orderBy('waktu_masuk', 'desc')
            ->get();


        return view('admin.statistik.index', compact(
            'weekLabels',
            'weekData',
            'monthLabels',
            'monthData',
            'bidangLabels',
            'bidangData',
            'hourLabels',
            'hourData',
            'total_tamu_sedang_berkunjung',
            'total_tamu_hari_ini',
            'total_tamu_minggu_ini',
            'total_tamu_bulan_ini',
            'tamu_hari_ini'
        ));

    }
    public function exportPdf()
    {
        $tanggalCetak = Carbon::now()->translatedFormat('d F Y');

        // contoh: data tamu hari ini
        $tamu_hari_ini = Checkin::with(['bidang', 'status'])
            ->whereDate('waktu_masuk', Carbon::today())
            ->orderBy('waktu_masuk', 'asc')
            ->get();

        // statistik ringkas
        $total = $tamu_hari_ini->count();
        $selesai = $tamu_hari_ini->where('id_status', 4)->count();
        $berkunjung = $total - $selesai;

        $pdf = Pdf::loadView('admin.statistik.export-pdf', compact(
            'tanggalCetak',
            'tamu_hari_ini',
            'total',
            'selesai',
            'berkunjung'
        ));

        return $pdf->download('laporan-kunjungan-harian.pdf');
    }
}
