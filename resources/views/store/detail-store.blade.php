@extends('layout.app')
@section('content')

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url('{{ asset('assets/img/page-title-bg.jpg') }}');">
    <div class="container position-relative">
        <h1>Detail</h1>
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
                        @if($main->diskon > 0)
                            @php
                                $hargaDiskon = $main->harga - ($main->harga * $main->diskon / 100);
                            @endphp
                            <span class="text-danger" style="font-size: 35px;">
                                <b>Rp. {{ number_format($hargaDiskon, 0, ',', '.') }}</b>
                            </span>
                            <del style="font-size: 18px; color: grey;">
                                Rp. {{ number_format($main->harga, 0, ',', '.') }}
                            </del>
                        @else
                            <span class="text-danger" style="font-size: 35px;">
                                <b>Rp. {{ number_format($main->harga, 0, ',', '.') }}</b>
                            </span>
                        @endif
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

                <!-- Tombol untuk membuka modal -->
                <button type="button" class="btn btn-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#paymentModal">Check Out</button>

                <a href="https://wa.me/6282183854660?text={{ urlencode('Halo, saya mau tanya tentang produk ' . $main->nama_barang . ' ini!') }}" class="btn btn-warning w-100 mt-2" target="_blank">Tanya dulu</a>

                <div class="konten p-3 border my-3">
                    <p class="roboto-font" style="font-size: 25px;"><b>Apa keunggulan menggunakan Tovo?</b></p>
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

<!-- Modal Section -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Pilih Metode Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form untuk upload bukti pembayaran -->
                <form action="{{ route('transaction.store') }}" method="POST" enctype="multipart/form-data" id="paymentForm">
                    @csrf
                    <div class="mb-3">
                        <label for="bukti" class="form-label">Upload Bukti Pembayaran</label>
                        <input class="form-control" type="file" id="bukti" name="bukti" required>
                        <input type="hidden" name="main_id" value="{{ $main->id }}">
                    </div>

                    <!-- Tombol Submit Bukti Pembayaran -->
                    <button type="submit" class="btn btn-primary w-100 mt-3" id="submitPayment">Kirim Bukti Pembayaran</button>
                </form>

                <!-- Tombol Check Out yang hanya aktif setelah bukti pembayaran diupload -->
                <a href="https://wa.me/6282183854660?text={{ urlencode('Halo! Saya ingin check out produk '.$main->nama_barang.' dengan harga Rp'.number_format($main->harga, 0, ',', '.')) }}" target="_blank" class="btn btn-success w-100 mt-3" id="checkoutButton" style="display: none;">Check Out dengan WhatsApp</a>
                <div id="messageContainer" class="mt-3" style="display: none;">
                    <p id="messageText" class="text-danger"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div><!-- /Modal -->

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buktiInput = document.getElementById('bukti');
        const checkoutButton = document.getElementById('checkoutButton');
        const submitPayment = document.getElementById('submitPayment');
        const messageContainer = document.getElementById('messageContainer');
        const messageText = document.getElementById('messageText');

        // Event listener untuk mendeteksi perubahan pada input bukti pembayaran
        buktiInput.addEventListener('change', function () {
            if (buktiInput.files.length > 0) {
                // Tampilkan tombol submit bukti pembayaran
                submitPayment.disabled = false;
            } else {
                submitPayment.disabled = true;
            }
        });

        // Event listener untuk menampilkan tombol checkout setelah bukti pembayaran diupload
        submitPayment.addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah pengiriman form secara langsung

            // Simulasi pengiriman bukti pembayaran
            const form = document.getElementById('paymentForm');
            const formData = new FormData(form);

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Jika berhasil, tampilkan tombol checkout
                    checkoutButton.style.display = 'block';
                    messageContainer.style.display = 'none'; // Sembunyikan pesan gagal
                } else {
                    // Jika gagal, tampilkan pesan gagal
                    messageText.innerText = 'Gagal mengupload bukti pembayaran. Silakan coba lagi.';
                    messageContainer.style.display = 'block'; // Tampilkan pesan gagal
                    checkoutButton.style.display = 'none'; // Sembunyikan tombol checkout
                }
            })
            .catch(error => {
                console.error('Error:', error);
                messageText.innerText = 'Terjadi kesalahan. Silakan coba lagi.';
                messageContainer.style.display = 'block'; // Tampilkan pesan gagal
                checkoutButton.style.display = 'none'; // Sembunyikan tombol checkout
            });
        });
    });
</script>
