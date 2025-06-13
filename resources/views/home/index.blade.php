@extends('templates.main')

@section('content')
    <div class="owl-carousel owl-loaded owl-nav-dots-inner" data-options='{"items":1,"loop":true}'>
        <div class="owl-item">
            <div class="slider-item" style="background-image:url({{asset('assets/img/windows.jpg')}});">
                <div class="container">
                    <div class="slider-item-inner">
                        <div class="slider-item-caption-left slider-item-caption-white">
                            <h4 class="slider-item-caption-title">Toko Pupuk</h4>
                            <p class="slider-item-caption-desc">I'm Not Gonna Pay A Lot For This Laptop.</p><a class="btn btn-lg btn-ghost btn-white" href="https://wa.me/{{ Str::replaceFirst('0', '+62', '082384425491') }}" target="_blank">Contact Market</a>
                        </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="owl-item">
            <div class="slider-item" style="background-color:#93282B;">
                <div class="container">
                    <div class="slider-item-inner">
                        <div class="slider-item-caption-left slider-item-caption-white">
                            <h4 class="slider-item-caption-title">Run! Run! Run!</h4>
                            <p class="slider-item-caption-desc">Your Running Shoes, Right Away.</p><a class="btn btn-lg btn-ghost btn-white"href="https://wa.me/{{ Str::replaceFirst('0', '+62', '082384425491') }}" target="_blank">Contact Market</a>
                        </div>
                        <img class="slider-item-img-right" src="{{asset('assets/img/test_slider/3.png')}}" alt="Image Alternative text" title="Image Title" />
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-item">
            <div class="slider-item" style="background-color:#93282B;">
                <div class="container">
                    <div class="slider-item-inner">
                        <div class="slider-item-caption-left slider-item-caption-white">
                            <h4 class="slider-item-caption-title">Run! Run! Run!</h4>
                            <p class="slider-item-caption-desc">Your Running Shoes, Right Away.</p><a class="btn btn-lg btn-ghost btn-white"href="https://wa.me/{{ Str::replaceFirst('0', '+62', '082384425491') }}" target="_blank">Contact Market</a>
                        </div>
                        <img class="slider-item-img-right" src="{{asset('assets/img/test_slider/3.png')}}" alt="Image Alternative text" title="Image Title" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gap"></div>
    <div class="container">
        <h3 class="widget-title-lg">Produk</h3>
        <div class="row" data-gutter="15">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="product ">
                        <ul class="product-labels">
                            <li>hot</li>
                        </ul>
                        <div class="product-img-wrap" style="height: 200px; overflow: hidden;">
                            <img class="product-img-primary" src="{{ asset('storage/' . $product->photo) }}" alt="Image Alternative text" title="Image Title" />
                            <img class="product-img-alt" src="{{ asset('storage/' . $product->photo) }}" alt="Image Alternative text" title="Image Title" />
                        </div>
                        <a class="product-link" href="{{ route('product.show', $product->id) }}"></a>
                        <div class="product-caption">
                            <h5 class="product-caption-title">{{ $product->name}}</h5>
                            <p>{{ $product->description}}</p>
                            <div class="product-caption-price">
                                <p>Stock : {{ $product->stock}}</p>
                                <span class="product-caption-price-new">Rp. {{ number_format($product->harga, 0, ',', '.') }}</span>
                            </div>
                            <br>
                            <div class="col-12">
                                <a class="btn btn-block btn-primary" href="{{ route('product.show', $product->id) }}">
                                    <i class="fa fa-shopping-cart"></i> Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>

@endsection
