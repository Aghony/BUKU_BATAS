<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'subject_array'];
    
    protected $casts =[
        'subject_array' => 'array',// Meng-cast kolom JSON sebagai array
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
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