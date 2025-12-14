<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /* =====================
       LOGIN
    ===================== */
    public function showLogin()
    {
        return view('admin.auth.login');
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
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'login' => 'Username atau password salah!'
        ]);
    }

    public function logout()
    {
        session()->forget('login');
        return redirect('/login');
    }

    /* =====================
       PROFILE
    ===================== */
    public function profile()
    {
        $user = session('login');
        return view('admin.profile.index', compact('user'));
    }

    /* =====================
       UPLOAD FOTO PROFILE
    ===================== */
    public function uploadAvatar(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user = session('login');
        if (!$user) {
            return redirect('/login');
        }

        /* HAPUS FOTO LAMA */
        if (!empty($user->photo) &&
            Storage::disk('public')->exists('profile/' . $user->photo)) {
            Storage::disk('public')->delete('profile/' . $user->photo);
        }

        /* SIMPAN FOTO BARU */
        $file = $request->file('photo');
        $filename = 'admin_' . $user->id . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('profile', $filename, 'public');

        /* UPDATE DATABASE */
        Admin::where('id', $user->id)->update([
            'photo' => $filename
        ]);

        /* UPDATE SESSION */
        $user->photo = $filename;
        session(['login' => $user]);

        /* WAJIB REDIRECT */
        return redirect()->route('profile')
            ->with('success', 'Foto profile berhasil diperbarui');
    }
}
