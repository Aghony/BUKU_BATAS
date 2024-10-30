<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;


class AbsenSiswa extends Model
{
    use HasFactory;
    protected $table = 'absen_siswas';
    protected $fillable = [
        'siswas_id',
        'bukubatas_id',
        'keterangan',

        
    ];

    public function namasiswa()
    {
        return $this->belongsTo('App\Models\Siswa', 'siswas_id', 'id');
    }

    public function scopeFilter(Builder $query): void
    {
        $keterangan = request('keterangan');

        // $data = request('dataisi');

        if($keterangan){
            $query->where('keterangan', $keterangan);
        }

        // if ($data) {
        //     $query->where('bukubatas_id', $data);
        // }
    }
}
