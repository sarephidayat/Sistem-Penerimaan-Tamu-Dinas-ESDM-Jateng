<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Checkin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function GrafikTrenKunjungan(Request $request)
    {
        // Ambil data checkin per bulan di tahun berjalan
        $data = Checkin::select(
            DB::raw('MONTH(waktu_masuk) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->whereYear('waktu_masuk', Carbon::now()->year)
            ->groupBy(DB::raw('MONTH(waktu_masuk)'))
            ->orderBy(DB::raw('MONTH(waktu_masuk)'))
            ->get();

        // Buat array bulan 1–12
        $labels = [];
        $values = [];

        for ($i = 1; $i <= 12; $i++) {
            $labels[] = Carbon::create()->month($i)->format('F');
            $values[] = $data->firstWhere('bulan', $i)->total ?? 0;
        }

        return response()->json([
            'labels' => $labels,
            'values' => $values
        ]);
    }

    public function chartAgendaMingguan(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;

        if (!$tahun || !$bulan) {
            return response()->json([
                'error' => 'Parameter tahun dan bulan wajib diisi'
            ], 400);
        }

        // Menghitung minggu dalam satu bulan
        $data = Checkin::select(
            DB::raw("CEIL(DAY(waktu_masuk) / 7) as minggu"),
            DB::raw("COUNT(*) as total")
        )
            ->whereYear('waktu_masuk', $tahun)
            ->whereMonth('waktu_masuk', $bulan)
            ->groupBy('minggu')
            ->orderBy('minggu')
            ->get();

        return response()->json($data);
    }
}



