<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $mainId = $request->input('main_id');
        $main = Main::find($mainId);

        if (!$main) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        // Simpan produk ke session
        $cart = session()->get('cart', []);

        if (isset($cart[$mainId])) {
            $cart[$mainId]['jumlah']++;
        } else {
            $cart[$mainId] = [
                "nama_barang" => $main->nama_barang,
                "jumlah" => 1,
                "harga" => $main->harga,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
    }
}
