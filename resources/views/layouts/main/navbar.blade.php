	<link rel="stylesheet" href="/style.css	">
	<style>
		.btn{
			margin-top: 3px !important;
		}
	</style>
	@php
	$cat = App\Category::all()->sortBy('category_name');
	@endphp
	<!-- .navbar -->
	<section class="navigation">
		<div class="nav-container">
			<div class="brand">
				<a href="/" style="text-transform: capitalize;">Mayan Herbal</a>
			</div>
			<nav class="navbar-nav">
				<div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
				<ul class="nav-list">
					<li class="nav-center">
						<a href="/">Home</a>
					</li>
					<li class="dropdown">
						<button class="btn btn-fixed dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						 <strong>CATEGORIES</strong> 
						</button>
						@if ($cat != null)
						@foreach ($cat as $item)
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="/main/category/{{ $item->category_slug }}">{{ $item->category_name }}</a>
							</div>
							@endforeach
							@else
						</li>
						@endif
						
					{{-- <li class="dropdown">
						<button class="btn btn-fixed dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						  <strong>FEATURES</strong> 
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						  <a class="dropdown-item" href="/main/partner">Blog</a>
						  <a class="dropdown-item" href="/main/partner">Sell on Spree</a>
						  <a class="dropdown-item" href="/main/career">Career</a>
						  <a class="dropdown-item" href="/main/about">About Us</a>
						  <a class="dropdown-item" href="/main/vendors">Advertise with us</a>
						  <a class="dropdown-item" href="contact">Faq</a>
						</div>
					</li> --}}
					{{-- <li class="nav-center">
						<a href="/main/about">About Us</a>
					</li>
					<li class="nav-center">
						<a href="/main/contact">Contact Us</a>
					</li> --}}
					<li class="nav-form">
							<div class="">
								<div class="form-group has-search">
									<form action="/main/search" method="GET" role="search">
										@csrf
										<input type="text" class="form-control" name="q" placeholder="Search">
										<button type="submit" class="btn btn-default">
											<span class="fa fa-search form-control-feedback"></span>	
										</button>	
									</form>
								</div>
							</div>
					</li>
					<li class="icons">
						<a href="/main/cart" style="text-transform: capitalize;">
							Cart
							<span>
								<img src="/main/icons/cart.svg" alt="">
							</span>
						</a>
					</li>
                    @if (Auth::user() != null)
                        <li class="nav-li border_ccc icons">
                            <a href="/account" style="text-transform: capitalize;">
                                Account
                                <span>
                                    <img src="/main/icons/account.svg" alt="account" class="account">
                                </span>
                            </a>
						</li>
						<li class="nav-li border_ccc icons">
							<a href="/logout" style="text-transform: capitalize;">
								Logout
								<span style="margin-left: 10px">
									<i class="fa fa-power-off"></i>
								</span>
							</a>
						</li>
                        @else
                        <li class="nav-li border_ccc icons">
                            <a href="/pages/login" style="text-transform: capitalize;">
                                Log in
                                <span>
                                    <img src="/main/icons/account.svg" alt="account" class="account">
                                </span>
                            </a>
						</li>
						<li class="nav-li border_ccc icons">
                            <a href="/pages/register" style="text-transform: capitalize;">
                                Register
                                <span>
                                    <img src="/main/icons/account.svg" alt="account" class="account">
                                </span>
                            </a>
                        </li>
                    @endif
				</ul>
			</nav>

		</div>
	</section>