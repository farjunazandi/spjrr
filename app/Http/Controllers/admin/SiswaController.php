<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Kelas;
use App\Models\admin\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();
        $kelas = Kelas::all();

        return view('admin/siswaAdmin', compact('siswas', 'kelas'));
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
        $str = Str::random(10);

        Siswa::create([
            'nisn' => $request->nisn,
            'id_kelas' => $request->kelas,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'password' => Hash::make($str),
            'default_password' => $str,
            'ubah_password' => '0',
            'aktif' => '1'
        ]);

        return redirect('/admin/siswaAdmin')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        Siswa::where('id', $request->id)->update([
            'nisn' => $request->nisn,
            'id_kelas' => $request->kelas,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'aktif' => $request->aktif
        ]);

        return redirect('/admin/siswaAdmin')->with('success', 'Data siswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa, Request $request)
    {
        Siswa::destroy($request->id);

        return redirect('/admin/siswaAdmin')->with('success', 'Data siswa berhasil dihapus!');
    }

    public function resetPassword(Request $request)
    {
        Siswa::where('id', $request->id)->update([
            'password' => Hash::make($request->password),
            'default_password' => $request->password,
            'ubah_password' => '0'
        ]);

        return redirect('/admin/siswaAdmin')->with('success', 'Password berhasil diubah!');
    }
}
