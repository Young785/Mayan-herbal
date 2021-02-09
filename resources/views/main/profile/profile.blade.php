@section('title', 'Spree - Profile Page')
@include('layouts.main.header')

@include('layouts.main.navbar')
    <main>
    @include('layouts.main.sidebar')

            <div class="pCol2">
                <div class="heading">
                    <h2>Hi {{ Auth::user()->username }}</h2>
                </div>
                <hr/>
                <div class="information d-flex">
                    <div class="col-xl-2 col-lg-2 col-md-2"></div>
                    <div class="left">
                        <h3>Your Personal information</h3>
                        <div class="info mt-3">
                            <p>Full Name:</p>
                            <p>{{ $user->fullname }}</p>
                        </div>
                        <div class="info">
                            <p>User Name</p>
                            <p>{{ $user->username }}</p>
                        </div>
                        <div class="info">
                            <p>Email Address:</p>
                            <p>{{ $user->email }}</p>
                        </div>
                        <div class="info">
                            <p>Address:</p>
                            <p>{{ $user->address }}</p>
                        </div>
                        <div class="info">
                            <p>Phone Number:</p>
                            <p>{{ $user->phone }}</p>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-2"></div>
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