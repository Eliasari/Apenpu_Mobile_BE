@extends('templates.main')
@section('title')
    Product
@endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="gap"></div>
            <div class="gap"></div>
            <div class="gap"></div>
            <div class="box-lg">
                <div class="row">
                    <div class="col-md-5">
                        <div class="product-page-product-wrap jqzoom-stage">
                            <div class="clearfix">
                                <a href="{{ asset('storage/' . $product->photo) }}" id="jqzoom" data-rel="gal-1">
                                    <img src="{{ asset('storage/' . $product->photo) }}" alt="Image Alternative text" title="Image Title" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="row" data-gutter="10">
                            <div class="col-md-12">
                                <div class="box">
                                    <h3  >{{ $product->name }}</h3>
                                    <table class="table table-striped product-page-features-table">
                                        <tbody>
                                        <tr>
                                            <td>Nama Product:</td>
                                            <td>{{ $product->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stock:</td>
                                            <td>{{ $product->stock }}</td>
                                        </tr>
                                        <tr>
                                            <td>Harga:</td>
                                            <td>Rp. {{ number_format($product->harga, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Link WhatsApp:</td>
                                            <td><a href="https://wa.me/{{ Str::replaceFirst('0', '+62', '082384425491') }}"  target="_blank">{{ Str::replaceFirst('0', '+62','082384425491') }}</a></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Telepon:</td>
                                            <td>082384425491</td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi:</td>
                                            <td>{{ $product->description }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-12">
                                    <a class="btn btn-block btn-primary" href="{{route('preview-pesanan',$product->id)}}"><i class="fa fa-shopping-cart"></i>Beli</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

