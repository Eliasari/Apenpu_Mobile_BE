<!DOCTYPE HTML>
<html>


<!-- Mirrored from remtsoy.com/tf_templates/the_box/demo_v1_6/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 15 Jul 2019 14:50:40 GMT -->
<head>
    <title>Aplikasi Penjualan Pupuk @if(trim($__env->yieldContent('title'))) - @yield('title') @endif</title>
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="utf-8" http-equiv="encoding">
    <meta name="keywords" content="Template, html, premium, themeforest"/>
    <meta name="description" content="TheBox - premium e-commerce template">
    <meta name="author" content="Tsoy">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font links can be updated to use asset helper if they are hosted locally -->
    <link href='../../../../fonts.googleapis.com/cssb98c.css?family=Roboto:500,300,700,400italic,400' rel='stylesheet'
          type='text/css'>
    <!-- <link href='https://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
    <link href='../../../../fonts.googleapis.com/css1c0e.css?family=Open+Sans:400,700,600' rel='stylesheet'
          type='text/css'>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mystyles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/switcher.css') }}">
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/bright-turquoise.css') }}"
          title="bright-turquoise" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/turkish-rose.css') }}"
          title="turkish-rose" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/salem.css') }}" title="salem"
          media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/hippie-blue.css') }}"
          title="hippie-blue" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/mandy.css') }}" title="mandy"
          media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/green-smoke.css') }}"
          title="green-smoke" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/horizon.css') }}"
          title="horizon" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/cerise.css') }}" title="cerise"
          media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/brick-red.css') }}"
          title="brick-red" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/de-york.css') }}"
          title="de-york" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/shamrock.css') }}"
          title="shamrock" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/studio.css') }}" title="studio"
          media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/leather.css') }}"
          title="leather" media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/denim.css') }}" title="denim"
          media="all"/>
    <link rel="alternate stylesheet" type="text/css" href="{{ asset('assets/css/schemes/scarlet.css') }}"
          title="scarlet" media="all"/>
    <style>
        /* The snackbar - position it at the bottom and in the middle of the screen */
        #snackbar {
            visibility: hidden; /* Hidden by default. Visible on click */
            min-width: 250px; /* Set a default minimum width */
            margin-left: -125px; /* Divide value of min-width by 2 */
            background-color: dodgerblue; /* Black background color */
            color: #fff; /* White text color */
            text-align: center; /* Centered text */
            border-radius: 2px; /* Rounded borders */
            padding: 16px; /* Padding */
            position: fixed; /* Sit on top of the screen */
            z-index: 1; /* Add a z-index if needed */
            left: 50%; /* Center the snackbar */
            top: 50px; /* 50px from the bottom */
        }

        /* Show the snackbar when clicking on a button (class added with JavaScript) */
        #snackbar.show {
            visibility: visible; /* Show the snackbar */
            /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
            However, delay the fade out process for 2.5 seconds */
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        #snackbar.error {
            background-color: #f44336; /* Red background color for error */
        }


        /* Animations to fade the snackbar in and out */
        @-webkit-keyframes fadein {
            from {top: 0; opacity: 0;}
            to {top: 50px; opacity: 1;}
        }

        @keyframes fadein {
            from {top: 0; opacity: 0;}
            to {top: 50px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
            from {top: 50px; opacity: 1;}
            to {top: 0; opacity: 0;}
        }

        @keyframes fadeout {
            from {top: 50px; opacity: 1;}
            to {top: 0; opacity: 0;}
        }



        /* Style for widget titles in the footer */
        .main-footer .widget-title-sm {
            color: #ffffff; /* Set title color to white */
        }

        /* Style for footer bottom section */

        /* Ensure links in the footer are visible */
        .main-footer a {
            color: #ffffff; /* Set link color to white */
        }

        /* Optional: Add hover effect for links */
        .main-footer a:hover {
            color: #333333; /* Change color on hover for visibility */
        }


    </style>



</head>

<body>
<nav class="navbar navbar-inverse navbar-golder navbar-main yamm">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                    data-target="#main-nav-collapse" area_expanded="false"><span class="sr-only">Main Menu</span><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="main-nav-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="{{route('/')}}">&nbsp; Aplikasi Penjualan Pupuk<i class="drop-caret"></i></a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                    <li><a href="https://wa.me/{{ Str::replaceFirst('0', '+62', '082384425491') }}" target="_blank">Kontak Kami</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="global-wrapper clearfix" id="global-wrapper"
     style="width: 100%; min-height: 100vh; position: relative; padding-bottom: 100px;">
    <div id="snackbar" class="snackbar">{{ session('success') }}</div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var snackbar = document.getElementById('snackbar');
            var successMessage = '{{ session('success') }}';
            var errorMessage = '{{ session('error') }}';

            // Tampilkan pesan sukses jika ada
            if (successMessage.trim() !== '') {
                snackbar.textContent = successMessage;
                snackbar.classList.add('show');
                snackbar.classList.remove('error'); // Pastikan tidak ada kelas error
                setTimeout(function() {
        snackbar.classList.remove('show');
        // Redirect to the homepage after the message disappears
        window.location.href = '/'; // This will redirect to the homepage
    }, 3000);
            }

            // Tampilkan pesan error jika ada
            if (errorMessage.trim() !== '') {
                snackbar.textContent = errorMessage;
                snackbar.classList.add('show');
                snackbar.classList.add('error'); // Tambahkan kelas error untuk styling
                setTimeout(function() {
                    snackbar.classList.remove('show');
                }, 3000); // Tampilkan selama 3 detik
            }
        });
    </script>
    @yield('content')

    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
    <div class="gap"></div>
</div>

<footer class="main-footer">
    <div class="container">
        <div class="row row-col-gap" data-gutter="60">
            <div class="col-md-12">
                <h4 class="widget-title-sm">WEDDING ORGANIZER MARKETPLACE</h4>
                <p>Selamat datang di Marketplace Wedding Organizer kami! Di sini, Anda dapat menemukan berbagai penyedia layanan terbaik untuk mewujudkan pernikahan impian Anda. Dari perencana acara berpengalaman hingga vendor dekorasi dan katering yang berkualitas, kami menawarkan berbagai pilihan untuk memenuhi kebutuhan spesifik Anda. Temukan layanan yang sesuai dengan gaya dan anggaran Anda, dan buat momen istimewa Anda menjadi tidak terlupakan. Hubungi kami hari ini dan mulailah merencanakan hari bahagia Anda!</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Elia CopyRight</p>
        </div>
    </div>
</footer>


</body>
<script src="{{ asset('assets/js/jquery.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/js/icheck.js') }}"></script>
<script src="{{ asset('assets/js/ionrangeslider.js') }}"></script>
<script src="{{ asset('assets/js/jqzoom.js') }}"></script>
<script src="{{ asset('assets/js/card-payment.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/js/magnific.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/switcher.js') }}"></script>
</html>
