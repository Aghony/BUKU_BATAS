<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;


class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusan' ;
    protected $fillable = ['name', 'nick'];


    public function scopeFilter(Builder $query): void
    {
        // $search = request('search');
        // $query->whereHas('user', function (Builder $query) use ($search) {
        //     $query->where('username', 'like', '%' . $search . '%');
        // });
        $query->where('name', 'like', '%' . request('search') . '%');
    }
}
