@extends('layouts.app')  

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4>Tambah Pengguna Baru</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengguna.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" 
               name="name" 
               class="form-control" 
               value="{{ old('name') }}" 
               required>
        @error('name')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" 
               name="email" 
               class="form-control" 
               value="{{ old('email') }}" 
               required>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" 
               name="password" 
               class="form-control" 
               required>
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Konfirmasi Password</label>
        <input type="password" 
               name="password_confirmation" 
               class="form-control" 
               required>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-success">Simpan Pengguna</button>
    </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection