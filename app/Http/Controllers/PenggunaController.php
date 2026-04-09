<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    public function loginForm()
    {
         return view('login');
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)
                    ->where('password', $request->password)
                    ->first();

        if ($user) {
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

    return view('daftar_pengguna');
}

    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }

    public function index()
    {
        return "riyan birahi";
    }

    public function create()
    {
        return "Simpan pengguna";
    }
}