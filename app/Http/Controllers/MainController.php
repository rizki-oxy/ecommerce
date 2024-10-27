<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainRequest;
use App\Models\Category;
use App\Models\Main;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function homestore()
    {
        $mains = Main::all();
        return view('store.home-store', compact('mains'));
    }

    public function detailstore($id)
    {
        $main = Main::find($id);
        return view('store.detail-store', compact('main'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();

        $mains = Main::whereHas('store', function($query) use ($userId) {
            $query->where('user_id', $userId);
         })-> with('category', 'store')->get();

        //hitung total qty berdasarkan category produk
        $totalProduk = $mains->where('category.kategori', 'Produk')->sum('qty');

        //hitung total qty berdasarkan category layanan
        $totalLayanan = $mains->where('category.kategori', 'Layanan')->sum('qty');

        return view('admin.index', compact('mains', 'totalProduk', 'totalLayanan'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        $userId = Auth::id();
        $stores = Store::where('user_id', $userId)->get();

        //$stores = Store::all();
        return view('admin.create', compact('categories', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MainRequest $request)
{
    // Validasi file gambar
    $request->validate([
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    //jika kategory bernilai layanan, maka set qty menjadi 1
    $category = Category::find($request->input('category_id'));
    if($category && $category->kategori === 'Layanan') {
        $request->merge(['qty' => 1]);
    }

    // Jika ada file yang diupload
    if ($request->hasFile('foto')) {
        // Simpan file dan buat path
        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/img'), $filename);

        // Simpan data ke database
        $main = new Main($request->all());
        $main->foto = 'assets/img/' . $filename;
        $main->save();
    } else {
        Main::create($request->all());
        //$main = Main::create(array_merge($request->all(), ['user_id' => $userId]));
    }

    return redirect()->route('admin.index')->with('success', 'Data ditambahkan');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $main = Main::with('category', 'store')->findOrFail($id);
        return view('admin.show', compact('main'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $main = Main::findOrFail($id);
    $categories = Category::all();

    $userId = Auth::id();
    $stores = Store::where('user_id', $userId)->get();
    //$stores = Store::all();
    return view('admin.edit', compact('main', 'categories', 'stores'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(MainRequest $request, string $id)
    {
    $main = Main::findOrFail($id);

    //validasi file gambar
    $request->validate([
        'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Jika kategori layanan, set qty menjadi 1
    $category = Category::find($request->input('category_id'));
    if ($category && $category->kategori === 'Layanan') {
        $request->merge(['qty' => 1]);
    }

    //jika ada file foto baru yang diupload
    if ($request->hasFile('foto')) {
        //simpan file baru dan buat path
        $file = $request->file('foto');

        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/img'), $filename);

        //jika foto sebelumnya ada, hapus
        if ($main->foto && file_exists(public_path($main->foto))) {
            unlink(public_path($main->foto));
        }

        //update path foto ke database
        $main->foto = 'assets/img/' . $filename;
    }

    //update data lainnya
    $main->update($request->except(['foto']));
    //$main->update($request->all());
    return redirect()->route('admin.index')->with('success', 'Data berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $main = Main::findOrFail($id);
    $main->delete();
    return redirect()->route('admin.index')->with('success', 'Data berhasil dihapus');
}

    //search cari
    public function search(Request $request)
{
    $query = $request->input('query');
    $mains = Main::where('nama_barang', 'LIKE', "%$query%")->get(); // Misalkan Anda mencari produk berdasarkan nama

    return view('store.searchresult', compact('mains'));
}

    // filter
    public function filter(Request $request)
    {
    $categoryId = $request->input('category_id');
    $mains = Main::where('category_id', $categoryId)->get(); // Ambil data berdasarkan category_id
    return view('store.searchresult', compact('mains'));
    }


}
