@extends('templates.admin')
@section('title')
    Edit Produk
@endsection

@section('action')
    <a href="{{route('product.index')}}" class="btn btn-primary"  >
        <i class="mdi mdi-arrow-left"></i> kembali
    </a>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted mb-4">Form untuk menambahkan produk baru ke dalam sistem.</p>

                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Nama Produk -->
                        <div class="form-group row">
                            <label for="product-name" class="col-sm-2 col-form-label">Nama Produk</label>
                            <div class="col-sm-10">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="product-name"
                                    name="name"
                                    placeholder="Masukkan nama produk"
                                    value="{{ old('name', $product->name) }}"
                                    required>
                            </div>
                        </div>

                        <!-- Deskripsi Produk -->
                        <div class="form-group row">
                            <label for="product-description" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
            <textarea
                class="form-control"
                id="product-description"
                name="description"
                rows="4"
                placeholder="Masukkan deskripsi produk">{{ old('description', $product->description) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="product-name" class="col-sm-2 col-form-label">Harga</label>
                            <div class="col-sm-10">
                                <input
                                    type="number"
                                    class="form-control"
                                    id="harga"
                                    name="harga"
                                    placeholder="Masukkan Harga"
                                    value="{{ old('harga', $product->harga) }}"
                                    required>
                            </div>
                        </div>

                        <!-- Stok Produk -->
                        <div class="form-group row">
                            <label for="product-stock" class="col-sm-2 col-form-label">Stok</label>
                            <div class="col-sm-10">
                                <input
                                    type="number"
                                    class="form-control"
                                    id="product-stock"
                                    name="stock"
                                    placeholder="Masukkan jumlah stok"
                                    value="{{ old('stock', $product->stock) }}"
                                    min="0"
                                    required>
                            </div>
                        </div>

                        <!-- Foto Produk (opsional, jika foto baru ingin diupload) -->
                        <h5 class="mt-4 header-title">Upload Foto (Opsional)</h5>
                        <div>
                                <div class="fallback">
                                    <input
                                        name="photo"
                                        type="file"
                                        accept="image/*">
                                </div>
                        </div>
                        @if ($product->photo)
                            <div class="mt-3">
                                <p>Foto saat ini:</p>
                                <img src="{{ asset('storage/' . $product->photo) }}" alt="Foto Produk" width="100">
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Produk</button>
                        </div>
                    </form>


                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection
