<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\MasterBidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\PemesananStatusMail;


class PemesananController extends Controller
{
    /**
     * =========================
     * 1. LIST PEMESANAN (ADMIN)
     * =========================
     */
    public function index(Request $request)
    {
        $query = Pemesanan::with(['bidang', 'status']);

        // 🔎 FILTER TANGGAL MULAI
        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal_kunjungan', '>=', $request->tanggal_mulai);
        }

        // 🔎 FILTER TANGGAL SELESAI
        if ($request->filled('tanggal_selesai')) {
            $query->whereDate('tanggal_kunjungan', '<=', $request->tanggal_selesai);
        }

        $pemesanans = $query
            ->orderBy('tanggal_kunjungan', 'desc')
            ->orderBy('jam_kunjungan', 'asc')
            ->get();

        return view('admin.pemesanan.index', compact('pemesanans'));
    }

    /**
     * =========================
     * 2. DETAIL PEMESANAN
     * =========================
     */
    public function show($id)
    {
        $pemesanan = Pemesanan::with(['bidang', 'status'])->findOrFail($id);

        return view('admin.pemesanan.show', compact('pemesanan'));
    }

    /**
     * =========================
     * 3. SETUJUI PEMESANAN
     * =========================
     */
    public function approve($id)
    {
        $pemesanan = Pemesanan::with('bidang')->findOrFail($id);

        $pemesanan->update([
            'id_status' => 2, // DISETUJUI
            'catatan_admin' => 'Silakan datang sesuai jadwal.',
        ]);

        // 🔥 KIRIM EMAIL
        Mail::to($pemesanan->email)
            ->send(new PemesananStatusMail($pemesanan, 'Disetujui'));

        return back()->with('success', 'Pemesanan disetujui & email terkirim.');
    }


    /**
     * =========================
     * 4. TOLAK PEMESANAN
     * =========================
     */
    public function reject(Request $request, $id)
    {
        $request->validate([
            'catatan_admin' => 'required|string',
        ]);

        $pemesanan = Pemesanan::with('bidang')->findOrFail($id);

        $pemesanan->update([
            'id_status' => 3, // DITOLAK
            'catatan_admin' => $request->catatan_admin,
        ]);

        // 🔥 KIRIM EMAIL
        Mail::to($pemesanan->email)
            ->send(new PemesananStatusMail($pemesanan, 'Ditolak'));

        return back()->with('success', 'Pemesanan ditolak & email terkirim.');
    }


    /**
     * =========================
     * 5. SIMPAN PEMESANAN (PUBLIK)
     * =========================
     */
    public function store(Request $request)
    {
        // ======================
        // VALIDASI
        // ======================
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|min:16|max:20',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'instansi' => 'nullable|string|max:255',
            'id_bidang' => 'required|exists:master_bidang,id',
            'keperluan' => 'nullable|string',
            'tanggal_kunjungan' => 'required|date|after_or_equal:today',
            'jam_kunjungan' => 'required|date_format:H:i',
        ]);

        DB::beginTransaction();

        try {
            Pemesanan::create([
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'email' => $request->email,
                'no_hp' => $request->no_hp,
                'instansi' => $request->instansi,
                'id_bidang' => $request->id_bidang,
                'keperluan' => $request->keperluan,
                'tanggal_kunjungan' => $request->tanggal_kunjungan,
                'jam_kunjungan' => $request->jam_kunjungan,
                'id_status' => 1, // MENUNGGU KONFIRMASI
            ]);

            DB::commit();

            return view('index')->with('success', 'Check-in berhasil. Silakan tunggu persetujuan dari petugas.');


        } catch (\Throwable $e) {
            DB::rollBack();

            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function formCheckout()
    {
        $bidang = MasterBidang::all();
        return view('pemesanan', compact('bidang'));
    }
}
