@section('title', 'Mayan Herbal - Partner with Us')
@include('layouts.main.header')
<link rel="stylesheet" type="text/css" href="/main/css/partner.css">
    @include('layouts.main.navbar')

    <!-- partner section -->
    <section class="partner">
        <div class="hero_section">

            <div class="heading">
                <h2>
                    The Spree Business Partner Network
                </h2>
                <p>
                    If you love building and leading teams, start your own business as an Spree Service Partner,
                    delivering smiles to customers across your community. Apply today or sign up to learn more.
                </p>
                <a href="/main/partner" class="button">
                    Be Our fullfilment Partner
                </a>
                <br />
                <!-- <a href="" class="button">
                    Be Our Ware House Partner
                </a> -->
            </div>

        </div>

        <div class="mt-5 mb-5">

            <div class="formHead">
                <h2 class="headingText">
                    Apply to the Spree Business Partner Network
                </h2>

            </div>
            <form action="">
                <div class="row form">
                    <div class="col-sm-6 col-md-6 col-lg-6" style="margin: 0px auto;">
                        <div class="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mr-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="text" placeholder="John" class="form-control form-control-sm"
                                                id="" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ml-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last Name</label>
                                            <input type="text" placeholder="Smith" class="form-control form-control-sm"
                                                id="" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" placeholder="abc@gmail.com" class="form-control form-control-sm"
                                        id="" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="phone" placeholder="Phone" class="form-control form-control-sm" id=""
                                        aria-describedby="emailHelp">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mr-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Business Name</label>
                                            <input type="text" placeholder="Business Name"
                                                class="form-control form-control-sm" id="" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ml-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Location</label>
                                            <input type="text" placeholder="Location"
                                                class="form-control form-control-sm" id="" aria-describedby="State">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mr-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Postal Code</label>
                                            <input type="text" placeholder="Poster Code"
                                                class="form-control form-control-sm" id="" aria-describedby="emailHelp"
                                                placeholder="Poster Code">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="ml-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">State</label>
                                            <input type="text" placeholder="State.."
                                                class="form-control form-control-sm" id="" aria-describedby="State">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contact Details</label>
                                    <textarea placeholder="Contact Details.." class="form-control form-control-sm" id=""
                                        aria-describedby="Contact Details"></textarea>
                                </div>
                            </div>

                            <div class="d-flex mb-5">
                                <input type="submit" value="Submit Application">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-4 col-sm-4 col-md-4">
                            
                        </div> -->
                </div>
            </form>


        </div>
    </section>

    <main>
        <!-- footer -->
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
        <div class="copyRight">
            <p>
                Copyright © 2020 Spree. All Rights Reserved.
            </p>
        </div>
    </main>
</body>

</html>