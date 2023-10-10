<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\KategoriRmib;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\BobotRmib;

class KategoriRmibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriRmib = KategoriRmib::all();

        return view('admin/kategoriRmib', compact('kategoriRmib'));
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
        KategoriRmib::create([
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'nomor' => $request->nomor
        ]);

        $id = KategoriRmib::select('id')->orderBy('id', 'desc')->first();

        $bobotRmib = BobotRmib::select('id_alternatif')->groupBy('id_alternatif')->get();
        $count = count($bobotRmib);
        for ($i = 0; $i < $count; $i++)
        {
            BobotRmib::create([
                'id_alternatif' => $bobotRmib[$i]->id_alternatif,
                'id_kategoriRmib' => $id->id,
                'bobot' => 0
            ]);
        }

        return redirect('/admin/kategoriRmib')->with('success', 'Data kategori RMIB berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriRmib $kategoriRmib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriRmib $kategoriRmib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriRmib $kategoriRmib)
    {
        KategoriRmib::where('id', $request->id)->update([
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'nomor' => $request->nomor
        ]);

        return redirect('/admin/kategoriRmib')->with('success', 'Data kategori RMIB berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriRmib $kategoriRmib, Request $request)
    {
        KategoriRmib::destroy($request->id);

        return redirect('/admin/kategoriRmib')->with('success', 'Data kategori RMIB berhasil dihapus!');
    }
}
