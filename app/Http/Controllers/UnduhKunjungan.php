<?php

namespace App\Http\Controllers;

use App\Models\Kunjungan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UnduhKunjungan extends Controller
{
    public function unduhKunjungan(Request $request, $startDate, $endDate)
    {

        $data['kunjungan'] = Kunjungan::whereBetween('created_at', [$startDate, $endDate])->with('anggota')->get();
        $data['startDate'] = $startDate;
        $data['endDate'] = $endDate;
        $pdf = Pdf::loadView('kunjungan.download', $data);
        return $pdf->stream();
        // return $pdf->download('invoice.pdf');

    }
}
