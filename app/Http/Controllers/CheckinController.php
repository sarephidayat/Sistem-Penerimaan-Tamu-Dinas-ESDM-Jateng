<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Checkin;
use App\Models\MasterBidang;
use App\Models\MasterStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class CheckinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $query = Checkin::with(['bidang', 'status']);

        // 🔥 FILTER TANGGAL CHECK-IN
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('waktu_masuk', [
                Carbon::parse($request->tanggal_mulai)->startOfDay(),
                Carbon::parse($request->tanggal_selesai)->endOfDay()
            ]);
        }

        $checkins = $query
            ->orderBy('waktu_masuk', 'desc')
            ->get();

        return view('admin/checkin.index', compact('checkins'));
    }

    public function approve($id)
    {
        $checkin = Checkin::findOrFail($id);

        if ($checkin->id_status != 1) {
            return back()->with('error', 'Status tidak dapat diubah.');
        }

        $checkin->update([
            'id_status' => 2 // Disetujui
        ]);

        return back()->with('success', 'Tamu disetujui.');

    }

    public function reject($id)
    {
        $checkin = Checkin::findOrFail($id);

        if ($checkin->id_status != 1) {
            return back()->with('error', 'Status tidak dapat diubah.');
        }

        $checkin->update([
            'id_status' => 3 // Ditolak
        ]);

        return back()->with('success', 'Tamu ditolak.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|max:20',
            'email' => 'nullable|email',
            'no_hp' => 'nullable|string|max:20',
            'instansi' => 'nullable|string|max:255',
            'id_bidang' => 'required|exists:master_bidang,id',
            'keperluan' => 'nullable|string',
            'foto_selfie' => 'nullable|string', // BASE64
        ]);

        $fotoPath = null;

        if ($request->foto_selfie) {
            $image = $request->foto_selfie;
            $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);
            $image = str_replace(' ', '+', $image);

            $fileName = 'checkin_' . time() . '.png';

            Storage::disk('public')->put(
                'checkin/' . $fileName,
                base64_decode($image)
            );

            $fotoPath = 'checkin/' . $fileName; // ✅ PATH SAJA
        }

        Checkin::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'instansi' => $request->instansi,
            'id_bidang' => $request->id_bidang,
            'keperluan' => $request->keperluan,
            'foto_selfie' => $fotoPath, // ✅ BENAR
            'waktu_masuk' => Carbon::now(),
            'id_status' => 1,
        ]);

        return view('index')->with('success', 'Check-in berhasil. Silakan tunggu persetujuan dari petugas.');
    }

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


    public function destroy(string $id)
    {
        $checkin = Checkin::findOrFail($id);

        $checkin->delete();

        return redirect()->route('checkin.index')->with('success', 'Data check-in berhasil dihapus!');
    }

    public function formCheckin()
    {
        $bidang = MasterBidang::all();
        return view('checkin', compact('bidang'));
    }
}
