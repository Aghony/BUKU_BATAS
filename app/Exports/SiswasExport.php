<?php

namespace App\Exports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswasExport implements FromCollection, WithHeadings
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = Siswa::OrderBy('nama', 'asc')->get();
        return $data;
    }

        /**
     * @return array
     */
    public function headings(): array{
        return [
            'id',
            'NISN',
            'Nama',
            'Jurusan',
            'Kelas',
            'Sub Kelas',
            'Agama',
            'Jenis Kelamin',
            'Tanggal Lahir',
            'Tanggal Dibuat',
            'Tanggal Diubah',
        ];
    }
}


