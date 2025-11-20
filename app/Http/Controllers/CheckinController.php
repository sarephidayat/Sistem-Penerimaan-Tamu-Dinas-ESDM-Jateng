<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Checkin;
use App\Models\MasterBidang;
use App\Models\MasterStatus;
use Illuminate\Http\Request;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkins = Checkin::with(['bidang', 'status'])
            ->orderBy('waktu_masuk', 'desc')
            ->get();

        return view('admin/checkin.index', compact('checkins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bidang = MasterBidang::all();
        $status = MasterStatus::all();

        return view('checkin.create', compact('bidang', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'email' => 'nullable|email',
            'instansi' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'bidang_tujuan' => 'nullable|string|max:255',
            'keperluan' => 'nullable|string',
            'id_bidang' => 'nullable|exists:master_bidang,id',
            'id_status' => 'nullable|exists:status,id',
            'foto_selfie' => 'nullable|image|max:2048',
        ]);

        // Upload foto
        $foto = null;
        if ($request->hasFile('foto_selfie')) {
            $foto = $request->file('foto_selfie')->store('checkin_foto', 'public');
        }

        Checkin::create([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'instansi' => $request->instansi,
            'no_hp' => $request->no_hp,
            'bidang_tujuan' => $request->bidang_tujuan,
            'keperluan' => $request->keperluan,
            'foto_selfie' => $foto,
            'waktu_masuk' => now(),
            'id_bidang' => $request->id_bidang,
            'id_status' => $request->id_status ?? 1, // default Menunggu
        ]);

        return redirect()->route('checkin.index')->with('success', 'Check-in berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $checkin = Checkin::with(['bidang', 'status'])->findOrFail($id);
        return view('checkin.show', compact('checkin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $checkin = Checkin::findOrFail($id);
        $bidang = MasterBidang::all();
        $status = MasterStatus::all();

        return view('checkin.edit', compact('checkin', 'bidang', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'email' => 'nullable|email',
            'instansi' => 'nullable|string',
            'no_hp' => 'nullable|string|max:20',
            'bidang_tujuan' => 'nullable|string|max:255',
            'keperluan' => 'nullable|string',
            'id_bidang' => 'nullable|exists:master_bidang,id',
            'id_status' => 'nullable|exists:status,id',
            'foto_selfie' => 'nullable|image|max:2048',
        ]);

        $checkin = Checkin::findOrFail($id);

        // Upload foto baru
        $foto = $checkin->foto_selfie;
        if ($request->hasFile('foto_selfie')) {
            $foto = $request->file('foto_selfie')->store('checkin_foto', 'public');
        }

        $checkin->update([
            'email' => $request->email,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'instansi' => $request->instansi,
            'no_hp' => $request->no_hp,
            'bidang_tujuan' => $request->bidang_tujuan,
            'keperluan' => $request->keperluan,
            'foto_selfie' => $foto,
            'id_bidang' => $request->id_bidang,
            'id_status' => $request->id_status,
        ]);

        return redirect()->route('checkin.index')->with('success', 'Data check-in berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $checkin = Checkin::findOrFail($id);

        $checkin->delete();

        return redirect()->route('checkin.index')->with('success', 'Data check-in berhasil dihapus!');
    }
}
