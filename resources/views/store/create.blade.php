@extends('layout.app')
@section('content')

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
        <h1>Register Toko</h1>
        <p>Daftar toko kamu dulu yuk!</p>
        <nav class="breadcrumbs">
            <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Store Register</li>
            </ol>
        </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container mx-auto">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card my-5">
                    <div class="card-header">Daftar</div>
                    @if ($storeCount >=1)
                        <p class="mx-3 my-3">Anda sudah memiliki 1 toko, anda tidak dapat membuat toko baru</p>
                    @else
                    <form action="{{ route('store.store') }}" method="POST" class="mx-3 my-3" disabled>
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
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="nama_toko">Nama Toko</label>
                            <input type="text" name="nama_toko" id="nama_toko" class="form-control" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_kota">Alamat Kota</label>
                            <input type="text" name="alamat_kota" id="alamat_kota" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_lengkap">Alamat Lengkap</label>
                            <input type="text" name="alamat_lengkap" id="alamat_lengkap" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_wa">Nomor WhatsApp Toko</label>
                            <input type="text" name="no_wa" id="no_wa" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Daftar</button>

                    </form>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection

