<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;


class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = [
        'nisn',
        'nama',
        'kelas',
        'jurusan_id',
        'sub_kelas',
        'agama',
        'gender',
        'tanggal_lahir'
    ];

    public function jurusan()
    {
        return $this->belongsTo('App\Models\Jurusan', 'jurusan_id', 'id');
    }

    public function scopeFilter(Builder $query): void
    {
        $nisn = request('nisn');
        $search = request('search');
        $kelas = request('kelas');
        $jurusan = request('jurusan');
        $agama = request('agama');
        $gender = request('gender');

        // Filter berdasarkan nisn
        if ($nisn) {
            $query->where('nisn', 'like', '%' . request('nisn') . '%');
        }

        // Filter berdasarkan nama
        if ($search) {
            $query->where('nama', 'like', '%' . request('search') . '%');
        }

        // Filter berdasarkan kelas
        if ($kelas) {
            $query->where('kelas', $kelas);
        }

        // Filter berdasarkan jurusan
        if ($jurusan) {
            $query->where('jurusan_id', $jurusan);
        }

        // Filter berdasarkan agama
        if ($agama) {
            $query->where('agama', $agama);
        }

        // Filter berdasarkan agama
        if ($gender) {
            $query->where('gender', $gender);
        }
    }
}
