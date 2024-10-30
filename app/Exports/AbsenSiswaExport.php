<?php

namespace App\Exports;

use App\Models\AbsenSiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsenSiswaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return AbsenSiswa::with('namasiswa:id,nama')
        ->get()
        ->map(function($absen){
            return [
                'Nama Siswa' => $absen->namasiswa->nama,
                'Keterangan' => $absen->keterangan,
            ];
        });
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
        'Nama Siswa',
        'Keterangan',
        ];
    }
}
