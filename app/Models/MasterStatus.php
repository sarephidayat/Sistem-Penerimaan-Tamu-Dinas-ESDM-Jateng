<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterStatus extends Model
{
    // Kalau nama tabel kamu adalah "status":
    protected $table = 'master_status';

    protected $fillable = [
        'nama_status',
    ];

    // Relasi ke Checkin
    public function checkins()
    {
        return $this->hasMany(Checkin::class, 'id_status');
    }
}
