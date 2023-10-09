<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AnggotaPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Anggota::where('role', 'Pegawai')->orderBy('name', 'asc')->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $cardRoute = route('anggota.card', $data->id);
                    $editRoute = route('anggota.edit', $data->id);
                    $deleteRoute = route('anggota.destroy', $data->id);

                    return view('components.action-dropdown', [
                        'cardRoute' => $cardRoute,
                        'editRoute' => $editRoute,
                        'deleteRoute' => $deleteRoute,
                    ]);
                })
                ->toJson();
        }

        return view('anggota-pegawai.index', [
            'routeCreate' => route('anggota-pegawai.create'),
        ]);
    }

    public function create()
    {
        $data['model'] = new Anggota();
        $data['route'] = route('anggota.store');
        $data['method'] = 'post';
        return view('anggota.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
