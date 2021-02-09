@section('title', 'Mayan Herbal - Vendor Page')
@include('layouts.main.header')
<link rel="stylesheet" type="text/css" href="/main/css/career.css">
<link rel="stylesheet" type="text/css" href="/main/css/partner.css">
    @include('layouts.main.navbar')
    <style>
        .hero_section {
            background-image: url(/main/images/bg.png);
        }
    </style>

    <div class="hero_section">
        <div class="heading">
            <h2>
                The Spree Business Vendor / Seller Network
            </h2>
            <p>
                If you love building and leading teams, start your own business as an Spree Service Partner,
                delivering smiles to customers across your community. Apply today or sign up to learn more.
            </p>
            <a href="" class="button">
                Be Our Vendor / Seller
            </a>

        </div>

    </div>
    <main>
        <!-- partner section -->
        <section class="partner mt-2">

            <div class="wrapper">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="rowImg">
                            <img src="/main/images/vendor1.jpg" alt="image">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="desc">
                            <h4 class="mb-4">
                                Pro Seller Badge
                            </h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, reiciendis iure?
                                Sequi, et iure quam officiis sed quaerat velit mollitia ad culpa voluptates totam
                                excepturi dicta commodi corrupti magni dignissimos?
                            </p>
                            <div class="mt-3">
                                <a href="">
                                    Learn More &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row reverse">
                    <div class="col-md-6 col-sm-12">
                        <div class="rowImg">
                            <img src="/main/images/vendor1.jpg" alt="image">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="desc">
                            <h4 class="mb-4">
                                Pro Seller Badge
                            </h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, reiciendis iure?
                                Sequi, et iure quam officiis sed quaerat velit mollitia ad culpa voluptates totam
                                excepturi dicta commodi corrupti magni dignissimos?
                            </p>
                            <div class="mt-3">
                                <a href="">
                                    Learn More &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="rowImg">
                            <img src="/main/images/vendor1.jpg" alt="image">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="desc">
                            <h4 class="mb-4">
                                Pro Seller Badge
                            </h4>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, reiciendis iure?
                                Sequi, et iure quam officiis sed quaerat velit mollitia ad culpa voluptates totam
                                excepturi dicta commodi corrupti magni dignissimos?
                            </p>
                            <div class="mt-3">
                                <a href="">
                                    Learn More &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      @include('layouts.main.footer')
    </main>

</body>

</html>