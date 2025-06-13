@extends('frontenduser.layout')

@section('title', 'Wishlist - SerbukKopi.id')

@section('content')
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


	<!-- register-area start -->
	<div class="register-area ptb-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
					<div class="login">
						<div class="login-form-container">
							<div class="login-form">
                                <form method="POST" action="{{ route('customerregister') }}">
                                    @csrf
                                      <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- register-area end -->
@endsection
