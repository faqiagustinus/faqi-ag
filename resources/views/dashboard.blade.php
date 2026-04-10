@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<style>
    .dashboard { padding: 30px; }
    
    .welcome {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 25px;
        border-radius: 15px;
        margin-bottom: 25px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        transition: .3s;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card h3 {
        margin-bottom: 10px;
        color: #4f46e5;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        margin-top: 30px;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #4f46e5;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    .logout {
        margin-top: 40px;
        text-align: center;
    }

    .logout button {
        background: #ef4444;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
    }

    .logout button:hover {
        background: #dc2626;
    }
</style>

<div class="dashboard">

    <div class="welcome">
        <h2>Dashboard</h2>
        <p>Selamat datang, <b>{{ session('user') }}</b> 👋</p>
    </div>

    <div class="grid">
        <div class="card">
            <h3>Informasi</h3>
            <p>Halaman dashboard balap</p>
        </div>

        <div class="card">
            <h3>Menu</h3>
            <ul>
                <li><a href="/caesar">Caesar Cipher</a></li>
            </ul>
        </div>

        <div class="card">
            <h3>Fitur</h3>
            <ul>
                <li>Laravel MVC</li>
                <li>Session Login</li>
                <li>Controller</li>
                <li>Routing</li>
            </ul>
        </div>

        <div class="card">
            <h3>Status Login</h3>
            <p>Login sebagai:</p>
            <b>{{ session('user') }}</b>
        </div>
    </div>

    <h3>Data Pengguna</h3>
    
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
                    <td colspan="5" style="text-align: center; padding: 20px;">Belum ada data pengguna</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

</div>

@endsection