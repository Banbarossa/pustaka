<?php

namespace App\Imports;

use App\Models\Anggota;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AnggotaImport implements ToCollection, WithHeadingRow, WithValidation
{
    use Importable, SkipsOnFailure;
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        dd($collection);
        foreach ($collection as $row) {
            Anggota::create([

            ]);
        }
    }

    public function headingRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [
            'nisn' => 'required|digits:10',
            'name' => 'required',
            'pob' => 'required',
            'dob' => 'required',
            'mulai_keanggotaan' => 'required',
            'role' => 'required',
        ];
    }
}
