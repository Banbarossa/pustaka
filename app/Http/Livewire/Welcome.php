<?php

namespace App\Http\Livewire;

use App\Charts\MonthlyKunjunganChart;
use App\Models\Anggota;
use App\Models\Kunjungan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Welcome extends Component
{
    public $startYear, $endYear;
    public $anggota, $kunjungan;

    public function mount()
    {
        $this->startYear = Carbon::now()->startOfYear()->format('Y-m-d');
        $this->endYear = Carbon::now()->endOfYear()->format('Y-m-d');
        $this->kunjungan = Kunjungan::whereBetween('created_at', [$this->startYear, $this->endYear])->count();
        $this->anggota = Anggota::all()->count();
    }
    public function render(MonthlyKunjunganChart $chart)
    {
        return view('livewire.welcome', [
            'data' => Kunjungan::select('anggota_id', DB::raw('MAX(created_at) as latest_created_at'))
                ->groupBy('anggota_id')
                ->orderBy('latest_created_at', 'DESC')
                ->limit(10)
                ->with('anggota')
                ->get(),
            'rating' => Kunjungan::whereBetween('created_at', [$this->startYear, $this->endYear])
                ->select('anggota_id', DB::raw('COUNT(*) as total_kunjungan'))
                ->groupBy('anggota_id')
                ->orderByDesc('total_kunjungan')
                ->with('anggota')
                ->limit(10)
                ->get(),
            'terbanyak' => Kunjungan::whereBetween('created_at', [$this->startYear, $this->endYear])
                ->select('anggota_id', DB::raw('COUNT(*) as total_kunjungan'))
                ->groupBy('anggota_id')
                ->orderByDesc('total_kunjungan')
                ->first(),
            'chart' => $chart->build(),
        ])
            ->extends('layouts.app')
            ->section('content');
    }
}
