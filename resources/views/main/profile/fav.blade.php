@section('title', 'Spree - Profile Page')
@include('layouts.main.header')

@include('layouts.main.navbar')
    <main>
    @include('layouts.main.sidebar')
    
        <div class="pCol2">
            @if (session()->has("saved"))
                <div class="alert alert-success alert-dismissible text-center" id="remove">
                    <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
                    <strong>Success! </strong>"Product saved to your Account Successfully!
                </div>
            @endif
            @if (session()->has("msg"))
                <div class="alert alert-success alert-dismissible text-center" id="remove">
                    <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
                    <strong>Success! </strong> You deleted the saved product Successfully!
                </div>
            @endif
            @if (session()->has("verify"))
                <div class="alert alert-success alert-dismissible text-center" id="remove">
                    <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
                    <strong>Success! </strong> Your account has been verified Successfully!
                </div>
            @endif
            <div class="heading">
                <h2>My Favs</h2>
            </div>
            <hr/>
            <div class="row">
            @foreach ($saved as $item)
                 <div class="col-lg-12" style="padding: 0px;">
                    <div class="row favRow">
                        <div class="col-sm-2">
                            <div class="favImg">
                                <img src="{{ asset('/images/products/') }}/{{ $pics[$loop->index]['image_name'][0] }}" alt="{{ $item->name }}">
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-4">
                            <p>
                                {{$item->name}}
                            </p>
                        </div>
                        <div class="col-sm-2">
                            <p class="price">
                                ${{$item->price}}
                            </p>
                        </div>
                        <div class="col-sm-2">
                            <button class="btn btn-primary"><i class="fa fa-cart-plus"></i></button>
                        </div>
                        <div class="col-sm-1 delete">
                        <form action="/account/{{$item->id}}" class="del-form" method="POST">
                            @csrf
                            @METHOD('DELETE')
                            <button href="#" class="btn btn-primary">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
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
</body>
</html>