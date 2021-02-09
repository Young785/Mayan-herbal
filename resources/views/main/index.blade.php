@section('title', 'Mayan Herbal - No.1 most selling Herbal Company')
@include('layouts.main.header')

<link rel="stylesheet" href="/main/css/cart.css">
    @include('layouts.main.navbar')
	<div>

		<div id="demo" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
			</ul>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="/main/images/about.jpg" alt="Los Angeles" width="100%">
					<div class="carousel-caption">
						<h3>Los Angeles</h3>
						<p>We had such a great time in LA!</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="/main/images/banner2.png" alt="Chicago" width="100%">
					<div class="carousel-caption">
						<h3>Chicago</h3>
						<p>Thank you, Chicago!</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#demo" data-slide="prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a class="carousel-control-next" href="#demo" data-slide="next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>
		<!-- <div class="col-sm-12 p-0">
 		<img src="https://img.lovepik.com//back_pic/05/70/26/915b9dfcd2e30f6.jpg_wh860.jpg" style="width: 100%; height: 300px;">
 	</div> -->
	</div>
	<article>
		{{-- {{ dd($category) }} --}}

		@foreach ($category as $cat)
			@php
				$cat_id = $cat->id;
				$products = App\Product::where("category_id", $cat_id)->take(6)->get();
			@endphp
			@if (count([$products]) == 1)
				<div class="mt-2 mb-2">
					<div class="">
						<div class="d-flex space-between fs-15 mt-3" style="margin-top: 44px !important;">
							<div>
								<h4 class="fs-15"> <b>{{ $cat->category_name }}</b> </h4>
							</div>
							<div class="shopAll">
								<a href="/main/category/{{ $cat->category_slug }}" style="font-weight: 600;">Shop All <i class="fa fa-chevron-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="row w20Row" style="margin-left: -2px;">
						
						@foreach ($products as $item)
							<div class="col-lg-3 w20">
								<a href="/main/category/hoodie/product/{{ $item->id }}"> 
									<div class="w20Img">
										<img src="{{ asset('/images/products/') }}/{{ $pics[$loop->index]['image_name'][0] }}" alt="{{ $item->name }}">
									</div>
								</a>
								<div class="w20Desc">
									<div>
										<span class="font-weight500">{{ $item->name }}</span>
									</div>
									<div>
										<h4>${{ $item->price }}</h4>
										<a href="/main/add-to-cart/{{ $item->id}}">
											<button class="add_card">Add to cart</button>
										</a>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				@else
			@endif
		@endforeach
		<div class="mt-2 mb-2 col-sm-12 footer_banner">
			<h4>Finds for family time</h4>
			<span> Lorem ipsum dolor sit amet, consectetur adipisicing elit, </span>
		</div>
	@include('layouts.main.footer')
</html>