<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenKelas extends Model
{
    use HasFactory;

    protected $table = 'absen_kelas';

    protected $fillable = [
        'matapelajaran_id',
        'kelas',
        'siswas_id',
        'keterangan',
    ];
}
