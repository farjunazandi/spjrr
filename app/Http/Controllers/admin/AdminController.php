<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = User::all();


        return view('admin/dataAdmin', compact('admins'));
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
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make(123)
        ]);

        return redirect('/admin/dataAdmin')->with('success', 'Data user berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role
        ]);

        return redirect('/admin/dataAdmin')->with('success', 'Data user berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        User::destroy($request->id);

        return redirect('/admin/dataAdmin')->with('success', 'Data user berhasil dihapus!');
    }

    public function activate(Request $request)
    {
        User::where('id', $request->id)->update(['aktif' => '1']);

        return redirect('/admin/dataAdmin')->with('success', 'Data user berhasil diaktifkan!');
    }

    public function deactivate(Request $request)
    {
        User::where('id', $request->id)->update(['aktif' => '0']);

        return redirect('/admin/dataAdmin')->with('success', 'Data user berhasil dinonaktifkan!');
    }
}
