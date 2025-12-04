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
        // $total_bidang = MasterBidang::count();
        // $total_pegawai = UserPegawai::count();
        // $total_jabatan = MasterJabatan::count();

        // Statistik tamu
        $total_tamu_sedang_berkunjung = Checkin::where('id_status', 1)->count();

        $total_tamu_hari_ini = Checkin::whereDate('waktu_masuk', Carbon::today())->count();

        $total_tamu_minggu_ini = Checkin::whereBetween('waktu_masuk', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->count();

        $total_tamu_bulan_ini = Checkin::whereMonth('waktu_masuk', Carbon::now()->month)
            ->whereYear('waktu_masuk', Carbon::now()->year)
            ->count();

        // List penerimaan tamu terbaru
        $list_tamu = Checkin::all()->sortByDesc('waktu_masuk');

        return view('admin.dashboard.index', compact(
            'total_tamu_sedang_berkunjung',
            'total_tamu_hari_ini',
            'total_tamu_minggu_ini',
            'total_tamu_bulan_ini',
            'list_tamu'
        ));
    }
}
