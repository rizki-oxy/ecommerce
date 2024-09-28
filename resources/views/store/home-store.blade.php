@extends('layout.app')
@section('content')

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
      <div class="container position-relative">
        <h1>Store</h1>
        <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Store</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <div class="row mt-5" id="nav-store">
        <!-- Sidebar -->
        <div class="col-lg-12">
            <ul class="nav nav-tabs container">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Filter</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('store.filter', ['category_id' => 1]) }}">Produk</a></li>
                    <li><a class="dropdown-item" href="{{ route('store.filter', ['category_id' => 2]) }}">Layanan</a></li>
                  </ul>
                </li>
            </ul>
        </div>

    <!-- Courses Section -->
    <section id="courses" class="courses section">
        <div class="container">
            <!-- maincontent -->

                <div class="row gy-4">
                    @foreach ($mains as $main)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="course-item">
                            <img src="{{ asset($main->foto) }}" class="img-fluid" alt="...">
                            <div class="course-content">
                            <h3><a href="{{ route('detail.store', $main->id) }}">{{$main->nama_barang}}</a></h3>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <p class="price">{{$main->harga}}</p>
                                <p class="category">{{$main->promo}}</p>
                            </div>
                            <a href="https://wa.me/6282183854660?text={{ urlencode('Halo! Saya ingin check out produk '.$main->nama_barang.' dengan harga Rp'.$main->harga) }}" target="_blank" class="btn btn-primary w-100">Check Out</a>
                            <div class="trainer d-flex justify-content-between align-items-center">
                                <div class="trainer-profile d-flex align-items-center">
                                <a href="" class="trainer-link">{{$main->store->nama_toko}}</a>
                                </div>
                                <div class="trainer-rank d-flex align-items-center">
                                <i class="bi bi-person user-icon"></i>&nbsp;50
                                &nbsp;&nbsp;
                                <i class="bi bi-heart heart-icon"></i>&nbsp;65
                                </div>
                            </div>
                            </div>
                        </div>
                    </div> <!-- End Course Item-->
                    @endforeach

                </div>

          </div>

        </div>

    </section><!-- /Courses Section -->
  </main>

@endsection
