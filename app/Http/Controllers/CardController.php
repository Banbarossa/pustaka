<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Barryvdh\DomPDF\Facade\Pdf;

class CardController extends Controller
{
    public function index($role)
    {

        $model['data'] = Anggota::where('role', $role)->orderBy('name')->get()->chunk(4);
        // $model['data'] = $model['data']->chunk(4);
        $pdf = Pdf::loadView('anggota.card-all', $model);
        return $pdf->stream();

    }
}
