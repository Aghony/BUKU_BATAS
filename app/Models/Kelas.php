<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'jurusan_id', 'celas','sub_kelas'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function jurusan() 
    {
        return $this->belongsTo('App\Models\Jurusan', 'jurusan_id', 'id');
    }

    public function scopeFilter(Builder $query) : void
    {
        $search = request('search');
        $query->whereHas('user', function (Builder $query) use ($search) {
            $query->where('username', 'like', '%' . $search . '%');
        });
        // $query->where('user_id','like','%'.request('search').'%');
    }
}
