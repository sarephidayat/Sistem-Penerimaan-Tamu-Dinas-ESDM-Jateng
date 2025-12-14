<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'booking_kunjungan';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'email',
        'no_hp',
        'instansi',
        'id_bidang',
        'keperluan',
        'tanggal_kunjungan',
        'jam_kunjungan',
        'id_status',
        'catatan_admin',
    ];

    /**
     * =========================
     * CASTING
     * =========================
     */
    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'jam_kunjungan' => 'datetime:H:i',
    ];

    /**
     * =========================
     * RELASI
     * =========================
     */

    // Relasi ke master_bidang
    public function bidang()
    {
        return $this->belongsTo(MasterBidang::class, 'id_bidang');
    }

    // Relasi ke master_status
    public function status()
    {
        return $this->belongsTo(MasterStatus::class, 'id_status');
    }
}
