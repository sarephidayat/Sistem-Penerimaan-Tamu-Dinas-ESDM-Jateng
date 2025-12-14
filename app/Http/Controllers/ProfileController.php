<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman profile
     */
    public function index()
    {
        // data user sudah diambil langsung dari session di blade
        return view('admin.profile.index');
    }
}
