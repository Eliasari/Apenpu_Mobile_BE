<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>APENPU - @yield('title')</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- DataTables -->
    <link href="{{asset('assetadmin')}}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assetadmin')}}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('assetadmin')}}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- datepicker -->
    <link href="{{asset('assetadmin')}}/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- jvectormap -->
    <link href="{{asset('assetadmin')}}/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">

    <!-- Dropzone css -->
    <link href="{{asset('assetadmin')}}/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">

    <link href="{{asset('assetadmin')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assetadmin')}}/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assetadmin')}}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assetadmin')}}/css/style.css" rel="stylesheet" type="text/css">

    <!-- Sweet Alert -->
    <link href="{{asset('assetadmin')}}/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

    <link href="{{asset('assetadmin')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assetadmin')}}/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assetadmin')}}/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{asset('assetadmin')}}/css/style.css" rel="stylesheet" type="text/css">

</head>

<body>


<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{route('product.index')}}" class="logo">
                        <span class="logo-light">
                           <h3>APENPU</h3>
                        </span>
                <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
            </a>
        </div>

        <nav class="navbar-custom">
            <ul class="navbar-right list-inline float-right mb-0">
                <li class="dropdown notification-list list-inline-item">
                    <div class="dropdown notification-list nav-pro-img">
                        <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            {{ Auth::user()->name }}

                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"
                               onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-power text-danger"></i> Logout
                            </a>

                            <!-- Form logout -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="float-left">
                    <button class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>
            </ul>

        </nav>

    </div>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="slimscroll-menu" id="remove-scroll">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
{{--                <ul class="metismenu" id="side-menu">--}}
{{--                    <li class="menu-title">Dashboard</li>--}}
{{--                    <li>--}}
{{--                        <a href="index.html" class="waves-effect">--}}
{{--                            <i class="ion ion-md-speedometer"></i> <span> Dashboard </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}

                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Product</li>
                    <li>
                        <a href="{{ route('product.index') }}" class="waves-effect {{ request()->is('product*') ? 'mm-active' : '' }}">
                            <i class="ion ion-md-pricetag"></i>
                            <span> Product </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order.index') }}" class="waves-effect {{ request()->is('order*') ? 'mm-active' : '' }}">
                            <i class="ion ion-md-cart"></i>
                            <span class="badge badge-success badge-pill float-right">{{ $pendingTransactionsCount }}</span>
                            <span> Order </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('history.index') }}" class="waves-effect {{ request()->is('history*') ? 'mm-active' : '' }}">
                            <i class="ion ion-md-clipboard"></i>
                            <span> History </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('chat.index') }}" class="waves-effect {{ request()->is('chat*') ? 'mm-active' : '' }}">
                            <i class="ion ion-md-chatbubbles"></i>
                            <span> Chat </span>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">@yield('title')</h4>
                            <ol class="breadcrumb">
                                <!-- <li class="breadcrumb-item"><a href="javascript:void(0);"><i class="mdi mdi-home-outline"></i></a></li> -->
                                <li class="breadcrumb-item active">@yield('description-title')</li>
                            </ol>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right d-none d-md-block">
                                @yield('action')
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
                <!-- end page-title -->
                @yield('content')

                <!-- end row -->

            </div>
            <!-- container-fluid -->

        </div>
        <!-- content -->



    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->
<!-- Required datatable js -->



<!-- jQuery  -->
<script src="{{asset('assetadmin')}}/js/jquery.min.js"></script>
<script src="{{asset('assetadmin')}}/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assetadmin')}}/js/metismenu.min.js"></script>
<script src="{{asset('assetadmin')}}/js/jquery.slimscroll.js"></script>
<script src="{{asset('assetadmin')}}/js/waves.min.js"></script>

<!-- datepicker -->
<script src="{{asset('assetadmin')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!-- vector map  -->
<script src="{{asset('assetadmin')}}/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="{{asset('assetadmin')}}/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- dropzone -->
<script src="{{asset('assetadmin')}}/plugins/dropzone/dist/dropzone.js"></script>

<script src="{{asset('assetadmin')}}/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="{{asset('assetadmin')}}/pages/sweet-alert.init.js"></script>
<!-- Peity JS -->

@if(session('success'))
    <script>
        Swal.fire({
            position: 'top-end',
            type: 'success',
            title: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
@if(session('error'))
    <script>
        Swal.fire({
            position: 'top-end',
            type: 'warning',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1500
        })
    </script>
@endif
<!-- App js -->
<script src="{{asset('assetadmin')}}/js/app.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/jszip.min.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/pdfmake.min.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/vfs_fonts.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/buttons.html5.min.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/buttons.print.min.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="{{asset('assetadmin')}}/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="{{asset('assetadmin')}}/plugins/datatables/responsive.bootstrap4.min.js"></script>



<!-- Datatable init js -->
<script src="{{asset('assetadmin')}}/pages/datatables.init.js"></script>

@stack('scripts')
</body>

</html>
