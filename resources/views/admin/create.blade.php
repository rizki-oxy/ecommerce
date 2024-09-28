@extends('layout.app')
@section('content')

  <main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url('{{ asset('assets/img/page-title-bg.jpg') }}');">
        <div class="container position-relative">
          <h1>Data</h1>
          <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
          <nav class="breadcrumbs">
            <ol>
              <li><a href="/">Home</a></li>
              <li class="current">Data</li>
            </ol>
          </nav>
        </div>
      </div><!-- End Page Title -->
    </main>

    <div class="container mt-5 mb-5">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>OPSSS!!</strong>Terdapat masalah di dalam input kamu <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Barang/Layanan</label>
                <input class="form-control" type="text" name="nama_barang" placeholder="ex : iPhone 12 128GB" aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                <input class="form-control" type="text" name="deskripsi" placeholder="Masukan Deskripsi/Layanan" aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Promo</label>
                <input class="form-control" type="text" name="promo" placeholder="ex : Buy 1 Get 1(bukan diskon)" aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                <input class="form-control" type="decimal" name="harga" placeholder="80000" aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Diskon</label>
                <input class="form-control" type="number" name="diskon" placeholder="20" aria-label="default input example">
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Nama Toko</label>
                <select class="form-select form-select-sm mb-3" name="store_id" aria-label="Small select example">
                    <option value="">Pilih Toko</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->nama_toko }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select form-select-sm mb-3" name="category_id" aria-label="Small select example">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto Barang:</label>
                <input class="form-control" type="file" id="foto" name="foto">
              </div>

            <div class="col-12 mb-3">
                <button class="btn btn-primary" type="submit">Submit Data</button>
            </div>
        </div>
    </form>
    </div>

@endsection
