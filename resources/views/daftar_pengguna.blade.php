@extends('layouts.app')

@section('title', 'Data Pengguna')

@section('content')

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f8f9fa;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin-bottom: 30px;
    }

    th, td {
        border: 1px solid #555;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #4f46e5;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f8f9fa;
    }
</style>

<h1>Data Pengguna</h1>
<div class="mb-3">
    <a href="{{ route('pengguna.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Tambah Pengguna Baru
    </a>
</div>

<table class="table table-bordered" style="width:100%">

</table>
<table class="table table-bordered" style="width:100%">
    <thead class="table-primary">
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th class="text-center" width="180">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataPengguna as $pengguna)
        <tr>
            <td>{{ $pengguna->id }}</td>
            <td>{{ $pengguna->email }}</td>
            <td>{{ $pengguna->password }}</td>
            <td>{{ $pengguna->created_at ? $pengguna->created_at->format('Y-m-d H:i:s') : '-' }}</td>
            <td>{{ $pengguna->updated_at ? $pengguna->updated_at->format('Y-m-d H:i:s') : '-' }}</td>
            
            <td class="text-center">
                <!-- Tombol Edit -->
                <a href="{{ route('pengguna.edit', $pengguna->id) }}" 
                   class="btn btn-warning btn-sm me-1">
                    <i class="fas fa-edit"></i> Edit
                </a>
                
                <!-- Tombol Hapus -->
                <form action="{{ route('pengguna.destroy', $pengguna->id) }}" 
                      method="POST" 
                      style="display: inline;"
                      onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection