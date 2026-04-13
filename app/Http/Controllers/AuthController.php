<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
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

    $dataPengguna = User::all();

    
    return view('daftar_pengguna', compact('dataPengguna'));
}
public function edit(User $user)
{
    return view('pengguna.edit', compact('user'));
}
public function update(Request $request, User $user)
{
    $request->validate([
        'email'    => 'required|email|unique:users,email,' . $user->id,
        'password' => 'nullable|min:6|confirmed',
    ]);

    $user->email = $request->email;

    if ($request->filled('password')) {
        $user->password = $request->password;
    }

    $user->save();

    return redirect()->route('dashboard')
                     ->with('success', 'Data pengguna berhasil diperbarui');
}
public function destroy(User $user)
{
    $user->delete();

    return redirect()->route('dashboard')
                     ->with('success', 'Pengguna berhasil dihapus');
}
public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => $request->password, 
    ]);

    return redirect()->route('dashboard')
                     ->with('success', 'Pengguna berhasil ditambahkan');
}
public function createForm()
{
    return view('pengguna.create');
}
    public function logout()
    {
        session()->forget('user');
        return redirect('/login');
    }

   
}