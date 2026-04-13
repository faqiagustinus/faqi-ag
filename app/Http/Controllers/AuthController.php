<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

   public function prosesLogin(Request $request)
{
    $user = Pengguna::where('email', $request->email)->first();

    if ($user && $user->password == $request->password) {
        session(['user' => $user->email]);
        return redirect('/dashboard');
    }

    return back()->with('error', 'Email atau password salah');
}

    public function dashboard()
    {
        if (!session('user')) {
            return redirect('/login');
        }

        $dataPengguna = Pengguna::all();
        return view('daftar_pengguna', compact('dataPengguna'));
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }
}