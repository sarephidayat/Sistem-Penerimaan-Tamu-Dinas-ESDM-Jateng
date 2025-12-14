<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use Carbon\Carbon;

class KadisController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $totalTamu = Checkin::count();
        $tamuHariIni = Checkin::whereDate('waktu_masuk', $today)->count();
        $tamuBulanIni = Checkin::whereMonth('waktu_masuk', now()->month)
                                ->whereYear('waktu_masuk', now()->year)
                                ->count();

        $kunjunganHariIni = Checkin::whereDate('waktu_masuk', $today)
                                    ->orderBy('waktu_masuk', 'desc')
                                    ->take(5)
                                    ->get();

        return view('kadis.index', compact(
            'totalTamu',
            'tamuHariIni',
            'tamuBulanIni',
            'kunjunganHariIni'
        ));
    }
}
