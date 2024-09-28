@extends('layout.app')

@section('content')

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
    <div class="container position-relative">
      <h1>Data Barang</h1>
      <p>Pergunakan data barang sebaik mungkin</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">Data Barang</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

<div class="container my-3">
    <div class="row mb-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Data Produk</h2>
            <a class="btn btn-success" href="{{ route('admin.create') }}">Masukan Data Baru</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Promo</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Toko</th>
                    <th scope="col">Foto</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @php $i = 0; @endphp
                @foreach ($mains as $main)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $main->nama_barang }}</td>
                        <td>{{ $main->harga }}</td>
                        <td>{{ $main->diskon }}</td>
                        <td>{{ $main->promo }}</td>
                        <td>{{ $main->category->kategori ?? 'N/A' }}</td>
                        <td>{{ $main->store->nama_toko ?? 'N/A' }}</td>
                        <td>{{ $main->foto }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.destroy', $main->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('admin.show', $main->id) }}">View</a>
                                <a class="btn btn-primary" href="{{ route('admin.edit', $main->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
