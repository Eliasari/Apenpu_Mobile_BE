<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'GANG MACAN') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('themes/ezone/assets/img/favicon.png') }}">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/icofont.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/easyzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/bundle.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/ezone/assets/css/responsive.css') }}">
    <script src="{{ asset('themes/ezone/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .header-top-furniture {
            padding: 10px 0;
            /* Mengurangi padding atas dan bawah */
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 60px;
            /* Atur tinggi navbar */
            padding: 0 15px;
        }

        .logo-2 img {
            height: 30px;
            /* Mengecilkan logo */
        }

        .header-bottom-wrapper {
            height: 50px;
            /* Kurangi tinggi wrapper */
            display: flex;
            align-items: center;
            /* Pusatkan vertikal */
        }

        .footer-widget {
            display: flex;
            flex-direction: column;
            /* Susun elemen secara vertikal */
            align-items: center;
            /* Pusatkan elemen secara horizontal */
            justify-content: center;
            /* Pusatkan secara vertikal */
            text-align: center;
            /* Teks berada di tengah */
            padding: 30px;
            /* Tambahkan ruang di sekitar konten */
            position: relative;
            /* Memungkinkan penyesuaian posisi logo relatif terhadap kontainer */
        }

        .footer-widget img {
            height: 60px;
            /* Ukuran logo */
            width: auto;
            /* Mempertahankan proporsi */
            margin-bottom: 20px;
            /* Beri jarak dengan teks di bawahnya */
            transform: translate(10px, -10px);
            /* Pindahkan ke kanan (10px) dan ke atas (-10px) */
            position: relative;
            /* Mengaktifkan transform */
        }

        .footer-about-2 {
            font-size: 16px;
            /* Ukuran font sedikit lebih besar */
            line-height: 1.8;
            /* Jarak antar baris lebih nyaman dibaca */
            color: #555;
            /* Warna teks sedikit lebih gelap */
        }
    </style>

</head>

