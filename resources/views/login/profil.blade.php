@extends('layout.app')
@section('content')
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
        <div class="container position-relative">
        <h1>Profil</h1>
        <nav class="breadcrumbs">
            <ol>
            <li><a href="/">Home</a></li>
            <li class="current">Profil</li>
            </ol>
        </nav>
        </div>
    </div><!-- End Page Title -->

    <section class="section profile container">
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <!-- <img src="assets/img/trainer-1-2.jpg" alt="Profile" class="rounded-circle"> -->
                    <img src="{{ asset($user->foto_profil ?: 'assets/img/person-circle.svg') }}" class="rounded-circle" alt="Profile" style="width: 150px; height: 150px;">
                    <h2>{{ $user->nama_lengkap }}</h2>
                    <h3>{{ $user->role->role }}</h3>
                    <div class="social-links mt-2">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>

                  @auth
                      @if (auth()->user()->role_id == 2)
                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#prof-store">Store Overview</button>
                      </li>
                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit-store">Edit Store</button>
                  </li>
                  @endif
                  @endauth


                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif

                    <h5 class="card-title">Profile Details</h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                      <div class="col-lg-9 col-md-8">{{ $user->nama_lengkap }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Username</div>
                      <div class="col-lg-9 col-md-8">{{ $user->username }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Nomor Peserta BPVP</div>
                      <div class="col-lg-9 col-md-8">{{ $user->nomor_peserta ?? 'N/A'}}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Tanggal Lahir</div>
                      <div class="col-lg-9 col-md-8">{{ $user->tanggal_lahir }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Alamat</div>
                      <div class="col-lg-9 col-md-8">{{ $user->alamat }}</div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Lulusan Regional BPVP</div>
                      <div class="col-lg-9 col-md-8"></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                    </div>

                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                    <!-- Profile Edit Form -->
                    <form action="{{ route('login.update', $user->id) }}" method="POST" class="mx-3 my-3">
                        @csrf
                        @method('PUT')
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
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nomor_peserta">Nomor Peserta</label>
                            <input type="number" name="nomor_peserta" id="nomor_peserta" class="form-control" value="{{ old('nomor_peserta', $user->nomor_peserta) }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat', $user->alamat) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="lulusan_bpvp">Lulusan BPVP</label>
                            <input type="text" name="lulusan_bpvp" id="lulusan_bpvp" class="form-control" value="{{ old('lulusan_bpvp', $user->lulusan_bpvp) }}">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form><!-- End Profile Edit Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="prof-store">
                    @auth
                        @if (auth()->user()->role_id == 2)
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nama Toko</div>
                                <div class="col-lg-9 col-md-8">{{ $store->nama_toko }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Kota</div>
                                <div class="col-lg-9 col-md-8">{{ $store->alamat_kota ?? 'N/A'}}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Alamat Lengkap</div>
                                <div class="col-lg-9 col-md-8">{{ $store->alamat_lengkap }}</div>
                            </div>
                            </div>
                        @endif
                    @endauth
                  </div>


                  <div class="tab-pane fade pt-3" id="profile-edit-store">
                    <!-- Store Edit Form -->
                    @auth
                        @if (auth()->user()->role_id == 2)
                            <form action="{{ route('login.updatestore', $user->id) }}" method="POST" class="mx-3 my-3">
                                @csrf
                                @method('PUT')
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
                                    <label for="nama_toko">Nama Toko</label>
                                    <input type="text" name="nama_toko" id="nama_toko" class="form-control" value="{{ old('nama_toko', $store->nama_toko) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_kota">Alamat Kota</label>
                                    <input type="text" name="alamat_kota" id="alamat_kota" class="form-control" value="{{ old('alamat_kota', $store->alamat_kota) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat_lengkap">Alamat Lengkap</label>
                                    <input type="text" name="alamat_lengkap" id="alamat_lengkap" class="form-control" value="{{ old('alamat_lengkap', $store->alamat_lengkap) }}">
                                </div>

                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </form><!-- End Store Edit Form -->
                        @endif
                    @endauth
                  </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>
@endsection
