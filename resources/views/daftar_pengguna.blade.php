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

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Password</th>
            <th>Created_at</th>
            <th>Updated_at</th>
        </tr>
    </thead>
    <tbody>
        @forelse($dataPengguna as $pengguna)
            <tr>
                <td>{{ $pengguna->id }}</td>
                <td>{{ $pengguna->email }}</td>
                <td>{{ $pengguna->password }}</td>
                <td>{{ $pengguna->created_at ? $pengguna->created_at->format('Y-m-d H:i:s') : '-' }}</td>
                <td>{{ $pengguna->updated_at ? $pengguna->updated_at->format('Y-m-d H:i:s') : '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align: center; padding: 30px;">Belum ada data pengguna</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection