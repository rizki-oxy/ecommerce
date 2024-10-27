@extends('layout.app')

@section('content')

<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
    <div class="container position-relative">
      <h1>Data User</h1>
      <p>Pergunakan data barang sebaik mungkin</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="/">Home</a></li>
          <li class="current">Data User</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

<div class="container my-3">
    <section class="section dashboard" style="padding-left: 20px; padding-right: 20px;">
        <h2>Data User</h2>
        <div class="row">

            <!-- Admin Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Admin</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $totalAdmin }}</h6> <!-- Nilai total Admin -->
                                <span class="text-success small pt-1 fw-bold">12%</span>
                                <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Admin Card -->

            <!-- Alumni Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Alumni</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $totalAlumni }}</h6> <!-- Nilai total Alumni -->
                                <span class="text-success small pt-1 fw-bold">8%</span>
                                <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Alumni Card -->

            <!-- User Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $totalUsers }}</h6> <!-- Nilai total Users -->
                                <span class="text-danger small pt-1 fw-bold">12%</span>
                                <span class="text-muted small pt-2 ps-1">decrease</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End User Card -->

            <!-- Alumni Menunggu Approval Card -->
            <div class="col-xxl-6 col-xl-12">
                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Alumni Menunggu Approval</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $totalPendingAlumni }}</h6> <!-- Nilai total Alumni yang menunggu approval -->
                                <span class="text-danger small pt-1 fw-bold">12%</span>
                                <span class="text-muted small pt-2 ps-1">decrease</span>
                            </div>
                            <div class="ms-auto">
                                <a href="#datauser" type="button" class="btn btn-outline-warning">Approve Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Alumni Menunggu Approval Card -->



            <!-- Alumni Card -->
            <div class="col-xxl-6 col-md-6">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Pengguna</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $totalKeseluruhan }}</h6> <!-- Nilai total Alumni -->
                                <span class="text-success small pt-1 fw-bold">8%</span>
                                <span class="text-muted small pt-2 ps-1">increase</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Alumni Card -->

            <!-- Tabel Data User -->
            <div class="col-12" id="datauser">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between align-items-center mb-3">
                            <!-- Judul Card di Sebelah Kiri -->
                            <div class="col-auto">
                                <h3 class="card-title mb-0">Data User</h3>
                            </div>

                            <!-- Filter dan Tombol di Sebelah Kanan -->
                            <div class="col-auto d-flex align-items-center">
                                <!-- Filter Form -->
                                <form method="GET" action="{{ route('users.index') }}" class="d-inline-flex align-items-center me-3">
                                    <label for="role" class="me-2">Filter by Role:</label>
                                    <select name="role" id="role" class="form-select form-select-sm me-2" style="width: 150px;">
                                        <option value="">All</option>
                                        <option value="1" {{ request('role') == '1' ? 'selected' : '' }}>Admin</option>
                                        <option value="2" {{ request('role') == '2' ? 'selected' : '' }}>Alumni</option>
                                        <option value="3" {{ request('role') == '3' ? 'selected' : '' }}>User</option>
                                        <option value="4" {{ request('role') == '4' ? 'selected' : '' }}>Pending</option>
                                    </select>
                                    <button type="submit" class="btn btn-sm btn-primary">Filter</button>
                                </form>

                                <!-- Tombol Masukan Data Baru -->
                                <a class="btn btn-success" href="{{ route('register') }}">Masukan Data Baru</a>
                            </div>
                        </div>

                        <!-- Tabel User -->
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Nomor Peserta</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Lulusan BPVP Regional</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Approval</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $user->nama_lengkap }}</td>
                                        <td class="text-center">{{ $user->username }}</td>
                                        <td class="text-center">{{ $user->nomor_peserta }}</td>
                                        <td class="text-center">{{ $user->tanggal_lahir }}</td>
                                        <td class="text-center">{{ $user->lulusan_bpvp }}</td>
                                        <td class="text-center">{{ $user->email }}</td>
                                        <td class="text-center">{{ $user->role->role }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('users.updateRole', $user->id) }}" method="POST" class="d-inline-flex align-items-center">
                                                @csrf
                                                @method('PUT')
                                                <select name="role" class="form-select form-select-sm me-2" style="width: 100px;">
                                                    <option value="user" {{ $user->role->role == 'user' ? 'selected' : '' }}>User</option>
                                                    <option value="alumni" {{ $user->role->role == 'alumni' ? 'selected' : '' }}>Alumni</option>
                                                </select>
                                                @if ($user->role_id != 1)
                                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                                @else
                                                    <button type="submit" class="btn btn-sm btn-primary" disabled>Simpan</button>
                                                @endif
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus pengguna ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
    </section>
</div>
@endsection
