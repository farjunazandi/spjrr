<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\BobotRapor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Alternatif;
use App\Models\admin\Kriteria;

class BobotRaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
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
        if ($request->alternatif != "null")
        {
            $count = count($request->id_mapel);

            for ($i = 0; $i < $count; $i++) {
                BobotRapor::create([
                    'id_alternatif' =>$request->alternatif,
                    'id_mapel' => $request->id_mapel[$i],
                    'bobot' => $request->bobot[$i]
                ]);
            }

            return redirect('/admin/bobotRmib')->with('success', 'Data bobot nilai Rapor berhasil ditambahkan!');
        } else {
            return redirect('/admin/bobotRmib')->with('error', 'Data jurusan tidak boleh kosong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BobotRapor $bobotRapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BobotRapor $bobotRapor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BobotRapor $bobotRapor)
    {
        $count = count($request->id);

        for ($i = 0; $i < $count; $i++)
        {
            BobotRapor::where('id', $request->id[$i])->update([
                'bobot' => $request->bobot[$i]
            ]);
        }
        return redirect('/admin/bobotRmib')->with('success', 'Data bobot nilai RMIB berhasil diatur!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BobotRapor $bobotRapor)
    {
        //
    }

    public function aturBobot(Request $request)
    {
        $count = count($request->id);

        for ($i = 0; $i < $count; $i++)
        {
            BobotRapor::where('id', $request->id[$i])->update([
                'bobot' => $request->bobot[$i]
            ]);
        }
        return redirect('/admin/bobotRmib')->with('success', 'Data bobot nilai Rapor berhasil diatur!');
    }
}
