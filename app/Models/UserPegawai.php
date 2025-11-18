<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserPegawai extends Authenticatable
{
    protected $table = 'user_pegawai';

    protected $fillable = [
        'nama_pegawai',
        'id_bidang',
        'id_jabatan',
        'nip',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    // ============================
    // RELASI
    // ============================

    // UserPegawai -> MasterBidang
    public function bidang()
    {
        return $this->belongsTo(MasterBidang::class, 'id_bidang');
    }

    // UserPegawai -> MasterJabatan
    public function jabatan()
    {
        return $this->belongsTo(MasterJabatan::class, 'id_jabatan');
    }
}
