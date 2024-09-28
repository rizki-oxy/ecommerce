@extends('layout.app')
@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
            <h1>Edit Data User</h1>
            <p>Benerin data user dulu yuk!</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li class="current">Edit Data User</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-5">
                    <div class="card-header">Edit data user</div>
                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="mx-3 my-3">
                        @csrf
                        @method('PUT')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_peserta">Nomor Peserta</label>
                            <input type="number" name="nomor_peserta" id="nomor_peserta" class="form-control" value="{{ old('nomor_peserta', $user->nomor_peserta) }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $user->alamat) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="lulusan_bpvp">Lulusan BPVP</label>
                            <input type="text" name="lulusan_bpvp" id="lulusan_bpvp" class="form-control" value="{{ old('lulusan_bpvp', $user->lulusan_bpvp) }}">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Posisi</label>
                            <select class="form-select form-select-sm mb-3" name="role_id" aria-label="Small select example">
                                <option value="">Pilih Posisi</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>{{ $role->role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        <p>Kembali ke <a href="{{ route('users.index') }}">Daftar Pengguna</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
