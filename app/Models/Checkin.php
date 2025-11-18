<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $table = 'checkin';

    protected $fillable = [
        'email',
        'nama_lengkap',
        'nik',
        'instansi',
        'no_hp',
        'bidang_tujuan',
        'keperluan',
        'foto_selfie',
        'waktu_masuk',
        'id_bidang',
        'id_status',
    ];

    protected $casts = [
        'waktu_masuk' => 'datetime',
    ];

    // ============================
    // RELASI
    // ============================

    // Relasi ke master_bidang
    public function bidang()
    {
        return $this->belongsTo(MasterBidang::class, 'id_bidang');
    }

    // Relasi ke status (misalnya: Menunggu, Diproses, Selesai)
    public function status()
    {
        return $this->belongsTo(MasterStatus::class, 'id_status');
    }
}
