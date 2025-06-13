@extends('frontenduser.layout')

@section('title', 'Orders - SerbukKopi.id')

@section('content')

<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url('/themes/ezone/assets/img/bg/breadcrumb.jpeg')">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>My Order</h2>
            <ul>
                <li><a href="#">home</a></li>
                <li>my order</li>
            </ul>
        </div>
    </div>
</div>
<div class="shop-page-wrapper shop-page-padding ptb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                @include('frontenduser.user_menu')
            </div>
            <div class="col-lg-9">
                <div class="d-flex justify-content-between">
                    <h2 class="text-dark font-weight-medium">Order ID #ORD12345</h2>
                </div>
                <div class="row pt-5">
                    <div class="col-xl-4 col-lg-4">
                        <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Billing Address</p>
                        <address>
                            John Doe<br>
                            Jl. Mawar No. 1<br>
                            Kecamatan A<br>
                            Email: john.doe@example.com<br>
                            Phone: 081234567890<br>
                            Postcode: 12345
                        </address>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Shipment Address</p>
                        <address>
                            Jane Doe<br>
                            Jl. Melati No. 2<br>
                            Kecamatan B<br>
                            Email: jane.doe@example.com<br>
                            Phone: 081987654321<br>
                            Postcode: 54321
                        </address>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <p class="text-dark mb-2" style="font-weight: normal; font-size:16px; text-transform: uppercase;">Details</p>
                        <address>
                            ID: <span class="text-dark">#ORD12345</span><br>
                            20 Dec 2024<br>
                            Status: Completed<br>
                            Payment Status: Paid<br>
                            Shipped by: JNE
                        </address>
                    </div>
                </div>
                <div class="table-content table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Unit Cost</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>PRD001</td>
                                <td>Pupuk Alami</td>
                                <td>Bahan organik dari sisa makhluk hidup<br> yang meningkatkan kesuburan tanah <br> dan menjaga ekosistem.</td>
                                <td>2</td>
                                <td>Rp60.000</td>
                                <td>Rp100.000</td>
                            </tr>
                            <tr>
                                <td>PRD002</td>
                                <td>Pupuk Kebun</td>
                                <td>Pupuk kebun adalah nutrisi<br>untuk mendukung pertumbuhan<br> tanaman di kebun.</td>
                                <td>1</td>
                                <td>Rp30.000</td>
                                <td>Rp50.000</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
