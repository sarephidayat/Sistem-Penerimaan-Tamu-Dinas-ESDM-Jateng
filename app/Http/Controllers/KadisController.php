<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class KadisController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $tahun = now()->year;

        /* =========================
         | STATISTIK UTAMA
         ========================= */
        $totalTamu = Checkin::count();

        $tamuHariIni = Checkin::whereDate('waktu_masuk', $today)->count();

        $tamuBulanIni = Checkin::whereMonth('waktu_masuk', now()->month)
            ->whereYear('waktu_masuk', $tahun)
            ->count();

        /* =========================
         | LIST KUNJUNGAN HARI INI
         ========================= */
        $kunjunganHariIni = Checkin::whereDate('waktu_masuk', $today)
            ->orderBy('waktu_masuk', 'desc')
            ->take(5)
            ->get();

        /* =========================
         | DATA GRAFIK BULANAN (12 BULAN)
         ========================= */
        $grafikBulanan = Checkin::select(
                DB::raw('MONTH(waktu_masuk) as bulan'),
                DB::raw('COUNT(*) as total')
            )
            ->whereYear('waktu_masuk', $tahun)
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // isi default 12 bulan = 0
        $dataBulanan = array_fill(0, 12, 0);

        foreach ($grafikBulanan as $row) {
            $dataBulanan[$row->bulan - 1] = $row->total;
        }

        return view('kadis.index', compact(
            'totalTamu',
            'tamuHariIni',
            'tamuBulanIni',
            'kunjunganHariIni',
            'dataBulanan',
            'tahun'
        ));
    }
}
