@section('title', 'Mayan Herbal -' . $product->name. ' Product')
@include('layouts.main.header')
<link rel="stylesheet" type="text/css" href="/main/css/product_detail.css">
@include('layouts.main.navbar')
<style>
    .other-img{
        cursor: pointer;
    }
</style>
    <main>
        <!-- product details section -->
        <section class="pro_detail">
            <div class="top d-flex space-between">
                <div class="d-flex top_links">
                    <a href="/">
                        <p>
                           Home /
                        </p>
                    </a>
                    <a href="/main/category/{{ $category->category_name }}">
                        <p>
                           {{$category->category_name}}/
                        </p>
                    </a>
                        <p style="color: #000;">
                            {{$product->name}}

                    </a>
                </div>
                <!-- <div class="d-flex top_icons">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-pinterest-p"></i>
                <i class="fab fa-twitter"></i>
            </div> -->
            </div>
            <div class="detailRow">
                <div class="pro_col1 d-flex">
                    <div>
                        <div class="sImg other">
                            <a class="cart-li active" onclick="changeImage(this)">
                                <img src="{{ asset("images/products") }}/{{ $pic->image_name[0] }}" class="other-img" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="sImg">
                            <a class="cart-li active" onclick="changeImage(this)">
                                <img src="{{ asset("images/products") }}/{{ $pic->image_name[1] }}" class="other-img" alt="{{ $product->name }}">
                            </a>
                        </div>
                        <div class="sImg">
                            <a class="cart-li active" onclick="changeImage(this)">
                                <img src="{{ asset("images/products") }}/{{ $pic->image_name[2] }}" class="other-img" alt="{{ $product->name }}">
                            </a>
                        </div>
                        @if (count([$pic]) > 2)
                        <div class="sImg">
                            <a class="cart-li active" onclick="changeImage(this)">
                                <img src="{{ asset("images/products") }}/{{ $pic->image_name[3] }}" class="other-img" alt="{{ $product->name }}">
                            </a>
                        </div>
                        @else
                        @endif
                        
                    </div>
                    <div class="mainImg">
                        {{-- <li class="cart-li active" onclick="changeImage(this)"> --}}
                            <img src="{{ asset("images/products") }}/{{ $pic->image_name[0]}}" class="pro-img" alt="{{ $product->name }}">
                        {{-- </a> --}}

                    </div>

                </div>
                <div class="pro_col2">
                    <p class="underline">{{ $category->category_name }}</p>
                    <h2 class="heading">
                        {{ $product->name }}
                    </h2>
                    <div>
                        <!-- <div class="d-flex stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                        <p>(4.6)</p>
                        <p class="underline ml-2">
                            2267 rating
                        </p>
                        <p class="underline ml-3">
                            390 comments
                        </p>
                    </div> -->
                        <div>
                            <h4 class="price mt-3 mb-3">
                                ${{ $product->price }}
                            </h4>
                        </div>
                        <div class="qtySection d-flex mt-4">
                            <div class="qty">
                                <label for="qty" class="text-bold">Qty:</label>
                                <select class="sQty">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="1">5</option>
                                </select>
                            </div>
                            <div>
                                <a href="/main/add-to-cart/{{ $product->id }}" class="cart_btn">
                                    Add to Cart
                                </a>
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="heading mt-5 aboutItem">
                <h2>Product Description</h2>
                <p>{{ $product->description }}</p>
            </div>

            {{-- <div class="specification mt-5">
                <div class="heading">
                    <h2>
                        Specification
                    </h2>
                </div>
                <div style="overflow-x: auto;">
                    <table>
                        <tr>
                            <td>
                                Brand
                            </td>
                            <td>
                                Nintendo
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Manufacturer Part Number
                            </td>
                            <td>
                                HACSKAAL1
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Assembled Product Dimensions (L x W x H)
                            </td>
                            <td>

                                4.00 x 9.40 x 0.55 Inches
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Release Date
                            </td>
                            <td>
                                11/28/2019
                            </td>
                        </tr>

                    </table>
                </div>
            </div> --}}


        </section>

        <!-- also bought section -->
        {{-- <div class="mt-2 mb-2">
            <div class="">
                <div class="d-flex space-between fs-15 mt-3" style="    margin-top: 44px !important;">
                    <div>
                        <h4 class="fs-15"> <b>Customer Also Considered </b> </h4>
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
                        <img src="/main/images/row1.jpg" alt="products">
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
                        <img src="/main/images/row1.jpg" alt="products">
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
                        <img src="/main/images/row2.jpg" alt="products">
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
                        <img src="/main/images/row3.jpg" alt="products">
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
                        <img src="/main/images/row4.jpg" alt="products">
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
                        <img src="/main/images/row5.jpg" alt="products">
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
        </div> --}}
    @include('layouts.main.footer')
    <script>
        const thumbs = document.querySelector(".other").children;
        function changeImage(event){
        document.querySelector('.pro-img').src = event.children[0].src

        for (let i = 0; i < thumbs.length; i++) {
            thumbs[i].classList.remove("active");
        }
        event.classList.add("active");
        }
    </script>
</html>