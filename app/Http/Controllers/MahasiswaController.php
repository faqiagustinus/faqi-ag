<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();
        $dataPengguna = [];  
        return view('mahasiswa', compact('data', 'dataPengguna'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa');
    }

    public function edit($id)
    {
        $data = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Mahasiswa::find($id);
        $data->update($request->all());
        return redirect('/mahasiswa');
    }

    public function destroy($id)
    {
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect('/mahasiswa');
    }
}