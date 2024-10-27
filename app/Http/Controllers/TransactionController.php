<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input termasuk main_id dan bukti pembayaran
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'main_id' => 'required|integer',
        ]);

        // Cek apakah file berhasil diupload
        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/bukti_pembayaran'), $filename);

            // Simpan data transaksi
            Transaction::create([
                'user_id' => Auth::id(), // Ambil ID user yang sedang login
                'main_id' => $request->main_id,
                'bukti' => 'assets/img/bukti_pembayaran/' . $filename,
            ]);

            // Tambahkan flash message dan redirect
            return response()->json(['success' => true], 200);
        } else {
            return response()->json(['success' => false], 400);
        }
    }
}
