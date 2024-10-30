<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Siswa;
use App\Models\Jurusan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class SiswasImport implements ToModel, WithHeadingRow
{
    
    public function model(array $row)
    {
        // dd($row);
        if (empty($row['nama'])) {
            return null;
        }
            // Konversi tanggal_lahir jika merupakan serial number dari Excel
            $tanggal_lahir = is_numeric($row['tanggal_lahir'])
            ? Carbon::createFromFormat('Y-m-d', gmdate('Y-m-d', ($row['tanggal_lahir'] - 25569) * 86400))
            : $row['tanggal_lahir'];

            $jurusan = Jurusan::where('nick', $row['jurusan'])->first();

            if(!$jurusan){
                // Bisa juga menggunakan log atau exception handling
                return null;
            }
        // dd($row);
        return new Siswa([
        'nisn' => $row['nisn'],
        'nama' => $row['nama'],
        'kelas' => $row['kelas'],
        'jurusan_id'=> $jurusan->id,
        'sub_kelas'=> $row['sub_kelas'],
        'agama'=> $row['agama'],
        'gender' => $row['jenis_kelamin'],
        'tanggal_lahir' => $tanggal_lahir,
        ]);
    }

    
}
