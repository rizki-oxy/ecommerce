<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainRequest;
use App\Models\Main;
use App\Models\Role;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
{
    $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login
    $user = User::findOrFail($userId); // Mengambil data pengguna berdasarkan ID
    $store = Store::where('user_id', $userId)->first();

    return view('login.profil', compact('user', 'store')); // Mengirimkan data pengguna ke view
}

public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $id,
        'nomor_peserta' => 'nullable|integer|required_with:lulusan_bpvp',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'lulusan_bpvp' => 'nullable|string',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|confirmed|min:8', // Kosongkan jika tidak ingin mengubah
    ]);

    $user = User::findOrFail($id); // Mencari pengguna berdasarkan ID

    // Update data pengguna
    $user->nama_lengkap = $request->nama_lengkap;
    $user->username = $request->username;
    $user->nomor_peserta = $request->nomor_peserta;
    $user->tanggal_lahir = $request->tanggal_lahir;
    $user->alamat = $request->alamat;
    $user->lulusan_bpvp = $request->lulusan_bpvp;
    $user->email = $request->email;

    // Jika password diisi, hash dan simpan
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save(); // Simpan perubahan

    return redirect()->route('login.profil')->with('success', 'Profil berhasil diperbarui.');
}



    public function edit($id)
    {
    $user = User::findOrFail($id);
    return view('login.profil', compact('user'));
    }

    public function destroy($id)
    {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('login.profil')->with('success', 'Pengguna berhasil dihapus.');
    }


    public function showRegistrationForm()
    {
        $roles = Role::all();
        return view('login.register', compact('roles'));
    }

    public function register(Request $request)
    {
    // Debugging untuk melihat data yang diterima
    // dd($request->all());

    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'nomor_peserta' => 'nullable|integer|required_with:lulusan_bpvp',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string',
        'lulusan_bpvp' => 'nullable|string',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
        'role' => 'nullable|string',
    ]);

    User::create([
        'nama_lengkap' => $request->nama_lengkap,
        'username' => $request->username,
        'nomor_peserta' => $request->nomor_peserta,
        'tanggal_lahir' => $request->tanggal_lahir,
        'alamat' => $request->alamat,
        'lulusan_bpvp' => $request->lulusan_bpvp,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id ?? 'user', // Set role dari form atau default 'user'
    ]);

    return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
}


    //store
    public function updatestore(Request $request, $user_id)
    {
        // Validasi data yang diterima dari form
        $validatedData = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat_kota' => 'required|string|max:255',
            'alamat_lengkap' => 'nullable|string|max:255',
        ]);

        // Ambil store berdasarkan user_id
        $store = Store::where('user_id', $user_id)->firstOrFail();

        // Perbarui data store
        $store->update($validatedData);

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('login.profil')->with('success', 'Data store berhasil diperbarui!');
    }



}
