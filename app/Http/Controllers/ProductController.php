<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index(){
        $products=Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create'); // Tampilkan form create
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'harga' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'harga' => $request->harga,
            'stock' => $request->stock,
            'photo' => $filePath ?? null,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product')); // Tampilkan form edit
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'harga' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);


        $product = Product::findOrFail($id);

        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($product->photo) {
                Storage::disk('public')->delete($product->photo);
            }

            $filePath = $request->file('photo')->store('products', 'public');
            $product->photo = $filePath;
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'harga' => $request->harga,
            'stock' => $request->stock,
        ]);

        return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('frontenduser.show', compact('product'));
    }

    public function previewPesanan($id){
        $product = Product::findOrFail($id);
        return view('frontenduser.preview-pesanan', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->photo) {
            Storage::disk('public')->delete($product->photo);
        }
        $product->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }



}
