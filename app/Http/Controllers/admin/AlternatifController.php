<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Alternatif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::all();

        return view('admin/alternatifAdmin', compact('alternatif'));
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
        Alternatif::create([
            'nama_jurusan' => $request->nama_jurusan,
            'detail' => $request->detail
        ]);

        return redirect('/admin/alternatifAdmin')->with('success', 'Data alternatif berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alternatif $alternatif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alternatif $alternatif)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alternatif $alternatif)
    {
        Alternatif::where('id', $request->id)->update([
            'nama_jurusan' => $request->nama_jurusan,
            'detail' => $request->detail
        ]);

        return redirect('/admin/alternatifAdmin')->with('success', 'Data alternatif berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alternatif $alternatif, Request $request)
    {
        Alternatif::destroy($request->id);

        return redirect('/admin/alternatifAdmin')->with('success', 'Data alternatif berhasil dihapus!');
    }
}
