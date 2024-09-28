<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores = Store::all();
        return view('store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$stores = Store::all();
        $userId = Auth::id();
        $storeCount = Store::where('user_id', $userId)->count();
        return view('store.create', compact('storeCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi input form jika diperlukan
        $request->validate([
            'nama_toko' => 'required|string',
            'alamat_kota' => 'required|string',
            'alamat_lengkap' => 'required|string',
        ]);

        //mendapatkan user_id dari user yagn sedang login
        $userId = Auth::id();

        //buat data store baru dengan menghubungkan user_id
        Store::create([
            'nama_toko' => $request->input('nama_toko'),
            'alamat_kota' => $request->input('alamat_kota'),
            'alamat_lengkap' => $request->input('alamat_lengkap'),
            'user_id' => $userId,
        ]);

        //Store::create($request->all());
        return redirect() -> route('admin.create') -> with('success', 'Data berhasil ditambahkan, silahkan lanjutkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
