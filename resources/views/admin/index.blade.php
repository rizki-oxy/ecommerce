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
        <!-- Services Section -->
        <section id="alumni-services" class="alumni-services section ">


            <div class="container">

                <div class="row g-4">

                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item item-cyan position-relative">
                            <i class="bi bi-activity icon"></i>
                            <div>
                                @php
                                    $main = $mains->first(); // Ambil data pertama dari koleksi
                                @endphp

                                <h3>Profil Toko</h3>
                                <p>Nama Toko : {{ $main->store->nama_toko ?? 'N/A' }}</p>
                                <p>Alamat Toko : {{ $main->store->alamat_lengkap ?? 'N/A' }}</p>
                                <p>Kontak Toko : {{ $main->store->no_wa ?? 'N/A' }}</p>
                                <div class="mt-2">
                                    <button class="btn btn-outline-warning">Belum Terverifikasi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Item -->


                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item item-orange position-relative">
                            <i class="bi bi-broadcast icon"></i>
                            <div>
                                <h3>Pendapatan</h3>
                                <p>Periode : 01/09/2024 - 30/09/2024</p>
                                <h3 class="mt-2">Rp. 1.000.000</h3>
                                <a href="#" class="read-more stretched-link">Learn More <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item item-teal position-relative">
                            <i class="bi bi-easel icon"></i>
                            <div>
                                <h3>Item Terjual</h3>
                                <p>Periode : 01/09/2024 - 30/09/2024</p>
                                <h3 class="mt-2">Produk : 7</h3>
                                <a href="#" class="read-more stretched-link">Learn More <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item item-red position-relative">
                            <i class="bi bi-bounding-box-circles icon"></i>
                            <div>
                                <h3>Total Stok Barang Tersedia</h3>
                                <p>Produk : <b>{{$totalProduk}}</b></p>
                                <p>Layanan : <b>{{$totalLayanan}}</b></p>
                                <a href="#" class="read-more stretched-link">Learn More <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item item-indigo position-relative">
                            <i class="bi bi-calendar4-week icon"></i>
                            <div>
                                <h3>Barang Perlu Dikirim</h3>
                                <p><b>7</b> Barang perlu dikirim sekarang</p>
                                <a href="#" class="read-more stretched-link">Learn More <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="600">
                        <div class="service-item item-pink position-relative">
                            <i class="bi bi-chat-square-text icon"></i>
                            <div>
                                <h3>Pembayaran Perlu Dikonfirmasi</h3>
                                <p><b>5</b> pembayaran perlu dikonfirmasi sekarang</p>
                                <a href="#" class="read-more stretched-link">Learn More <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="500">
                        <div class="service-item item-indigo position-relative">
                            <i class="bi bi-calendar4-week icon"></i>
                            <div>
                                <h3>Rekap Data Barang</h3>
                                <p>Periksa data barang disini</p>
                                <a href="#databarang" class="read-more stretched-link">Learn More <i
                                        class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="col-12" id="databarang">
            <div class="card recent-sales overflow-auto">
                <div class="card-body border" style="border-radius:10px">
                    <div class="row d-flex justify-content-between align-items-center mb-3">
                        <!-- Judul Card di Sebelah Kiri -->
                        <div class="col-auto">
                            <h3 class="card-title mb-0">Data Barang</h3>
                        </div>

                        <!-- Filter dan Tombol di Sebelah Kanan -->
                        <div class="col-auto d-flex align-items-center">
                            <!-- Tombol Masukan Data Baru -->
                            <a class="btn btn-success" href="{{ route('admin.create') }}">Masukan Data Baru</a>
                        </div>
                    </div>

                    <!-- Tabel User -->
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Diskon (%)</th>
                                <th scope="col">Promo</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Nama Toko</th>
                                <th scope="col">Foto</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($mains as $main)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $main->nama_barang }}</td>
                                    <td>{{ $main->harga }}</td>
                                    <td>{{ $main->diskon }}</td>
                                    <td>{{ $main->promo }}</td>
                                    <td>{{ $main->qty }}</td>
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
        </div>
    </div>
@endsection
