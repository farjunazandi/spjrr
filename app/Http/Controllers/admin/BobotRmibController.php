<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\BobotRmib;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Alternatif;
use App\Models\admin\KategoriRmib;

class BobotRmibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::all();
        $bobotRmib = BobotRmib::select('id_alternatif')->groupBy('id_alternatif')->get();
        $kategoriRmib = KategoriRmib::all();

        return view('admin/bobotRmibRaporAdmin', compact('alternatif', 'bobotRmib', 'kategoriRmib'));
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
            $count = count($request->id_kategoriRmib);

            for ($i = 0; $i < $count; $i++) {
                BobotRmib::create([
                    'id_alternatif' =>$request->alternatif,
                    'id_kategoriRmib' => $request->id_kategoriRmib[$i],
                    'bobot' => $request->bobot[$i]
                ]);
            }

            return redirect('/admin/bobotRmib')->with('success', 'Data bobot nilai RMIB berhasil ditambahkan!');
        } else {
            return redirect('/admin/bobotRmib')->with('error', 'Data jurusan tidak boleh kosong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(BobotRmib $bobotRmib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BobotRmib $bobotRmib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BobotRmib $bobotRmib)
    {
        
    }

    public function aturBobot(Request $request)
    {
        $count = count($request->id);

        for ($i = 0; $i < $count; $i++)
        {
            BobotRmib::where('id', $request->id[$i])->update([
                'bobot' => $request->bobot[$i]
            ]);
        }
        return redirect('/admin/bobotRmib')->with('success', 'Data bobot nilai RMIB berhasil diatur!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BobotRmib $bobotRmib)
    {
        //
    }

    public function hapusBobot(Request $request)
    {
        $ids = BobotRmib::where('id_alternatif', $request->id_alternatif)->get();
        foreach ($ids as $id)
        {
            BobotRmib::destroy($id->id);
        }

        return redirect('/admin/bobotRmib')->with('success', 'Data bobot nilai RMIB berhasil dihapus!');
    }
}
