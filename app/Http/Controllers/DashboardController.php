<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use App\Models\Matakuliah;

class DashboardController extends Controller
{
    public function index()
    {
        $total_dosen = Dosen::count();

        return view('dashboard.index', compact('total_dosen'));
    }
}
