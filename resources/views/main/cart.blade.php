@section('title', 'Mayan Herbal - Your Carts')
@include('layouts.main.header')

<link rel="stylesheet" href="/main/css/cart.css">
    @include('layouts.main.navbar')
    <!-- .navbar -->
    <main>
        <!-- cart section -->
        <section class="myCart d-flex">
            <div class="cartCol1">
                @if (session()->has("msg"))
                <div class="alert alert-success alert-dismissible text-center" id="remove">
                  <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
                  <strong>Success!</strong> Product Added to Cart Successfully. You can remove, update or Proceed with the buying Below. Thanks!
                </div>
              @endif
              @if (session()->has("mssg"))
              <div class="alert alert-success alert-dismissible text-center" id="remove">
                <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
                <strong>Success!</strong> Product removed from Cart successfully!
              </div>
            @endif
                @if(session('cart'))
                <div class="heading">
                    <h2>Your Cart : {{ count(session('cart')) }} <span>items</span></h2>
                </div>
                    @foreach(session('cart') as $id => $cart)
                        <div class="productRow d-flex">
                            <div class="d-flex">
                                <div class="proImg">
                                    <img src="{{ asset("/images/products") }}/{{ $cart['image_name'] ?? ''}}" alt="product">
                                </div>
                                <div class="proDesc ml-4">
                                    <div class="d-flex">
                                        <div class="mt-3">
                                            <p class="text-bold" style="font-size: 16px;">
                                                {{ $cart['name'] ?? ''}}
                                            </p>
                                        </div>
                                        <div class="qty ml-5">
                                            <label for="qty" class="text-bold">Qty:</label>
                                            <select class="sQty quantity" name="quantity">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- protection card -->
                                    <div class="proCard">
                                        <div class="proTop d-flex">
                                            <div>
                                                <p class="text-bold">
                                                    Add-on-service
                                                    <span>
                                                        (0 selected)
                                                    </span>
                                                </p>

                                            </div>
                                            <div>
                                                <a href="" class="text-bold">
                                                    View
                                                </a>
                                            </div>
                                        </div>
                                        <div class="proBottom d-flex">
                                            <i class="fas fa-shield-virus"></i>
                                            <p class="text-sm ml-2">
                                                Protection Plans
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @php
                                $id = $cart['id'];
                                $get_price = App\Product::where('id', $id)->first('price')
                            @endphp
                            <div class="proRight">
                                <div class="priceArea">
                                    <p>Real Price </p>
                                    <span class="price">
                                        ${{ $get_price->price ?? '' }}
                                    </span>
                                    
                                    <p>Delivery</p>
                                </div>
                            </div>


                           <div class="proRight">
                                <div class="priceArea">
                                    <p>Product Current Price</p>
                                    <span>
                                        ${{ $cart['price'] ?? ''}}
                                    </span>
                                    
                                    <p>Delivery</p>
                                    
                                    <div style="margin-top: 10px;">
                                        <button class="btn btn-primary btn-small update-cart" data-id="{{ $id }}" type="button"> <i class="fa fa-refresh"></i> Update</button>
                                    </div>
                                </div>
                                
                                <div class="sLater d-flex">
                                    <form action="/main/cart/{{ $cart['id'] ?? '' }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button data-id="$id" class="btn btn-primary text-bold">
                                            Remove
                                        </button>
                                    </form>
                                    <div class="vLine">

                                    </div>
                                    <form action="/main/cart/{{ $cart['id'] ?? '' }}" method="POST">
                                        @csrf
                                        <button href="" class="btn btn-primary text-bold ml-3">
                                            Save For Later
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4">
                    @endforeach
               
                <div class="saved_for_later">
                    <div class="heading">
                        <h2>Saved For Later</h2>
                        <p>You have no saved items right now</p>
                    </div>
                </div>

            </div>
            <div class="cartCol2">
                <div class="heading d-flex justify-content-center">
                    <h2>
                        Order Summary
                    </h2>
                </div>
                <div class="orderDetail">
                    <hr />
                    <div class="d-flex justify-content-between">
                        <p class="text-bold">
                            Item Total
                        </p>
                        <p class="text-bold">
                            @php
                                $jun = session('cart');
                                $subTotal = 0;
                                foreach ($jun as  $item) {
                                    $subTotal += $item['price'];
                                }
                            echo "$".$subTotal."";
                        @endphp
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-bold">
                            Sales Tax
                        </p>
                        <p class="text-bold">
                            Calculated in checkout
                        </p>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between mt-2 Total">
                        <p class="text-bold">
                            Total
                        </p>
                        <p class="text-bold">
                            @php
                            $jun = session('cart');
                            $subTotal = 0;
                            foreach ($jun as  $item) {
                                $subTotal += $item['price'];
                            }
                        echo "$".$subTotal."";
                    @endphp
                        </p>
                    </div>
                    <div class="cartBtn">
                        @if (Auth::user()  == null)
                            <a href="/main/login">
                                <button class="cart mt-3">
                                    Checkout
                                </button>
                            </a>    
                            @elseif(Auth::user()->user_type != "user")
                            <a href="/main/login">
                                <button class="cart mt-3">
                                    Checkout
                                </button>
                            </a>
                            @else
                            <form action="/main/checkout" method="GET">
                                @csrf
                                <button class="cart mt-3">
                                    Checkout
                                </button>
                            </form>
                        @endif
                       
                        
                        <button class="paypal mt-3 d-flex mb-3">
                            <i class="fab fa-paypal"></i>
                            <span class="ml-2" style="color: #263B80;">pay<span style="color: #139AD6;">Pal</span>
                            </span>
                            <p class="ml-2">
                                Checkout
                            </p>
                        </button>
                    </div>
                    <div class="today">
                    </div>
                </div>
            </div>
        </section>
        @else
        <strong style="font-size: 40px;" class="text-center">
            No Cart Available!!!
        </strong>
        @endif

        <!-- also bought section -->
        <div class="mt-2 mb-2">
            <div class="">
                <div class="d-flex space-between fs-15 mt-3" style="    margin-top: 44px !important;">
                    <div>
                        <h4 class="fs-15"> <b>Customers Also Bought</b> </h4>
                    </div>
                    <!-- <div>
                    <a href="" style="color: black; font-weight: 600;">Shop All <i class="fa fa-chevron-right"></i>
                    </a>
                </div> -->
                </div>
            </div>
            <div class="row w20Row" style="margin-left: -2px;">
                <div class="col-lg-3 w20">
                    <div class="w20Img">
                        <img src="./images/row1.jpg" alt="products">
                    </div>
                    <div class="w20Desc">
                        <div>
                            <span class="font-weight500">Apply iPad (Latest Model) Wifi</span>
                        </div>
                        <div>
                            <h4>$300</h4>
                            <button class="add_card">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 w20">
                    <div class="w20Img">
                        <img src="./images/row1.jpg" alt="products">
                    </div>
                    <div class="w20Desc">
                        <div>
                            <span class="font-weight500">Apply iPad (Latest Model) Wifi</span>
                        </div>
                        <div>
                            <h4>$300</h4>
                            <button class="add_card">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 w20">
                    <div class="w20Img">
                        <img src="./images/row2.jpg" alt="products">
                    </div>
                    <div class="w20Desc">
                        <div>
                            <span class="font-weight500">Smith & Cult Nailed Lacquer,Lovers,Creep</span>
                        </div>
                        <div>
                            <h4>$300</h4>
                            <button class="add_card">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 w20">
                    <div class="w20Img">
                        <img src="./images/row3.jpg" alt="products">
                    </div>
                    <div class="w20Desc">
                        <div>
                            <span class="font-weight500">Larabal fruit and cocunut nutball</span>
                        </div>
                        <div>
                            <h4>$300</h4>
                            <button class="add_card">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 w20">
                    <div class="w20Img">
                        <img src="./images/row4.jpg" alt="products">
                    </div>
                    <div class="w20Desc">
                        <div>
                            <span class="font-weight500">Umbra trag wall display large</span>
                        </div>
                        <div>
                            <h4>$300</h4>
                            <button class="add_card">Add to cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 w20">
                    <div class="w20Img">
                        <img src="./images/row5.jpg" alt="products">
                    </div>
                    <div class="w20Desc">
                        <div>
                            <span class="font-weight500">cotton waffle coverlet</span>
                        </div>
                        <div>
                            <h4>$300</h4>
                            <button class="add_card">Add to cart</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <script>
            $(".update-cart").click(function (e) {
                   e.preventDefault();
                   var ele = $(this);
                    $.ajax({
                       url: '{{ url('/main/update-cart') }}',
                       method: "patch",
                       data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("tr").find(".quantity").val(), price: ele.parents("tr").find(".price").val()},
                       consol.
                       success: function (response) {
                           window.location.reload();
                       }
                    });
                });
        
        </script>
        @include('layouts.main.footer')
       
</html>