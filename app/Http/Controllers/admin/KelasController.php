<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();

        return view('admin/kelasAdmin', compact('kelas'));
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
        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'aktif' => $request->aktif
        ]);

        return redirect('/admin/kelasAdmin')->with('success', 'Data kelas berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        Kelas::where('id', $request->id)->update([
            'nama_kelas' => $request->nama_kelas,
            'aktif' => $request->aktif
        ]);

        return redirect('/admin/kelasAdmin')->with('success', 'Data kelas berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas, Request $request)
    {
        Kelas::destroy($request->id);

        return redirect('/admin/kelasAdmin')->with('success', 'Data kelas berhasil dihapus!');
    }
}
