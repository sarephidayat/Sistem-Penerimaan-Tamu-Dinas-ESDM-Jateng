<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use Illuminate\Http\Request;

class KadisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkins = Checkin::with(['bidang', 'status'])
            ->orderBy('waktu_masuk', 'desc')
            ->get();

        return view('Kepala Dinas.index', compact('checkins'));
    }

}
