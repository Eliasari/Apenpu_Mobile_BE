@extends('frontenduser.layout')

@section('title', 'Orders - SerbukKopi.id')

@section('content')
<div class="breadcrumb-area pt-205 breadcrumb-padding pb-210" style="background-image: url({{ asset('themes/ezone/assets/img/bg/breadcrumb.jpeg') }})">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2>My Order</h2>
            <ul>
                <li><a href="{{ url('/') }}">home</a></li>
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
                <div class="shop-product-wrapper res-xl">
                    <div class="table-content table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Order ID</th>
                                <th>Grand Total</th>
                                <th>Nomer Resi</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        ORD12345<br>
                                        <span style="font-size: 12px; font-weight: normal">20 Dec 2024</span>
                                    </td>
                                    <td>Rp150,000</td>
                                    <td>RESI12345678</td>
                                    <td>Completed</td>
                                    <td>Paid</td>
                                    <td>
                                        <a href="{{ route('detail.order.show') }}" class="btn btn-info btn-sm">details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ORD67890<br>
                                        <span style="font-size: 12px; font-weight: normal">18 Dec 2024</span>
                                    </td>
                                    <td>Rp200,000</td>
                                    <td> </td>
                                    <td>Processing</td>
                                    <td>Unpaid</td>
                                    <td>
                                        <a href=" " class="btn btn-info btn-sm">details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ORD54321<br>
                                        <span style="font-size: 12px; font-weight: normal">15 Dec 2024</span>
                                    </td>
                                    <td>Rp300,000</td>
                                    <td>RESI12378945</td>
                                    <td>Delivered</td>
                                    <td>Paid</td>
                                    <td>
                                        <a href=" " class="btn btn-info btn-sm">details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
