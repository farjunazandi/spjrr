<?php

namespace App\Http\Controllers;

use App\Models\admin\Siswa;
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
        return view('siswa/authSiswa');
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

    public function loginSiswa(Request $request)
    {
        $siswa = Siswa::where('nisn', $request->nisn)->first();

        if ($siswa != null) {
            if (password_verify($request->password, $siswa->password)) {
                if ($siswa->aktif == '1') {
                    if ($siswa->ubah_password == '1') {
                        $request->session()->put('id', $siswa->id);
                        return redirect()->intended('/siswa/homeSiswa');
                    } else {
                        return redirect('/ubahPasswordSiswa')->with('id', $siswa->id);
                    }
                } else {
                    return back()->with('loginerror', 'Siswa sudah tidak aktif!');
                }
            } else {
                return back()->with('loginerror', 'NISN atau password salah!');
            }
        } else {
            return back()->with('loginerror', 'User tidak ditemukan!');
        }
    }

    public function ubahPasswordSiswa()
    {
        return view('siswa/ubahPasswordSiswa');
    }

    public function ubahPasswordSiswaProses(Request $request)
    {
        $siswa = Siswa::where('id', $request->id)->first();

        if (password_verify($request->password_lama, $siswa->password)) {
            Siswa::where('id', $request->id)->update([
                'password' => Hash::make($request->password_baru),
                'default_password' => $request->password_baru,
                'ubah_password' => '1'
            ]);
            $request->session()->put('id', $siswa->id);

            return redirect()->intended('/siswa/homeSiswa');
        } else {
            return back()->with('loginerror', 'Password lama tidak sesuai!');
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

    public function logoutAdmin()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/admin')->with('registersuccess', 'Anda berhasil keluar!');
    }

    public function logoutSiswa()
    {
        //Siswa::logout();

        session()->forget('tipe');
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/auth')->with('registersuccess', 'Anda berhasil keluar!');
    }
}
