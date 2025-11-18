<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterBidang extends Model
{
    protected $table = 'master_bidang';

    protected $fillable = [
        'nama_bidang',
    ];

    // ============================
    // RELASI
    // ============================

    // Relasi ke UserPegawai (satu bidang banyak pegawai)
    public function pegawai()
    {
        return $this->hasMany(UserPegawai::class, 'id_bidang');
    }

    // Relasi ke Checkin (satu bidang banyak tamu yg checkin)
    public function checkin()
    {
        return $this->hasMany(Checkin::class, 'id_bidang');
    }
}
