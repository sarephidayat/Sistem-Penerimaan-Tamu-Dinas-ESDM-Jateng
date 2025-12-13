<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $table = 'checkout';

    protected $fillable = [
        'checkin_id',
        'nik',
        'waktu_keluar',
        'catatan',
    ];

    protected $casts = [
        'waktu_keluar' => 'datetime',
    ];

    // ============================
    // RELASI
    // ============================

    // Relasi ke tabel checkin
    public function checkin()
    {
        return $this->belongsTo(Checkin::class, 'checkin_id');
    }
}
