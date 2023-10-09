<?php

namespace App\Http\Livewire;

use App\Models\Kunjungan;
use Carbon\Carbon;
use DB;
use Livewire\Component;
use Livewire\WithPagination;

class DaftarPengunjung extends Component
{
    public $startDate, $endDate;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
    }
    public function render()
    {
        return view('livewire.daftar-pengunjung', [
            'data' => Kunjungan::whereBetween('created_at', [$this->startDate, $this->endDate])->with('anggota')->paginate(15),
            'rating' => Kunjungan::whereBetween('created_at', [$this->startDate, $this->endDate])
                ->select('anggota_id', DB::raw('COUNT(*) as total_kunjungan'))
                ->groupBy('anggota_id')
                ->orderByDesc('total_kunjungan')
                ->with('anggota')
                ->limit(10)
                ->get(),
            'terbanyak' => Kunjungan::whereBetween('created_at', [$this->startDate, $this->endDate])
                ->select('anggota_id', DB::raw('COUNT(*) as total_kunjungan'))
                ->groupBy('anggota_id')
                ->orderByDesc('total_kunjungan')
                ->first(),
        ])
            ->extends('layouts.app')
            ->section('content');
    }

}
