<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function auth()
    {
        //return view('admin/authAdmin');
    }

    public function authAdmin()
    {
        return view('admin/authAdmin');
    }

    public function registerAdmin()
    {
        return view('admin/registerAdmin');
    }

    public function createAdmin(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        User::create($validateData);

        return redirect('/adminRegister')->with('registersuccess', 'Akun berhasil dibuat! Mohon hubungi administrator untuk aktivasi akun anda!');
    }

    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->aktif == 1) {
                return redirect()->intended('/admin/homeAdmin');
            } else {
                return redirect('/admin')->with('loginerror', 'Akun anda belum diaktivasi! Mohon hubungi administrator untuk aktivasi akun!');
            }
        } else {
            return back()->with('loginerror', 'Login Failed!');
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
