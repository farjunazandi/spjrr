<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\MataPelajaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\BobotRapor;
use App\Models\admin\Kriteria;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mataPelajaran = MataPelajaran::all();
        $kriteria = Kriteria::where('kriteria_rapor', '1')->get();

        return view('admin/mataPelajaran', compact('mataPelajaran', 'kriteria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MataPelajaran::create([
            'no' => $request->nomor,
            'id_kriteria' => $request->kriteria,
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'aktif' => $request->aktif
        ]);

        $id = MataPelajaran::select('id')->orderBy('id', 'desc')->first();

        $bobotRapor = BobotRapor::select('id_alternatif')->groupBy('id_alternatif')->get();
        $count = count($bobotRapor);
        for ($i = 0; $i < $count; $i++)
        {
            BobotRapor::create([
                'id_alternatif' => $bobotRapor[$i]->id_alternatif,
                'id_mapel' => $id->id,
                'bobot' => 0
            ]);
        }

        return redirect('/admin/mataPelajaran')->with('success', 'Data mata pelajaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        MataPelajaran::where('id', $request->id)->update([
            'no' => $request->nomor,
            'id_kriteria' => $request->kriteria,
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'aktif' => $request->aktif
        ]);

        return redirect('/admin/mataPelajaran')->with('success', 'Data mata pelajaran berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataPelajaran $mataPelajaran, Request $request)
    {
        MataPelajaran::destroy($request->id);

        return redirect('/admin/mataPelajaran')->with('success', 'Data mata pelajaran berhasil dihapus!');
    }
}
