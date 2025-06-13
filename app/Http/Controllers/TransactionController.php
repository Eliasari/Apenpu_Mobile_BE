<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TransactionController extends Controller
{
    // public function checkout(Request $request)
    // {
    //     $currentCustomer = Auth::guard('customer')->user();

    //     if (!$currentCustomer) {
    //         return redirect()->route('customerlogin')->with('error', 'Silakan login terlebih dahulu');
    //     }

    //     // Validasi data input
    //     $validated = $request->validate([
    //         'product' => 'required|integer',
    //         'nama_customer' => 'required|string|max:100',
    //         'no_pembeli' => 'required|string|max:20', // Pastikan no_pembeli unik
    //         'alamat' => 'required|string|max:255',
    //         'bukti_transfer' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
    //         'jumlah_beli' => 'required|integer|min:1', // Menambahkan validasi jumlah_beli
    //     ]);

    //     // Ambil produk berdasarkan product_id
    //     $product = Product::find($validated['product']);

    //     if (!$product) {
    //         // Jika produk tidak ditemukan, tampilkan error
    //         return redirect()->back()->with(['product' => 'Produk tidak ditemukan.']);
    //     }

    //     // Cek apakah jumlah_beli lebih besar dari stok produk
    //     if ($validated['jumlah_beli'] > $product->stock) {
    //         return redirect()->back()->with(['error' => 'Jumlah beli tidak boleh lebih dari stok produk yang tersedia.']);
    //     }

    //     // Upload file bukti_transfer
    //     $buktiTransferPath = $request->file('bukti_transfer')->store('bukti_transfer', 'public');

    //     // Gunakan email dari guard customer
    //     $customer = Customer::where('email', $currentCustomer->email)->first();

    //     if (!$customer) {
    //         $customer = Customer::create([
    //             'email' => $currentCustomer->email,
    //             'nama_customer' => $validated['nama_customer'],
    //             'no_pembeli' => $validated['no_pembeli'],
    //             'alamat' => $validated['alamat'],
    //             'password' => Hash::make('default_password'),
    //         ]);
    //     }

    //     // Hitung total bayar (harga produk * jumlah beli)
    //     $totalBayar = $product->harga * $validated['jumlah_beli'];

    //     // Cek apakah data dengan product_id, nama_pembeli, dan no_pembeli sudah ada
    //     $transaction = Transaction::where('product_id', $validated['product'])
    //     ->where('customer_id',  $customer->Customer_ID)
    //     ->first();

    //     if ($transaction) {
    //         // Update jika data sudah ada
    //         $transaction->update([
    //             'jumlah_beli' => $validated['jumlah_beli'],
    //             'bukti_transfer' => $buktiTransferPath,
    //             'total_bayar' => $totalBayar, // Update total_bayar
    //             'status' => 0, // Default status, bisa diubah sesuai kebutuhan
    //         ]);
    //     } else {
    //         // Buat baru jika data belum ada
    //         $transaction = Transaction::create([
    //             'product_id' => $validated['product'],
    //             'customer_id' => $customer->Customer_ID,
    //             'jumlah_beli' => $validated['jumlah_beli'],
    //             'bukti_transfer' => $buktiTransferPath,
    //             'total_bayar' => $totalBayar, // Simpan total_bayar
    //             'status' => 0, // Default status
    //         ]);
    //     }

    //     return redirect('/')->with('success', 'Transaksi berhasil disimpan.');
    // }


    public function checkout(Request $request)
    {
        $currentCustomer = Auth::guard('customer')->user();

        if (!$currentCustomer) {
            return redirect()->route('customerlogin')->with('error', 'Silakan login terlebih dahulu');
        }

        // Validasi data input
        $validated = $request->validate([
            'product' => 'required|integer',
            'nama_customer' => 'required|string|max:100',
            'no_pembeli' => 'required|string|max:20',
            'alamat' => 'required|string|max:255',
            'bukti_transfer' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'jumlah_beli' => 'required|integer|min:1',
        ]);

        $product = Product::find($validated['product']);

        if (!$product) {
            return redirect()->back()->with(['product' => 'Produk tidak ditemukan.']);
        }

        if ($validated['jumlah_beli'] > $product->stock) {
            return redirect()->back()->with(['error' => 'Jumlah beli tidak boleh lebih dari stok produk yang tersedia.']);
        }

        $buktiTransferPath = $request->file('bukti_transfer')->store('bukti_transfer', 'public');

        // Cari customer dan update datanya
        $customer = Customer::where('email', $currentCustomer->email)->first();

        if (!$customer) {
            // Jika customer belum ada, buat baru
            $customer = Customer::create([
                'email' => $currentCustomer->email,
                'nama_customer' => $validated['nama_customer'],
                'no_pembeli' => $validated['no_pembeli'],
                'alamat' => $validated['alamat'],
                'password' => Hash::make('default_password'),
            ]);
        } else {
            // Jika customer sudah ada, update datanya
            $customer->update([
                'nama_customer' => $validated['nama_customer'],
                'no_pembeli' => $validated['no_pembeli'],
                'alamat' => $validated['alamat'],
            ]);
        }

        $totalBayar = $product->harga * $validated['jumlah_beli'];

        // Buat transaksi baru (tidak perlu cek existing karena setiap checkout adalah transaksi baru)
        $transaction = Transaction::create([
            'product_id' => $validated['product'],
            'customer_id' => $customer->Customer_ID,
            'jumlah_beli' => $validated['jumlah_beli'],
            'bukti_transfer' => $buktiTransferPath,
            'total_bayar' => $totalBayar,
            'status' => 0,
        ]);

        return redirect('/')->with('success', 'Transaksi berhasil disimpan.');
    }

    public function listOrder()
    {
        $transactions = Transaction::with(['product', 'customer'])
            ->where('status', 0)
            ->get();

        return view('order.index', compact('transactions'));
    }

    public function complete(Request $request, $id)
    {
        // Temukan transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);

        // Temukan produk yang terkait dengan transaksi
        $product = Product::find($transaction->product_id);

        // Cek apakah stok produk cukup untuk jumlah beli transaksi
        if ($product->stock < $transaction->jumlah_beli) {
            // Jika stok tidak cukup, berikan pesan error
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi untuk transaksi ini.');
        }

        // Kurangi stok produk sesuai dengan jumlah beli transaksi
        $product->update([
            'stock' => $product->stock - $transaction->jumlah_beli,
        ]);

        // Perbarui status transaksi menjadi selesai
        $transaction->update([
            'status' => 1, // Status selesai
            'updated_by' => Auth::id(), // ID pengguna yang login
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Transaksi berhasil diselesaikan.');
    }

    public function listHistory()
    {
        $transactions = Transaction::with('product', 'customer') // Mengambil relasi dengan customer
            ->where('status', 1)
            ->get();
        return view('history.index', compact('transactions'));
    }

    public function customerorder(){
        return view('frontenduser.order');
    }

    public function detailcustomerorder(){
        return view('frontenduser.detail');
    }
}
