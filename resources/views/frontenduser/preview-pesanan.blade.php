@extends('frontenduser.layout')

@section('title', 'Preview Pesanan - SerbukKopi.id')

@section('content')

    <!-- Header Section -->
    <div class="breadcrumb-area pt-205 breadcrumb-padding pb-210"
        style="background-image: url({{ asset('themes/ezone/assets/img/bg/breadcrumb.jpeg') }})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Checkout Page</h2>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li> Preview Pesanan</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Checkout Area -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <form id="purchaseForm" method="POST" action="{{ route('product.checkout') }}" enctype="multipart/form-data"
                onsubmit="return handleSubmit(event)">
                @csrf
                <input type="hidden" name="product" value="{{ $product->id }}">

                <div class="row">
                    <!-- Billing Section -->
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <p>Transfer: BCA (1234567)</p>
                            <div class="row">
                                <input type="hidden" id="product_stock" value="{{ $product->stock }}">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Nama Pembeli <span class="required">*</span></label>
                                        <input type="text" name="nama_customer" value="{{ old('nama_customer') }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Nomor Pembeli <span class="required">*</span></label>
                                        <input type="number" name="no_pembeli" value="{{ old('no_pembeli') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Alamat <span class="required">*</span></label>
                                        <input type="text" name="alamat" value="{{ old('alamat') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Jumlah Beli <span class="required">*</span></label>
                                        <div class="input-group" style="width: fit-content;">
                                            <button type="button" class="btn btn-outline-secondary"
                                                onclick="decreaseValue()" style="width: 40px; height: 40px;">-</button>
                                            <input type="number" id="jumlah_beli" name="jumlah_beli"
                                                class="form-control text-center" value="1" min="1"
                                                style="width: 40px; height: 40px; padding: 0; text-align: center; border-radius: 0;">
                                            <button type="button" class="btn btn-outline-secondary"
                                                onclick="increaseValue()" style="width: 40px; height: 40px;">+</button>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Bukti Transfer(JPG,JPEG,PDF,PNG) <span class="required">*</span></label>
                                        <input type="file" name="bukti_transfer" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Details Section -->
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="your-order">
                            <h3>Preview Pesanan</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="product-name">
                                                    <img src="{{ asset('storage/' . $product->photo) }}"
                                                        alt="{{ $product->name }}" width="70">
                                                    <strong>{{ $product->name }}</strong>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="amount">Rp.
                                                    {{ number_format($product->harga, 0, ',', '.') }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total Bayar</th>
                                            <td>
                                                <span class="amount" id="total_bayar">
                                                    Rp. {{ number_format($product->harga, 0, ',', '.') }}
                                                </span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="order-button-payment" style="margin-top: 5%">
                                <button type="submit" class="submit contact-btn btn-hover"
                                    style="width: 100%;">Beli</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
       function decreaseValue() {
    let jumlahInput = document.getElementById('jumlah_beli');
    if (jumlahInput.value > 1) {
        jumlahInput.value--;
        updateTotalBayar();
    }
}

function increaseValue() {
    let jumlahInput = document.getElementById('jumlah_beli');
    jumlahInput.value++;
    updateTotalBayar();
}

        function updateTotalBayar() {
    let jumlahBeli = document.getElementById('jumlah_beli').value;
    let hargaProduk = {{ $product->harga }};
    let totalBayar = jumlahBeli * hargaProduk;
    document.getElementById('total_bayar').innerText = 'Rp. ' + totalBayar.toLocaleString('id-ID');
}


        function handleSubmit(event) {
            event.preventDefault();

            var jumlahBeli = parseInt(document.getElementById('jumlah_beli').value);
            var stock = parseInt(document.getElementById('product_stock')
            .value);

            if (jumlahBeli > stock) {
                alert('Jumlah beli tidak boleh lebih dari stok produk yang tersedia.');
            } else {
                alert('Pesanan berhasil dibuat!');

                document.getElementById('purchaseForm').submit();
            }
        }

        document.getElementById('purchaseForm').addEventListener('submit', handleSubmit);
    </script>
@endsection
