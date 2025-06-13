<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getAll(){
        $products = \App\Models\Product::all();
        return response()->json([
            'message' => 'Data produk berhasil diambil',
            'data' => $products,
        ], 200);
    }

    public function getById($id){
        $product = \App\Models\Product::find($id);
        if ($product) {
            return response()->json([
                'message' => 'Data produk berhasil diambil',
                'data' => $product,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Produk tidak ditemukan',
                'data'=> null,
            ], 404);
        }
    }
}
