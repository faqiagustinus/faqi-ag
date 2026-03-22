@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<h2>Dashboard</h2>
<p>Selamat datang, <b>{{ session('user') }}</b> 👋</p>

<!-- CARD INFO -->
<div class="card">
    <h3>Informasi</h3>
    <p>Ini adalah halaman dashboard utama.</p>
</div>

<!-- CARD MENU -->
<div class="card">
    <h3>Menu Utama</h3>
    <ul>
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/caesar">Caesar Cipher</a></li>
    </ul>
</div>

<!-- CARD FITUR -->
<div class="card">
    <h3>Fitur Aplikasi</h3>
    <p>Aplikasi ini menggunakan:</p>
    <ul>
        <li>Laravel (MVC)</li>
        <li>Controller (PenggunaController)</li>
        <li>Session Login Manual</li>
        <li>Routing Web</li>
    </ul>
</div>

<!-- CARD STATUS -->
<div class="card">
    <h3>Status Login</h3>
    <p>Kamu sedang login sebagai:</p>
    <b>{{ session('user') }}</b>
</div>

@endsection