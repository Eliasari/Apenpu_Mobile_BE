@extends('templates.main')
@section('title', 'Preview Product')
@section('content')
    <div class="container">
        <header class="page-header">
            <h3>Preview Pesanan</h3>
        </header>
        <form method="POST" action="{{ route('product.checkout') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product" id="product" value="{{ $product->id }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nama_pembeli">Nama Pembeli</label>
                        <input type="text" id="nama_pembeli" name="nama_pembeli" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="no_pembeli">Nomor Pembeli</label>
                        <input type="number" id="no_pembeli" name="no_pembeli" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah_beli">Jumlah Beli</label>
                        <div class="class-row">
                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline-secondary" onclick="decreaseValue()">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group">
                                    <input type="number" id="jumlah_beli" name="jumlah_beli" class="form-control text-center" value="1" min="1" required>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-outline-secondary" onclick="increaseValue()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group" id="bukti_transfer_group">
                        <label for="bukti_transfer">Bukti Transfer:</label>
                        <input type="file" id="bukti_transfer" name="bukti_transfer" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table table-shopping-cart">
                        <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Layanan</th>
                            <th>Harga</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="table-shopping-cart-img">
                                <a href="#">
                                    <img src="{{ asset('storage/' . $product->photo) }}" alt="Image Alternative text" title="Image Title" />
                                </a>
                            </td>
                            <td class="table-shopping-cart-title"><a href="#">{{ $product->name }}</a></td>
                            <td>Rp. {{  number_format($product->harga, 0, ',', '.') }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        <div class="box">
                            <h3>{{ $product->name }}</h3>
                            <table class="table table-striped product-page-features-table">
                                <tbody>
                                <tr>
                                    <td>Deskripsi:</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="col-12">
                                <button type="submit" class="btn btn-block btn-primary">Beli</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    </div>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script>
    function decreaseValue() {
        const input = document.getElementById('jumlah_beli');
        let value = parseInt(input.value, 10);
        value = isNaN(value) ? 1 : value;
        if (value > parseInt(input.min || 1, 10)) {
            input.value = value - 1;
        }
    }

    function increaseValue() {
        const input = document.getElementById('jumlah_beli');
        let value = parseInt(input.value, 10);
        value = isNaN(value) ? 1 : value;
        input.value = value + 1;
    }
</script>
@endsection
