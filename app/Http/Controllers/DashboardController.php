<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Matakuliah;
use App\Models\UserPegawai;
use App\Models\MasterBidang;
use App\Models\MasterJabatan;

class DashboardController extends Controller
{
    public function index()
    {
        $total_bidang = MasterBidang::count();
        $total_pegawai = UserPegawai::count();
        $total_jabatan = MasterJabatan::count();

        return view('admin/dashboard.index', compact('total_bidang', 'total_pegawai', 'total_jabatan'));
    }
}
