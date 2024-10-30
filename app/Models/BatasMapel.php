<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatasMapel extends Model
{
    use HasFactory;

    protected $table ='batas_mapels';

    protected $fillable =[
        'matapelajaran_id',
        'mulai',
        'selesai',
        'judul',
        'keterangan'
    ];

    public function mapel()
    {
        return $this->belongsTo('App\Models\Matapelajaran', 'matapelajaran_id', 'id');
    }
}
