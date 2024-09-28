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
    <div class="row mb-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Data User</h2>
            <a class="btn btn-success" href="{{ route('register') }}">Masukan Data Baru</a>
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
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nama Lengkap</th>
                    <th scope="col" class="text-center">Username</th>
                    <th scope="col" class="text-center">Nomor Peserta</th>
                    <th scope="col" class="text-center">Tanggal Lahir</th>
                    <th scope="col" class="text-center">Lulusan Regional BPVP</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Role</th>
                    <th scope="col" class="text-center">Approval</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @php $i = 0; @endphp
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
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
                                <select name="role" class="form-select form-select-sm me-2" style="width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" aria-label="Default select example">
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

                        <td class="text-center d-inline-flex align-items-center">
                            <!-- <a href="#" class="btn btn-sm btn-warning me-2">Edit</a> -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus pengguna ini?');">
                                @csrf
                                @method('DELETE')
                                @if ($user->role_id != 1)
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                @else
                                    <button type="submit" class="btn btn-sm btn-danger" disabled>Delete</button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
