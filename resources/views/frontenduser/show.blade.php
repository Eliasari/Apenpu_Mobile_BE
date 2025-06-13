@extends('frontenduser.layout')

@section('title', $product->name . ' - GANG MACAN')

@section('content')
    <!-- Breadcrumb Area -->

    <div class="breadcrumb-area pt-205 pb-210"
        style="background-image: url({{ asset('themes/ezone/assets/img/bg/breadcrumb.jpeg') }})">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>product details</h2>
                <ul>
                    <li><a href="/">home</a></li>
                    <li>{{ $product->name }}</li>
                </ul>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="content-header mb-0 pb-0 mt-3">
            <div class="container-fluid">
                <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                    <strong>{{ session()->get('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    @endif
    <div class="product-details ptb-100 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 col-12">
                    <div class="product-details-img-content">
                        <div class="product-details-tab mr-70">
                            <div class="product-details-large tab-content">
                                <div class="tab-pane fade active show" id="pro-details1" role="tabpanel">
                                    <div class="easyzoom easyzoom--overlay">
                                        <!-- Gambar utama produk dengan class untuk ukuran dinamis -->
                                        <a href="{{ asset('storage/' . $product->photo) }}">
                                            <img src="{{ asset('storage/' . $product->photo) }}" alt="{{ $product->name }}"
                                                class="product-main-image" id="product-image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tombol ikon untuk memperbesar dan memperkecil gambar -->
                        <!-- Ikon Perbesar dan Perkecil -->
                        <div class="image-size-icons">
                            <i class="fas fa-search-minus" onclick="resizeImage('decrease')"></i>
                            <i class="fas fa-search-plus" onclick="resizeImage('increase')"></i>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-5 col-12">
                    <div class="product-details-content">
                        <h3>{{ $product->name }}</h3>
                        <div class="details-price">
                            <span>{{ number_format($product->harga, 0, ',', '.') }}</span>
                        </div>
                        <div class="quickview-plus-minus">
                            <div class="quickview-btn-cart">
                                <a class="submit contact-btn btn-hover" href="{{ route('preview-pesanan', $product->id) }}">add to cart</a>
                            </div>
                        </div>
                        <p style="margin-top:5%;">{{ $product->description }}</p>
                        <div class="product-details-cati-tag mt-35">
                            <ul>
                                <li class="categories-title">Stock :</li>
                                {{ $product->stock }}
                            </ul>
                            <ul>
                                <li class="categories-title">Link WhatsApp: :</li>
                                <td><a href="https://wa.me/{{ Str::replaceFirst('0', '+62', '085778445682') }}"
                                        target="_blank">{{ Str::replaceFirst('0', '+62', '085778445682') }}</a></td>
                            </ul>
                        </div>
                        <div class="product-details-cati-tag mtb-10">
                            <ul>
                                <li class="categories-title">Tags :</li>
                                <li><a href="#">Pupuk</a></li>
                                <li><a href="#">Alami</a></li>
                                <li><a href="#">Serbaguna</a></li>
                                <li><a href="#">Murah Meriah</a></li>
                            </ul>
                        </div>
                        <div class="product-share">
                            <ul>
                                <li class="categories-title">Share :</li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icofont icofont-social-flikr"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-description-review-area pb-90">
        <div class="container">
            <div class="product-description-review text-center">
                <div class="description-review-title nav" role=tablist>
                    <a class="active" href="#pro-dec" data-toggle="tab" role="tab" aria-selected="true">
                        Description
                    </a>
                    <a href="#pro-review" data-toggle="tab" role="tab" aria-selected="false">
                        Reviews (0)
                    </a>
                </div>
                <div class="description-review-text tab-content">
                    <div class="tab-pane active show fade" id="pro-dec" role="tabpanel">
                        <p>{{ $product->description }} </p>
                    </div>
                    <div class="tab-pane fade" id="pro-review" role="tabpanel">
                        <a href="#">Be the first to write your review!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
       .quickview-plus-minus {
    display: block; /* Membuat elemen menjadi blok untuk memastikan margin bekerja */
    position: relative; /* Mengatur posisi relatif pada kontainer */
    margin-left: -6%; /* Margin kiri sesuai kebutuhan */
    margin-top: 20px; /* Menambahkan jarak di bawah tombol */
}

.quickview-btn-cart {
    padding-bottom: 20px; /* Memberikan ruang tambahan di bawah tombol */
}
        .product-main-image {
            max-width: 500px;
            /* Ukuran awal gambar */
            height: auto;
            margin: 0 auto;
            display: block;
        }

        /* Kontainer gambar dan ikon */
        .product-details-img-content {
            position: relative;
            text-align: center;
        }

        /* Kontainer ikon untuk memperbesar dan memperkecil gambar */
        .image-size-icons {
            display: flex;
            justify-content: center;
            /* Menyusun ikon secara horizontal */
            gap: 15px;
            /* Memberikan jarak antar ikon */
            margin-top: 15px;
            /* Jarak ikon dengan gambar */
        }

        /* Ikon */
        .image-size-icons i {
            font-size: 30px;
            /* Ukuran ikon */
            color: #1a1a1a;
            /* Warna ikon hitam */
            cursor: pointer;
            /* Menunjukkan kursor pointer saat dihover */
            transition: color 0.3s ease, transform 0.3s ease;
            /* Animasi transisi */
        }

        /* Efek hover pada ikon */
        .image-size-icons i:hover {
            color: #003366;
            /* Warna biru tua saat hover */
            transform: scale(1.2);
            /* Efek perbesaran ikon saat hover */
        }

        /* Efek saat ikon diklik */
        .image-size-icons i:active {
            color: #002244;
            /* Warna biru lebih gelap saat diklik */
            transform: scale(1);
            /* Reset transform saat diklik */
        }
    </style>

    <script>
        function resizeImage(action) {
            let img = document.getElementById('product-image');
            let currentWidth = img.clientWidth;

            if (action === 'increase') {
                img.style.maxWidth = (currentWidth + 50) + 'px'; // Menambah ukuran gambar sebesar 50px
            } else if (action === 'decrease') {
                img.style.maxWidth = (currentWidth - 50) + 'px'; // Mengurangi ukuran gambar sebesar 50px
            }
        }
    </script>

    <!-- Include Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
@endsection
