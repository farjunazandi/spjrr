<?php

namespace App\Http\Controllers\siswa;

use App\Models\siswa\TesRmib;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Siswa;
use App\Models\admin\SoalRmib;
use App\Models\siswa\HasilRmib;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TesRmibController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = session()->get('id');
        $siswa = Siswa::where('id', $id)->first();

        $hasilRmib = HasilRmib::where('id_siswa', $id)->orderBy('total_bobot', 'asc')->get();
        if (count($hasilRmib) > 0) {
            return view('siswa/hasilRmibSiswa', compact('siswa', 'hasilRmib'));
        } else {
            return view('siswa/tesRmibSiswa');
        }
    }

    public function formSiswa()
    {
        $tipeSoal = new Collection(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I']);
        $id = session()->get('id');
        $siswa = Siswa::where('id', $id)->first();

        if (session()->has('tipe')) {
            session()->get('tipe');
        } else {
            session()->put('tipe', 'A');
        }

        $soalA = SoalRmib::where('tipe_soal', 'A')
                            ->where('jenis_kelamin', $siswa->jenis_kelamin)
                            ->orderBy('id', 'ASC')->get();
        $soalB = SoalRmib::where('tipe_soal', 'B')
                            ->where('jenis_kelamin', $siswa->jenis_kelamin)
                            ->orderBy('id', 'ASC')->get();
        $soalC = SoalRmib::where('tipe_soal', 'C')
                            ->where('jenis_kelamin', $siswa->jenis_kelamin)
                            ->orderBy('id', 'ASC')->get();
        $soalD = SoalRmib::where('tipe_soal', 'D')
                            ->where('jenis_kelamin', $siswa->jenis_kelamin)
                            ->orderBy('id', 'ASC')->get();
        $soalE = SoalRmib::where('tipe_soal', 'E')
                            ->where('jenis_kelamin', $siswa->jenis_kelamin)
                            ->orderBy('id', 'ASC')->get();
        $soalF = SoalRmib::where('tipe_soal', 'F')
                            ->where('jenis_kelamin', $siswa->jenis_kelamin)
                            ->orderBy('id', 'ASC')->get();
        $soalG = SoalRmib::where('tipe_soal', 'G')
                            ->where('jenis_kelamin', $siswa->jenis_kelamin)
                            ->orderBy('id', 'ASC')->get();
        $soalH = SoalRmib::where('tipe_soal', 'H')
                            ->where('jenis_kelamin', $siswa->jenis_kelamin)
                            ->orderBy('id', 'ASC')->get();
        $soalI = SoalRmib::where('tipe_soal', 'I')
                            ->where('jenis_kelamin', $siswa->jenis_kelamin)
                            ->orderBy('id', 'ASC')->get();

        return view('siswa/formRmibSiswa', compact('tipeSoal', 'soalA', 'soalB', 'soalC', 'soalD', 'soalE', 'soalF', 'soalG', 'soalH', 'soalI', 'siswa'));
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
        session()->forget('tipe');

        $count = count($request->id_soal);

            for ($i = 0; $i < $count; $i++) {
                TesRmib::create([
                    'id_siswa' =>$request->id_siswa,
                    'id_kategori' => $request->id_kategori[$i],
                    'id_soal' => $request->id_soal[$i],
                    'tipe_soal' => $request->tipe_soal[$i],
                    'bobot' => $request->bobot[$i]
                ]);
            }

            if ($request->next_tipe == "end") {
                return $this->hitungRmib();
            }

        session()->put('tipe', $request->next_tipe);

        return redirect('/siswa/formSiswa')->with('success', 'Form RMIB berhasil di submit!');
    }

    public function hitungRmib()
    {
        $id = session()->get('id');
        $siswa = Siswa::where('id', $id)->first();

        $tesRmib = TesRmib::where('id_siswa', $id)
                            ->groupBy('id_kategori')
                            ->get(['id_kategori', DB::raw('SUM(bobot) AS bobot')]);
        $count = count($tesRmib);
        for ($i = 0; $i < $count; $i++)
        {
            HasilRmib::create([
                'id_siswa' => $id,
                'id_kategori' => $tesRmib[$i]->id_kategori,
                'total_bobot' => $tesRmib[$i]->bobot
            ]);
        }

        return redirect('/siswa/tesRmibSiswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(TesRmib $tesRmib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TesRmib $tesRmib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TesRmib $tesRmib)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TesRmib $tesRmib)
    {
        //
    }
}
