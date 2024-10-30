<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;


class BukuBatas extends Model
{
    use HasFactory;

    protected $table = 'buku_batas';
    protected $fillable = [
        'guru',
        'jurusan_id',
        'sub_kelas',
        'kelas',
        'matapelajaran',
        'file_path',
    ];

    public function jurusan()
    {
        return $this->belongsTo('App\Models\Jurusan', 'jurusan_id', 'id');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Models\Matapelajaran', 'matapelajaran', 'id');
    }

    public function namaguru()
    {
        return $this->belongsTo('App\Models\User', 'guru', 'id');
    }

    // public function scopeFilter(Builder $query) : void
    // {
    //     $search = request('search');
    //     $query->whereHas('namaguru', function (Builder $query) use ($search) {
    //         $query->where('username', 'like', '%' . $search . '%');
    //     });
    //     // $query->where('user_id','like','%'.request('search').'%');
    // }

    public function scopeFilter(Builder $query): void
    {
        $search = request('search');
        $kelas = request('kelas');
        $jurusan = request('jurusan');
        $sub_kelas = request('sub_kelas');

        // Filter berdasarkan nama guru
        if ($search) {
            $query->whereHas('namaguru', function (Builder $query) use ($search) {
                $query->where('username', 'like', '%' . $search . '%');
            });
        }

        // Filter berdasarkan kelas
        if ($kelas) {
            $query->where('kelas', $kelas);
        }

        // Filter berdasarkan jurusan
        if ($jurusan) {
            $query->where('jurusan_id', $jurusan);
        }

        // Filter berdasarkan sub kelas
        if ($sub_kelas) {
            $query->where('sub_kelas', $sub_kelas);
        }
    }

}
