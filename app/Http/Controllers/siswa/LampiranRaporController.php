<?php

namespace App\Http\Controllers\siswa;

use App\Models\siswa\LampiranRapor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class LampiranRaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $validateData = $request->validate(['fileRapor' => 'required']);

        $validateData['id_siswa'] = $request->id_siswa;
        $validateData['file'] = $request->file('fileRapor')->store('lampiranRapor');
        $validateData['nama_file'] = $request->file('fileRapor')->getClientOriginalName();
        $validateData['submit'] = '0';

        LampiranRapor::create($validateData);

        return redirect('/siswa/raporSiswa')->with('success', 'Lampiran rapor berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(LampiranRapor $lampiranRapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LampiranRapor $lampiranRapor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LampiranRapor $lampiranRapor)
    {
        if ($request->file('fileRapor')) {
            if ($request->oldFile) {
                Storage::delete($request->oldFile);
            }
            $validateData['file'] = $request->file('fileRapor')->store('lampiranRapor');
            $validateData['nama_file'] = $request->file('fileRapor')->getClientOriginalName();
        }

        LampiranRapor::where('id', $request->id)->update($validateData);

        return redirect('/siswa/raporSiswa')->with('success', 'Lampiran rapor berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LampiranRapor $lampiranRapor)
    {
        //
    }
}
