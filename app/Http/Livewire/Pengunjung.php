<?php

namespace App\Http\Livewire;

use App\Models\Anggota;
use App\Models\Kunjungan;
use App\Models\Tujuan;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Pengunjung extends Component
{
    public $search;
    public $latestAnggota;
    public $idAnggota;
    protected $updatesQueryString = ['search' => ['except' => '']];
    public $tambahTujuan;
    public $selectedTujuan = 1;
    public $modalVisible = false;
    use LivewireAlert;

    public function render()
    {

        if ($this->search) {
            $this->latestAnggota = Anggota::where('nisn', 'like', '%' . $this->search . '%')
                ->orWhere('name', 'like', '%' . $this->search . '%')
                ->limit(4)
                ->get();

        } else {
            // $this->latestAnggota = Kunjungan::with('anggota')
            //     ->selectRaw('MAX(created_at) as latest_created_at, anggota_id')
            //     ->groupBy('anggota_id')
            //     ->latest('latest_created_at')
            //     ->limit(4)
            //     ->distinct()
            //     ->get();

            $this->latestAnggota = Kunjungan::with('anggota')->select('anggota_id', DB::raw('MAX(created_at) as latest_created_at'))
                ->groupBy('anggota_id')
                ->orderBy('latest_created_at', 'desc')
                ->limit(4)
                ->get();

        }

        $data = Kunjungan::with('anggota')->latest()->limit(15)->get();

        return view('livewire.pengunjung', [
            'latest' => $this->latestAnggota,
            'data' => $data,
            'tujuan' => Tujuan::all(),
        ])
            ->extends('layouts.app')
            ->section('content');
    }

    public function getAnggota($id)
    {
        $this->idAnggota = $id;
    }

    public function store()
    {
        $tujuan = Tujuan::findOrFail($this->selectedTujuan)->tujuan;
        Kunjungan::create([
            'anggota_id' => $this->idAnggota,
            'tanggal' => Carbon::now()->toDateString(),
            'waktu' => Carbon::now('Asia/Jakarta')->toTimeString(),
            'tujuan' => $tujuan,
        ]);
        $this->selectedTujuan = 1;
        $this->idAnggota = '';
        $this->search = '';
        $this->alert('success', 'Data Berhasil ditambahkan', [
            'position' => 'center',
        ]);
        return redirect()->to('/kunjungan');
    }

    public function test($item)
    {
        $this->selectedTujuan = $item;
    }

    public function clear()
    {

        $this->search = '';
    }

    public function storeTujuan()
    {
        $this->validate([
            'tambahTujuan' => 'required',
        ]);
        Tujuan::create([
            'tujuan' => $this->tambahTujuan,
        ]);
        $this->modalVisible = !$this->modalVisible;

        $this->alert('success', 'Data Berhasil ditambahkan', [
            'position' => 'center',
        ]);

    }

    public function showModal()
    {
        $this->modalVisible = !$this->modalVisible;
    }

    public function destroyTujuan($id)
    {

        Tujuan::findOrFail($id)->delete();
        $this->alert('success', 'Data Berhasil dihapus', [
            'position' => 'center',
        ]);

    }
}
