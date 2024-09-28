@extends('layout.app')
@section('content')

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
    <div class="container position-relative">
      <h1>About</h1>
      <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="/">Home</a></li>
          <li><a href="/home-store">Store</a></li>
          <li class="current">Detail</li>
        </ol>
      </nav>
    </div>
</div><!-- End Page Title -->

<!-- Courses Course Details Section -->
<section id="courses-course-details" class="courses-course-details section">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-6">
                <div>
                    <img src="{{ asset($main->foto) }}" class="d-block w-100" alt="Gambar produk">
                </div>

                <h1 class="mt-3" style="font-size: 35px;"><b>{{$main->nama_barang}}</b></h1>
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <p class="card-text mb-0">
                        <span class="text-danger" style="font-size: 35px;"><b>Rp. {{$main->harga}}</b></span> <del style="font-size: 18px; color: grey;">Rp. 649,000</del>
                    </p>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-bell-fill me-2" style="font-size: 20px;"></i>
                        <p class="roboto-font mb-0" style="color: red; padding-right:10rem">Hanya untuk kamu!</p>
                    </div>
                </div>


                    <p class="mt-3 mb-2 me-2" style="font-size: 20px;"><b>Promo : <strong>{{$main->promo}}</strong></b></p>

                    <div>
                        <p class="mt-3 mb-2" style="font-size: 20px;"><b>Metode pembayaran</b></p>
                        <img src="{{ asset('assets/img/wa.svg') }}" alt="Metode Pembayaran" style="width: 100%; max-width: 200px; height: auto;" class="d-block float-start">
                    </div>


            </div>
            <div class="col-lg-6">
                <h4 class="card-title"><b><u>Make a deal here!</u></b></h4>
                <h4>Deskripsi</h4>
                <p class="w-100" style="font-size: 14px;">
                    {{$main->deskripsi}}
                </p>
                <div class="d-flex align-items-center">
                    <p class="mb-0 me-3" style="font-size: 14px;">
                        <mark class="bg-warning text-dark">Best Seller</mark>
                    </p>
                    <p class="mb-0 me-3" style="font-size: 16px;">
                        4.8
                    </p>
                    <img src="{{ asset('assets/img/star.png') }}" class="img-fluid me-3" alt="Star" style="width: 100px; height: 20px;">
                    <p class="mb-0" style="font-size: 16px;">
                        1M+ Learners
                    </p>
                </div>

                <a href="https://wa.me/6282183854660?text={{ urlencode('Halo! Saya ingin check out produk '.$main->nama_barang.' dengan harga Rp'.$main->harga) }}" target="_blank" class="btn btn-primary w-100 mt-3">Check Out</a>
                <a href="https://wa.me/6282183854660?text={{ urlencode('Halo, saya mau tanya tentang produk ' . $main->nama_barang . ' ini!') }}" class="btn btn-warning w-100 mt-2" target="_blank">Tanya dulu</a>
                <div class="konten p-3 border my-3">
                    <p class="roboto-font" style="font-size: 25px;"><b>Apa keunggulan menggunakan Tovo?</b></p>
                        <div class="d-flex align-items-start mb-3">
                            <i class="bi bi-check-lg me-2" style="font-size: 20px;"></i>
                            <p class="roboto-font" style="font-size: 16px; margin-bottom: 0;">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam vel eaque optio, nulla hic ea alias, saepe voluptates incidunt, laudantium nam perspiciatis officia doloremque. Deserunt a explicabo accusantium dolore sit!
                            </p>
                        </div>

                        <div class="d-flex align-items-start mb-3">
                            <i class="bi bi-check-lg me-2" style="font-size: 20px;"></i>
                            <p class="roboto-font" style="font-size: 16px; margin-bottom: 0;">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam vel eaque optio, nulla hic ea alias, saepe voluptates incidunt, laudantium nam perspiciatis officia doloremque. Deserunt a explicabo accusantium dolore sit!
                            </p>
                        </div>

                        <div class="d-flex align-items-start mb-3">
                            <i class="bi bi-check-lg me-2" style="font-size: 20px;"></i>
                            <p class="roboto-font" style="font-size: 16px; margin-bottom: 0;">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam vel eaque optio, nulla hic ea alias, saepe voluptates incidunt, laudantium nam perspiciatis officia doloremque. Deserunt a explicabo accusantium dolore sit!
                            </p>
                        </div>

                        <div class="d-flex align-items-start mb-3">
                            <i class="bi bi-check-lg me-2" style="font-size: 20px;"></i>
                            <p class="roboto-font" style="font-size: 16px; margin-bottom: 0;">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aliquam vel eaque optio, nulla hic ea alias, saepe voluptates incidunt, laudantium nam perspiciatis officia doloremque. Deserunt a explicabo accusantium dolore sit!
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Courses Course Details Section -->

<!-- Tabs Section -->
<section id="tabs" class="tabs section">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <!-- Your tabs content here -->
    </div>
</section><!-- /Tabs Section -->

@endsection
