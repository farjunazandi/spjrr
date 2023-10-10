<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\SoalRmib;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\KategoriRmib;

class SoalRmibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $soalRmib = SoalRmib::all();
        $kategori = KategoriRmib::all();

        return view('admin/soalRmib', compact('soalRmib', 'kategori'));
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
        SoalRmib::create([
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'tipe_soal' => $request->tipe_soal,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_kategori' => $request->kategori
        ]);

        return redirect('/admin/soalRmib')->with('success', 'Data soal RMIB berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SoalRmib $soalRmib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SoalRmib $soalRmib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SoalRmib $soalRmib)
    {
        SoalRmib::where('id', $request->id)->update([
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'tipe_soal' => $request->tipe_soal,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_kategori' => $request->kategori
        ]);

        return redirect('/admin/soalRmib')->with('success', 'Data soal RMIB berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoalRmib $soalRmib, Request $request)
    {
        SoalRmib::destroy($request->id);

        return redirect('/admin/soalRmib')->with('success', 'Data soal RMIB berhasil dihapus!');
    }
}
