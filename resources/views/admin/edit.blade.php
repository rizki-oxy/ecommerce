@extends('layout.app')
@section('content')

<main class="main">
    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url('{{ asset('assets/img/page-title-bg.jpg') }}');">
        <div class="container position-relative">
          <h1>Edit Data</h1>
          <p>Ubah data barang/layanan sesuai kebutuhan.</p>
          <nav class="breadcrumbs">
            <ol>
              <li><a href="/">Home</a></li>
              <li class="current">Edit Data</li>
            </ol>
          </nav>
        </div>
      </div><!-- End Page Title -->
</main>

<div class="container mt-5 mb-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>OPSSS!!</strong> Terdapat masalah di dalam input kamu <br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.update', $main->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Barang/Layanan</label>
                <input class="form-control" type="text" name="nama_barang" value="{{ old('nama_barang', $main->nama_barang) }}" placeholder="ex : iPhone" aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
                <input class="form-control" type="text" name="deskripsi" value="{{ old('deskripsi', $main->deskripsi) }}" placeholder="Masukan deskirpsi produk kamu" aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Promo</label>
                <input class="form-control" type="text" name="promo" value="{{ old('promo', $main->promo) }}" placeholder="Buy 1 Get 1" aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga</label>
                <input class="form-control" type="decimal" name="harga" value="{{ old('harga', $main->harga) }}" placeholder="80000" aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Diskon</label>
                <input class="form-control" type="number" name="diskon" value="{{ old('diskon', $main->diskon) }}" placeholder="20" aria-label="default input example">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Toko</label>
                <select class="form-select form-select-sm mb-3" name="store_id" aria-label="Small select example">
                    <option value="" selected>Pilih Toko</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" {{ $store->id == old('store_id', $main->store_id) ? 'selected' : '' }}>
                            {{ $store->nama_toko }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select form-select-sm mb-3" name="category_id" aria-label="Small select example">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $main->category_id) ? 'selected' : '' }}>
                            {{ $category->kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Bagian untuk mengedit foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Ganti Foto Barang:</label>
                <input class="form-control" type="file" id="foto" name="foto">
                <!-- Tampilkan preview foto saat ini -->
                @if ($main->foto)
                    <img src="{{ asset($main->foto) }}" alt="Foto saat ini" class="mt-3" style="max-width: 200px;">
                @endif
            </div>

            <div class="col-12 mb-3">
                <button class="btn btn-primary" type="submit">Submit Data</button>
            </div>
        </div>
    </form>
</div>

@endsection
