<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Login::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['login' => $user]);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['login' => 'Username atau password salah!']);
    }


    public function logout()
    {
        session()->forget('login');
        return redirect('/login');
    }
}

