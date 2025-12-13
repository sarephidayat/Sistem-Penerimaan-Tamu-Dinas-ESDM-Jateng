<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.auth/login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Admin::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['login' => $user]);
            // dd(session()->all());
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password salah!']);
    }


    public function logout()
    {
        session()->forget('login');
        return redirect('/login');
    }

    public function profile()
    {
        $user = session('login');
        return view('admin.profile.index', compact('user'));
    }

    // /////////// EDIT PROFILE /////////// DISINI DO

}

