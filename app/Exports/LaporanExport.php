<?php

namespace App\Exports;

use App\Models\BukuBatas;
use App\Models\Jurusan;
use App\Models\Matapelajaran;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Facades\Excel;

class LaporanExport implements FromQuery, WithTitle, WithHeadings
{
    private $start_Date;
    private $end_Date;

    public function __construct(string $start_Date, string $end_Date)
    {
        $this->start_Date = $start_Date;
        $this->end_Date = $end_Date;
    }
    /**
     * @return Builder
     */
    public function query()
    {
        return BukuBatas::query()
        ->whereDate('created_at', '>=', $this->start_Date)
        ->whereDate('created_at', '<=', $this->end_Date);
    }
    /**
     * @return string
     */
    public function title(): string
    {
        return 'Laporan ' . $this->start_Date . ' - ' . $this->end_Date;
    }

    public function headings(): array{
        return [
            'id',
            'guru',
            'Jurusan',
            'Sub Kelas',
            'kelas',
            'Matapelajaran',
            'File Gambar',
            'Tanggal Dibuat',
            'Tanggal Dipebarui'
        ];
    }
}
