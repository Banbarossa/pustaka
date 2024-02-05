<?php

namespace App\Http\Controllers;

use App\Exports\AggotasExport;
use App\Models\Anggota;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class AnggotaController extends Controller
{

    public function index(Request $request)
    {

        $data = Anggota::where('role', 'Santri')->orderBy('name', 'asc')->get();
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

        return view('anggota.index', [
            'routeCreate' => route('anggota.create'),
        ]);
    }

    public function create()
    {
        $data['model'] = new Anggota();
        $data['route'] = route('anggota.store');
        $data['method'] = 'post';
        return view('anggota.create', compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->role == 'Santri') {
            $request->validate([
                'name' => 'required',
                'nisn' => 'required|digits:10|unique:anggotas,nisn',
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'nisn' => 'required|unique:anggotas,nisn',
            ]);
        }

        $save = Anggota::create([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'pob' => $request->pob,
            'dob' => $request->dob,
            'role' => $request->role,
        ]);

        if ($save->role == "Santri") {
            return redirect()->route('anggota.index')->with('success', 'Data Berhasil Ditambahkan');
        }
        return redirect()->route('anggota-pegawai.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function show(Anggota $anggota)
    {

    }

    public function edit(String $id)
    {

        $data['model'] = Anggota::findOrFail($id);
        $data['route'] = route('anggota.update', $id);
        $data['method'] = 'put';
        return view('anggota.create', compact('data'));
    }

    public function update(Request $request, String $id)
    {
        $request->validate([
            'name' => 'required',
            'nisn' => 'required|digits:10',
        ]);

        $save = Anggota::findOrFail($id);
        $save->update([
            'name' => $request->name,
            'nisn' => $request->nisn,
            'pob' => $request->pob,
        ]);
        if ($save->role == "Santri") {
            return redirect()->route('anggota.index')->with('success', 'Data Berhasil Diubah');
        }
        return redirect()->route('anggota-pegawai.index')->with('success', 'Data Berhasil Diubah');

    }

    public function destroy(String $id)
    {
        $model = Anggota::findOrFail($id);
        $model->delete();
        if ($model->role == "Santri") {
            return redirect()->route('anggota.index')->with('success', 'Data Berhasil Dihapus');
        }
        return redirect()->route('anggota-pegawai.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function trashed(Request $request)
    {
        $data = Anggota::onlyTrashed()->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $route = route('anggota.restore', $data->id);
                    return "<a href='$route' class='btn btn-success'>Restore</a>";
                })
                ->toJson();
        }

        return view('anggota.trashed');

    }

    public function card(String $id)
    {

        $data['model'] = Anggota::findOrFail($id);

        $pdf = Pdf::loadView('anggota.card', $data);
        $pdf->setPaper('a4');
        return $pdf->stream();

        // return view('anggota.card', compact('data'));
    }

    public function exportExcel()
    {
        return Excel::download(new AggotasExport, 'Anggota.xlsx');
    }

    public function exportPdf($role)
    {
        $data['model'] = Anggota::where('role', $role)->orderBy('name', 'asc')->get();
        $data['role'] = $role;
        // $data['pegawai'] = Anggota::where('role', 'Pegawai')->orderBy('name', 'asc')->get();
        $pdf = Pdf::loadView('anggota.download', $data);
        return $pdf->stream();
    }

    public function restore($id)
    {
        $anggota = Anggota::onlyTrashed()->find($id);
        $anggota->restore();
        return redirect()->route('anggota.trashed')->with('success', 'Data Berhasil direstore');
    }
}
