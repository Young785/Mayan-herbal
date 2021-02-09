@section('title', 'Mayan Herbal - You searched for')
@include('layouts.main.header')

@include('layouts.main.navbar')
	<div>

		<div id="demo" class="carousel slide" data-ride="carousel">
			<ul class="carousel-indicators">
				<li data-target="#demo" data-slide-to="0" class="active"></li>
				<li data-target="#demo" data-slide-to="1"></li>
			</ul>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="./images/banner1.png" alt="Los Angeles" width="100%">
					<div class="carousel-caption">
						<h3>Los Angeles</h3>
						<p>We had such a great time in LA!</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="./images/banner2.png" alt="Chicago" width="100%">
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
		{{-- @foreach ($category as $cat) --}}
			@if (count([$products]) == 1)
				<div class="mt-2 mb-2">
					<div class="">
						<div class="d-flex space-between fs-15 mt-3" style="    margin-top: 44px !important;">
							<div>
								<h4 class="fs-15"> <b>Searched Products: </b> </h4>
							</div>
						</div>
					</div>
					<div class="row w20Row" style="margin-left: -2px;">
						
						@foreach ($products as $item)
							<div class="col-lg-3 w20">
								<div class="w20Img">
									<img src="{{ asset('/images/products/') }}/{{ $pics[$loop->index]['image_name'][0] }}" alt="{{ $item->name }}">
								</div>
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
		{{-- @endforeach --}}
	</article>
		<div class="mt-2 mb-2 col-sm-12 footer_banner">
			<h4>Finds for family time</h4>
			<span> Lorem ipsum dolor sit amet, consectetur adipisicing elit, </span>
		</div>
        @include('layouts.main.footer')
	</html>