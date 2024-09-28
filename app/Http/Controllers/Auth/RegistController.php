<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistController extends Controller
{

    public function updateRole(Request $request, $id)
    {
    $request->validate([
        'role' => 'required|in:user,alumni,admin', // Validasi agar role sesuai dengan pilihan yang ada
    ]);

    $user = User::findOrFail($id);
    $newRole = Role::where('role', $request->role)->first();

    if ($newRole) {
        $user->role_id = $newRole->id;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Role pengguna berhasil diubah.');
    }

    return redirect()->route('users.index')->with('error', 'Role tidak valid.');
    }

    public function edit($id)
    {
    $user = User::findOrFail($id);
    return view('superadmin.edit', compact('user'));
    }

    public function destroy($id)
    {
    $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    //public function index()
    //{
    //    if (Auth::user() && Auth::user()->role->role == 'admin'){
    //        $users = User::all();
    //    } else {
    //        $users = collect();
    //    }
    //    return view('superadmin.index', compact('users'));
    //}




    public function index()
    {
        $users = User::all();
        return view('superadmin.index', compact('users'));
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




    //INI UNTUK PROFIL UPDATE
    public function profil()
    {
        $user = Auth::user();
        return view('login.profil', compact('user'));
    }


    //END OF PROFILE UPDATE

}
