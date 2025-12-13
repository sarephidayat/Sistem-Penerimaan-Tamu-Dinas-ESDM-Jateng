<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Checkin;
use App\Models\Matakuliah;
use App\Models\UserPegawai;
use App\Models\MasterBidang;
use App\Models\MasterJabatan;

class DashboardController extends Controller
{
    public function index()
    {
        // dd(session()->all());
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

        return view('admin.dashboard.index', compact(
            'total_tamu_sedang_berkunjung',
            'total_tamu_hari_ini',
            'total_tamu_minggu_ini',
            'total_tamu_bulan_ini',
            'tamu_hari_ini'
        ));
    }
}