<?php
namespace App\Imports;

use App\Models\Matapelajaran;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MapelImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        
        // Validasi data
        if(empty($row['nama']) || empty($row['singkatan'])) {
            return null; // Abaikan jika nama atau singkatan kosong
        }

        // Cek apakah mata pelajaran dengan nama ini sudah ada
        $existingMatapelajaran = Matapelajaran::where('name', $row['nama'])->first();
        
        if ($existingMatapelajaran) {
            return null; // Abaikan jika sudah ada
        }

        // Jika tidak ada, tambahkan mata pelajaran baru
        return new Matapelajaran([
            'name' => $row['nama'],
            'nick' => $row['singkatan'],
        ]);
    }
}
