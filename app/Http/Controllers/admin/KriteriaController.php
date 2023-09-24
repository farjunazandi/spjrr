<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Kriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kriteria = Kriteria::all();

        return view('admin/kriteriaAdmin', compact('kriteria'));
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
        if ($request->has('kriteria_rapor')) {
            $kriteria_rapor = '1';
        } else {
            $kriteria_rapor = '0';
        }

        Kriteria::create([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'kriteria_rapor' => $kriteria_rapor,
            'bobot_kriteria' => $request->bobot_kriteria
        ]);

        return redirect('/admin/kriteriaAdmin')->with('success', 'Data kriteria berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kriteria $kriteria)
    {
        if ($request->has('kriteria_rapor')) {
            $kriteria_rapor = '1';
        } else {
            $kriteria_rapor = '0';
        }

        Kriteria::where('id', $request->id)->update([
            'kode_kriteria' => $request->kode_kriteria,
            'nama_kriteria' => $request->nama_kriteria,
            'kriteria_rapor' => $kriteria_rapor,
            'bobot_kriteria' => $request->bobot_kriteria
        ]);

        return redirect('/admin/kriteriaAdmin')->with('success', 'Data kriteria berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria, Request $request)
    {
        Kriteria::destroy($request->id);

        return redirect('/admin/kriteriaAdmin')->with('success', 'Data kriteria berhasil dihapus!');
    }
}
