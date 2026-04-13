<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{

public function index()
{
    if (!session('login')) {
        return redirect('/login');
    }

    $dataPengguna = Pengguna::all();
    return view('daftar_pengguna', compact('dataPengguna'));
}

public function create()
{
    return $this->createForm();
}

public function edit(Pengguna $user)
{
    return view('pengguna.edit', compact('user'));
}

public function update(Request $request, Pengguna $user)
{
    $request->validate([
        'email'    => 'required|email|unique:pengguna,email,' . $user->id,
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

public function destroy(Pengguna $user)
{
    $user->delete();

    return redirect()->route('dashboard')
                     ->with('success', 'Pengguna berhasil dihapus');
}

public function store(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:pengguna,email',
        'password' => 'required|min:6|confirmed',
    ]);

    Pengguna::create([
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

}