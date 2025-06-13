<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function checkout(Request $request)
    {
        $currentCustomer = $request->user(); // ← ambil dari token

        if (!$currentCustomer) {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        $validated = $request->validate([
            'product' => 'required|integer',
            'nama_customer' => 'required|string|max:100',
            'no_pembeli' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'bukti_transfer' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
            'jumlah_beli' => 'required|integer|min:1',
        ]);

        $product = Product::find($validated['product']);

        if (!$product) {
            return response()->json(['error' => 'Produk tidak ditemukan.'], 404);
        }

        if ($validated['jumlah_beli'] > $product->stock) {
            return response()->json(['error' => 'Jumlah beli melebihi stok yang tersedia.'], 422);
        }

        $buktiTransferPath = $request->file('bukti_transfer')->store('bukti_transfer', 'public');

        // Update data customer
        $customer = Customer::find($currentCustomer->Customer_ID);

        $customer->update([
            'nama_customer' => $validated['nama_customer'],
            'no_pembeli' => $validated['no_pembeli'],
            'alamat' => $validated['alamat'],
        ]);

        $totalBayar = $product->harga * $validated['jumlah_beli'];

        // Simpan transaksi
        $transaction = Transaction::create([
            'product_id' => $validated['product'],
            'customer_id' => $customer->Customer_ID,
            'jumlah_beli' => $validated['jumlah_beli'],
            'bukti_transfer' => $buktiTransferPath,
            'total_bayar' => $totalBayar,
            'status' => 0,
        ]);

        return response()->json([
            'message' => 'Transaksi berhasil disimpan.',
            'data' => $transaction,
        ], 201);
    }

    public function listOrder(Request $request)
    {
        // $currentCustomer = $request->user(); // ← ambil dari token

        // if (!$currentCustomer) {
        //     return response()->json(['error' => 'Unauthorized.'], 401);
        // }

        $transactions = Transaction::with(['product', 'customer'])
            ->where('status', 0)
            ->get();

        return response()->json([
            'message' => 'Daftar transaksi berhasil diambil.',
            'data' => $transactions,
        ], 200);
    }


    public function listHistory(Request $request)
    {
        $user = $request->user();

        $status = $request->query('status'); // Ambil nilai status dari query parameter

        $query = Transaction::with('product', 'customer')
            ->where('customer_id', $user->Customer_ID);

        if (!is_null($status)) {
            $query->where('status', $status);
        }

        $transactions = $query->get();

        return response()->json([
            'message' => 'Daftar transaksi berhasil diambil.',
            'data' => $transactions,
        ], 200);
    }



    public function complete(Request $request, $id)
    {
        // Autentikasi via token
        $user = $request->user();
        if (!$user) {
            return response()->json(['error' => 'Unauthorized.'], 401);
        }

        // Temukan transaksi
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json(['error' => 'Transaksi tidak ditemukan.'], 404);
        }

        // Temukan produk
        $product = Product::find($transaction->product_id);
        if (!$product) {
            return response()->json(['error' => 'Produk tidak ditemukan.'], 404);
        }

        // Cek stok
        if ($product->stock < $transaction->jumlah_beli) {
            return response()->json(['error' => 'Stok produk tidak mencukupi untuk transaksi ini.'], 422);
        }

        // Update stok produk
        $product->update([
            'stock' => $product->stock - $transaction->jumlah_beli,
        ]);

        // Update status transaksi
        $transaction->update([
            'status' => 1, // selesai
            'updated_by' => $user->getKey(), // ambil ID dari user token
        ]);

        return response()->json([
            'message' => 'Transaksi berhasil diselesaikan.',
            'transaction' => $transaction,
        ], 200);
    }
}
