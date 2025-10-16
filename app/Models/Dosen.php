<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'nidn';
    public $incrementing = false; // karena nidn bukan auto increment
    protected $keyType = 'string';

    protected $fillable = [
        'nidn',
        'nama_dosen',
        'jenkel_dosen',
        'alamat_dosen',
    ];
}