<body>
    <header>
        <div class="header-top-furniture wrapper-padding-2 res-header-sm">
            <div class="container-fluid">
                <div class="header-bottom-wrapper">
                    <div class="menu-style-2 furniture-menu menu-hover">
                        <nav>
                            <ul>
                                <li class="dropdown"><a href="{{ route('/') }}">&nbsp; APENPU GDM<i
                                            class="drop-caret"></i></a>
                            </ul>
                        </nav>
                    </div>
                    <div class="menu-style-2 furniture-menu menu-hover">
                        <nav>
                            <ul>
                                <li><a href="{{ route('/') }}">Home</a></li>
                                <li><a href="{{ route('order.show') }}">Order</a></li>
                                <li><a href="https://wa.me/{{ Str::replaceFirst('0', '+62', '085778445682') }}"
                                        target="_blank">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul class="menu-overflow">
                                    <li><a href="https://wa.me/{{ Str::replaceFirst('0', '+62', '085778445682') }}"
                                            target="_blank">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
            <div class="container-fluid">
                <div class="furniture-bottom-wrapper">
                    <div class="furniture-login">
                        <ul>
                            @auth('customer')  {{-- Tentukan guard-nya --}}
                            <li>Hello: {{ Auth::guard('customer')->user()->email }}</li>
                            <a href="{{ route('customerlogout') }}"
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                               {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('customerlogout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <li><a href="{{ url('customerlogin') }}">Login</a></li>
                            <li><a href="{{ url('customerregister') }}">Register</a></li>
                        @endauth
                        </ul>
                    </div>
                    <div class="furniture-search">
                        <form action=" " method=" ">
                            <input placeholder="I am Searching for . . ." type="text" name="q" value="{{ isset($q) ? $q : null }}">
                            <button>
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </header>
    <!-- end -->

    @yield('content')

    <!-- services -->
    <div class="services-area wrapper-padding-4 gray-bg pt-120 pb-80">
        <div class="container-fluid">
            <div class="services-wrapper">
                <div class="single-services mb-40">
                    <div class="services-img">
                        <img src="{{ asset('themes/ezone/assets/img/icon-img/27.png') }}" alt="">
                    </div>
                    <div class="services-content">
                        <h4>24/7 Support</h4>
                        <p>Layanan dukungan tersedia sepanjang waktu, 24/7.</p>
                    </div>
                </div>
                <div class="single-services mb-40">
                    <div class="services-img">
                        <img src="{{ asset('themes/ezone/assets/img/icon-img/28.png') }}" alt="">
                    </div>
                    <div class="services-content">
                        <h4>Secure Payments</h4>
                        <p>Pembayaran aman dengan perlindungan data dan transaksi.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->

    <!-- footer -->
    <footer class="footer-area">
        <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
            <div class="container-fluid">
                <div class="widget-wrapper">
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title-5">APENPU GDM</h3>
                        <div class="footer-about-2">
                            <p>Website penyedia Pupuk Berkualitas tinggi yang <br>dipilih karena kandungannya yang ramah
                                lingkungan,
                                efektif menyuburkan tanah, dan mendukung pertumbuhan tanaman <br>secara optimal
                                Cocok untuk berbagai jenis tanaman dan kebutuhan berkebun Anda
                        </div>
                    </div>
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title-5">Contact Info</h3>
                        <div class="footer-info-wrapper-3">
                            <div class="footer-address-furniture">
                                <div class="footer-info-icon3">
                                    <span>Address: </span>
                                </div>
                                <div class="footer-info-content3">
                                    <p>Malang Jawa Timur<br></p>
                                </div>
                            </div>
                            <div class="footer-address-furniture">
                                <div class="footer-info-icon3">
                                    <span>Phone: </span>
                                </div>
                                <div class="footer-info-content3">
                                    <p>085778445682</p>
                                </div>
                            </div>
                            <div class="footer-address-furniture">
                                <div class="footer-info-icon3">
                                    <span>E-mail: </span>
                                </div>
                                <div class="footer-info-content3">
                                    <p><a href="#"> admin@tokopupukgdm.com</a> <br><a href="#">
                                            cs@tokopupukgdm.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-widget mb-30">
                        <h3 class="footer-widget-title-5">Newsletter</h3>
                        <div class="footer-newsletter-2">
                            <p>Kindly share your email address with us so we can keep you updated on any important news,
                                future updates, or upcoming events.</p>
                            <div id="mc_embed_signup" class="subscribe-form-5">
                                <form
                                    action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                                    method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                    class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input type="email" value="" name="EMAIL" class="email"
                                            placeholder="Enter mail address">
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div class="mc-news" aria-hidden="true"><input type="text"
                                                name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1"
                                                value=""></div>
                                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe"
                                                id="mc-embedded-subscribe" class="button"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom ptb-20 gray-bg-8">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="copyright-furniture">
                            <p>Copyright © <a href=" ">GANG MACAN</a> 2024 . All Right Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end -->
    <div id="loader" style="display: none;">
        <div id="loading"
            style="z-index:99999;position: fixed;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,.3);display: flex;justify-content:center;align-items: center;"
            class="mx-auto">
            <p><img src="{{ asset('themes/ezone/assets/img/loading.gif') }}" /> Please Wait</p>
        </div>
    </div>

    <style>
        .quick-view-learg-img img {
            width: 100%;
            /* Membuat gambar mengisi lebar kontainer */
            max-width: 400px;
            /* Menetapkan lebar maksimum untuk gambar */
            height: auto;
            /* Menjaga aspek rasio gambar */
        }
    </style>

    <!-- all js here -->
    <script src="{{ asset('themes/ezone/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/popper.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/ajax-mail.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/main.js') }}"></script>
    <script src="{{ asset('themes/ezone/assets/js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(".delete").on("click", function() {
            return confirm("Do you want to remove this?");
        });
    </script>
    @stack('script-alt')
</body>

</html>
