@extends('layout.app')

@section('content')
<div class="container">
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
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @php $i = 0; @endphp

                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $main->nama_barang }}</td>
                        <td>{{ $main->harga }}</td>
                        <td>{{ $main->diskon }}</td>
                        <td>{{ $main->promo }}</td>
                        <td>{{ $main->category->kategori ?? 'N/A' }}</td>
                        <td>{{ $main->store->nama_toko ?? 'N/A' }}</td>

                    </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection
