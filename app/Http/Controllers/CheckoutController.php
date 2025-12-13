<?php

namespace App\Http\Controllers;

use App\Models\Checkin;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(request $request)
    {
        $query = Checkout::with(['checkin.bidang']);

        // 🔥 FILTER TANGGAL
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_selesai')) {
            $query->whereBetween('waktu_keluar', [
                Carbon::parse($request->tanggal_mulai)->startOfDay(),
                Carbon::parse($request->tanggal_selesai)->endOfDay()
            ]);
        }

        $checkout = $query
            ->orderBy('waktu_keluar', 'desc')
            ->get();


        return view('admin/checkout.index', compact('checkout'));
    }
    public function checkout($id)
    {
        $checkin = Checkin::findOrFail($id);

        // Cegah double checkout
        if ($checkin->checkout) {
            return back()->with('error', 'Tamu sudah checkout.');
        }

        // Simpan checkout
        Checkout::create([
            'checkin_id' => $checkin->id,
            'waktu_keluar' => Carbon::now(),
            'catatan' => 'Tamu telah selesai dilayani',
        ]);

        // 🔥 UPDATE STATUS KE CHECK-OUT
        $checkin->update([
            'id_status' => 4 // Check-out
        ]);

        return back()->with('success', 'Checkout berhasil.');
    }
    public function exportPdf()
    {
        $tanggalCetak = Carbon::now()->translatedFormat('d F Y');

        $checkout = Checkout::with([
            'checkin.bidang'
        ])
            ->orderBy('waktu_keluar', 'desc')
            ->get();

        $totalCheckout = $checkout->count();

        $pdf = Pdf::loadView('admin.checkout.export-pdf', compact(
            'tanggalCetak',
            'checkout',
            'totalCheckout'
        ));

        return $pdf->download('laporan-checkout-tamu.pdf');
    }

    // TAMPIL FORM
    public function formCheckout()
    {
        return view('checkout');
    }

    // PROSES CHECKOUT
    public function store(Request $request)
    {
        // dd($request->all());
        // 1️⃣ Validasi
        $request->validate([
            'nik' => 'required|string|min:16|max:20',
            'catatan' => 'nullable|string|max:500',
        ]);


        // 2️⃣ Cari checkin berdasarkan NIK & belum checkout
        $checkin = Checkin::where('nik', $request->nik)
            ->where('id_status', '!=', 4) // 5 = CHECKOUT
            ->first();

        // 3️⃣ Kalau tidak ketemu
        if (!$checkin) {
            return back()->with('error', 'NIK tidak ditemukan atau sudah checkout.');
        }

        // 4️⃣ Simpan ke tabel checkout
        Checkout::create([
            'checkin_id' => $checkin->id,
            'nik' => $checkin->nik,
            'waktu_keluar' => now(),
            'catatan' => $request->catatan,
        ]);

        // 5️⃣ Update status checkin → CHECKOUT
        $checkin->update([
            'id_status' => 4,
        ]);

        // 6️⃣ Selesai
        return view('index', ['success' => 'Checkout berhasil. Terima kasih telah berkunjung!']);
    }
}
