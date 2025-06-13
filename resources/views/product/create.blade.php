@extends('templates.admin')
@section('title')
    Tambah Produk
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

                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

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
                                placeholder="Masukkan deskripsi produk"></textarea>
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
                                    min="0"
                                    required>
                            </div>
                        </div>

                        <!-- Upload Foto Produk -->
                        <h5 class="mt-4 header-title">Upload Foto</h5>
                        <div>
                                <div class="fallback">
                                    <input
                                        name="photo"
                                        type="file"
                                        accept="image/*"
                                        required>
                                </div>
                            </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan Produk</button>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@endsection
