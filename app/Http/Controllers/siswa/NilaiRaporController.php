<?php

namespace App\Http\Controllers\siswa;

use App\Models\siswa\NilaiRapor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\MataPelajaran;
use App\Models\admin\Siswa;
use App\Models\siswa\LampiranRapor;

class NilaiRaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = session()->get('id');
        $siswa = Siswa::where('id', $id)->first();

        $nilaiRapor = NilaiRapor::where('id_siswa', $id)->get();
        $count = count($nilaiRapor);
        $mataPelajaran = MataPelajaran::where('aktif', '1')->get();
        $submitRapor = LampiranRapor::where('id_siswa', $id)->where('submit', '1')->get();
        $submit = count($submitRapor);
        $lampiranRapor = LampiranRapor::where('id_siswa', $id)->first();

        return view('siswa/nilaiRaporSiswa', compact('siswa', 'nilaiRapor', 'count', 'mataPelajaran', 'submit', 'lampiranRapor'));
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
        $id = session()->get('id');
        $count = count($request->id_mapel);
        for ($i = 0; $i < $count; $i++) {
            NilaiRapor::create([
                'id_siswa' => $id,
                'id_mapel' => $request->id_mapel[$i],
                'semester1' => $request->semester1[$i],
                'semester2' => $request->semester2[$i],
                'rata_rata' => ($request->semester1[$i] + $request->semester2[$i]) / 2
            ]);
        }

        return redirect('/siswa/raporSiswa')->with('success', 'Nilai rapor berhasil di simpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(NilaiRapor $nilaiRapor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NilaiRapor $nilaiRapor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NilaiRapor $nilaiRapor)
    {
        //
    }

    public function updateRapor(Request $request)
    {
        $id = session()->get('id');
        $count = count($request->id);
        for ($i = 0; $i < $count; $i++) {
            NilaiRapor::where('id', $request->id[$i])->update([
                'semester1' => $request->semester1[$i],
                'semester2' => $request->semester2[$i],
                'rata_rata' => ($request->semester1[$i] + $request->semester2[$i]) / 2
            ]);
        }

        return redirect('/siswa/raporSiswa')->with('success', 'Nilai rapor berhasil di simpan!');
    }

    public function submitRapor()
    {
        $id = session()->get('id');
        $nilaiRapor = NilaiRapor::where('id_siswa', $id)->get();
        $lampiranRapor = LampiranRapor::where('id_siswa', $id)->get();

        if (count($nilaiRapor) > 0 AND count($lampiranRapor) > 0) {
            LampiranRapor::where('id_siswa', $id)->update(['submit'=>'1']);

            return $this->prosesSubmit();
        } else {
            return back()->with('error', 'Nilai rapor atau lampiran rapor belum di input!');
        } 
    }

    public function prosesSubmit()
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NilaiRapor $nilaiRapor)
    {
        //
    }
}
