@section('title', 'Spree - Profile Page')
@include('layouts.main.header')

@include('layouts.main.navbar')
    <main>
    @include('layouts.main.sidebar')

            <div class="pCol2">
                @if (session()->has("msg"))
                        <div class="alert alert-success text-center col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12" id="remove">
                            Your Order has been placed Successfully!
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        </div>
                    @endif
                <div class="heading">
                    <h2>Order History</h2>
                </div>
                <hr/>
                <div class="row">
                    @foreach ($order_products as $item)
                    {{-- {{ dd($item) }} --}}
                        <div class="col-lg-12" style="padding: 0px;">
                            <div class="row favRow">
                                <div class="col-sm-2">
                                    <div class="favImg">
                                        <img src="{{ asset('/images/products/') }}/{{ $pics[$loop->index]['image_name'][0] }}" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-1"></div>
                                <div class="col-sm-3">
                                    <p>
                                        {{ $item->name }}
                                    </p>
                                </div>
                                <div class="col-sm-2">
                                    <p class="price">
                                        ${{ $item->price }}
                                    </p>
                                </div>
                                <div class="col-sm-1">
                                    <p class="date">
                                        {{ $item->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="col-sm-1">
                                    @if ($item->order_status == "completed")
                                        <button class="btn btn-success">Completed</button>
                                        @else
                                        <button class="btn btn-warning">Pending</button>
                                    @endif
                                </div>
                                <div class="col-sm-1 delete" style="margin-left: 20px;">
                                    <a href="#" class="delete">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        
        <div class="footer">
            <div class="row" style="margin-left: -2px;">
                <div class="col-lg-3 col-md-6 col-sm-12 ">
                    <div>
                        <h6>Get to Know Us</h6>
                        <ul>
                            <li>
                                <a href="./about.html">About Us</a>
                            </li>
                            <li>
                                <a href="./career.html">Career</a>
                            </li>
                            <li>
                                <a href="./blog.html">Blog</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div>
                        <h6>Spree Business</h6>
                        <ul>
                            <li>
                                <a href="./partner.html">Sell on Spree</a>
                            </li>
                            <li>
                                <a href="./vendor/vendor.html">Advertise With Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div>
                        <h6>Customer Service</h6>
                        <ul>
                            <li>
                                <a href="./contact.html">Contact Us </a>
                            </li>
                            <li>
                                <a href="./contact.html">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3  ">
                    <h6>Social</h6>
                    <div class="d-flex">
                        <div style="width: 24px;">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
    
                        </div>
                        <div style="width: 24px;" class="ml-3">
                            <i class="fa fa-twitter" aria-hidden="true"></i>
                        </div>
    
                    </div>
                </div>
    
            </div>
        </div>
        @include('layouts.main.footer')
</html>