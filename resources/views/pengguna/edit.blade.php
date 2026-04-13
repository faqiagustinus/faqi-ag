@extends('layouts.app')   {{-- Ganti jika layout kamu berbeda, misalnya layouts.main --}}

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4>Edit Data Pengguna</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('pengguna.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" 
                                   name="email" 
                                   class="form-control" 
                                   value="{{ old('email', $user->email) }}" 
                                   required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password Baru 
                                <small class="text-muted">(kosongkan jika tidak ingin mengubah)</small>
                            </label>
                            <input type="password" 
                                   name="password" 
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" 
                                   name="password_confirmation" 
                                   class="form-control">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary me-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 