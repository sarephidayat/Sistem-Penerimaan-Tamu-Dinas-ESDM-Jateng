<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterJabatan extends Model
{
    protected $table = 'master_jabatan';

    protected $fillable = [
        'nama_jabatan',
        'id_bidang',
    ];

    // ============================
    // RELASI
    // ============================

    // Jabatan dimiliki oleh satu bidang
    public function bidang()
    {
        return $this->belongsTo(MasterBidang::class, 'id_bidang');
    }

    // Satu jabatan dapat dimiliki banyak pegawai
    public function pegawai()
    {
        return $this->hasMany(UserPegawai::class, 'id_jabatan');
    }
}
