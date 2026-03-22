<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
    //


{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($request->email == "admin@gmail.com" && $request->password == "12345") {
            session(['user' => $request->email]);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function dashboard()
    {
        if (!session('user')) {
            return redirect('/login');
        }

        return view('dashboard');
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }

    public function index()
    {
        return "Halo dari controller";
    }

    public function create()
    {
        return "Simpan pengguna";
    }
}