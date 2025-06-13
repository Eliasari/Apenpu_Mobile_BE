@extends('frontenduser.layout')

@section('title', 'Products - GANG MACAN')

@section('content')
    <!-- slider -->
        <div class="slider-area">
            <div class="slider-active owl-carousel">
                <div class="single-slider-4 slider-height-6 bg-img" style="background-image:url({{asset('assets/img/9.jpg')}});">
                    <div class="container">
                            <div class="row">
                                <div class="ml-auto col-lg-6">
                                    <div class="furniture-content fadeinup-animated">
                                        <h2 class="animated">PUPUK GDM MALANG</h2>
                                        <p class="animated">Sawojajar, Kota Malang</p>
                                        <a class="furniture-slider-btn btn-hover animated" href="https://wa.me/{{ Str::replaceFirst('0', '+62', '085778445682') }}" target="_blank">Contact Market</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                 </div>
                 <div class="single-slider-4 slider-height-6 bg-img" style="background-image:url({{asset('assets/img/tokopupuk2.jpeg')}});">
                    <div class="container">
                            <div class="row">
                                <div class="ml-auto col-lg-6">
                                    <div class="furniture-content fadeinup-animated">
                                        <h2 class="animated">PUPUK GDM MALANG</h2>
                                        <p class="animated">Sawojajar, Kota Malang</p>
                                        <a class="furniture-slider-btn btn-hover animated" href="https://wa.me/{{ Str::replaceFirst('0', '+62', '085778445682') }}" target="_blank">Contact Market</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                 </div>
            </div>
        </div>
    <!-- end -->
    <!-- products -->

	<div class="popular-product-area wrapper-padding-3 pt-115 pb-115">
		<div class="container-fluid">
			<div class="section-title-6 text-center mb-50">
				<h2>Popular Product</h2>
				<p>Pupuk Alami berkualitas tinggi yang dipilih karena kandungannya yang ramah lingkungan, efektif menyuburkan tanah, dan mendukung pertumbuhan tanaman secara optimal. Cocok untuk berbagai jenis tanaman dan kebutuhan berkebun Anda.</p>
			</div>
			<div class="product-style">
				<div class="popular-product-active owl-carousel">
					@foreach ($products as $product)
						<div class="product-wrapper">
							<div class="product-img">
								<a href="{{ route('product.show', $product->id) }}">
									<img class="product-img-primary" src="{{ asset('storage/' . $product->photo) }}" alt="Image Alternative text" title="Image Title" />
								</a>
								<div class="product-action">
                                    <!-- Button for adding to cart, now pointing to the 'preview-pesanan' route -->
                                    <a class="animate-top add-to-cart" title="Add To Cart" href="{{ route('product.show', $product->id) }}">
                                        <i class="pe-7s-cart"></i>
                                    </a>

                                    <a class="animate-right quick-view" data-toggle="modal" data-target="#exampleModal-{{ $product->id }}" title="Quick View" href="#">
                                        <i class="pe-7s-look"></i>
                                    </a>

                                </div>

							</div>
							<div class="funiture-product-content text-center">
								<h4><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h4>
                                <span class="product-caption-price-new">Rp. {{ number_format($product->harga, 0, ',', '.') }}</span>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

    @foreach ($products as $product)
    <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="pe-7s-close" aria-hidden="true"></span>
        </button>
        <div class="modal-dialog modal-quickview-width" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="qwick-view-left">
                        <div class="quick-view-learg-img">
                            <div class="quick-view-tab-content tab-content">
                                <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                    <img src="{{ asset('storage/' . $product->photo) }}" alt="Image Alternative text" title="Image Title" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="qwick-view-right">
                        <div class="qwick-view-content">
                            <h3>{{ $product->name }}</h3>
                            <div class="price">
                                <span class="new">{{ $product->harga }}</span>
                                <span class="old">50.000</span>
                            </div>
                            <div class="rating-number">
                                <div class="quick-view-rating">
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                    <i class="pe-7s-star"></i>
                                </div>
                                <div class="quick-view-number">
                                    <span>4 Rating (S)</span>
                                </div>
                            </div>
                            <p>Link WhatsApp: <a href="https://wa.me/{{ Str::replaceFirst('0', '+62', '082384425491') }}"  target="_blank">{{ Str::replaceFirst('0', '+62','082384425491') }}</a></p>
                            <p>Nomor Telepon: 085778445682</p>

                            <p>{{ $product->description }}</p>
                            <div class="quickview-plus-minus">
                                <div class="quickview-btn-cart" style="margin-left: -0.5%;">
                                    <a class="submit contact-btn btn-hover" href="{{ route('preview-pesanan', $product->id) }}">add to cart</a>
                                </div>

                                <div class="quickview-btn-wishlist">
                                    <a class="btn-hover" href="#"><i class="pe-7s-like"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
    <!-- end -->

    {{-- <style>
.text-white {
    color: white;
}

    </style> --}}
@endsection
