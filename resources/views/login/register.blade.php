@extends('layout.app')
@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
        <h1>Register</h1>
        <p>Daftar dulu yuk!</p>
        <nav class="breadcrumbs">
            <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Register</li>
            </ol>
        </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-5">
                    <div class="card-header">Daftar</div>
                    <form action="{{ route('register') }}" method="POST" class="mx-3 my-3">
                        @csrf
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
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="lulusan_bpvp">Lulusan BPVP</label>
                            <input type="text" name="lulusan_bpvp" id="lulusan_bpvp" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_peserta">Nomor Peserta</label>
                            <input type="number" name="nomor_peserta" id="nomor_peserta" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_Wa">Nomor WhatsApp</label>
                            <input type="text" name="no_wa" id="no_wa" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label for="kategori" class="form-label">Posisi</label>
                            @if (auth()->check() && auth()->user()->role_id == 1)
                            <select class="form-select form-select-sm mb-3" name="role_id" aria-label="Small select example">
                                <option value="">Pilih Posisi</option>
                                @foreach ($roles as $role)
                                    @if ($role->id == 1 || $role->id == 2 || $role->id == 3)
                                        <option value="{{$role->id}}">{{$role->role}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @else
                                <select class="form-select form-select-sm mb-3" name="role_id" aria-label="Small select example">
                                    <option value="">Pilih Posisi</option>
                                    @foreach ($roles as $role)
                                        @if ($role->id == 2 || $role->id ==3)
                                            <option value="{{$role->id}}">{{$role->role}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                        <p>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

