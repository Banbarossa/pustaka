<?php

namespace App\Exports;

use App\Models\Anggota;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AggotasExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Anggota::all();
    }

    public function headings(): array
    {

        return [
            'Id',
            'NISN',
            'Name',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Tanggal Keanggotaan',
            'Status',
            'Jenis',
        ];
    }
}
