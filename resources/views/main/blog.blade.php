@section('title', 'Mayan Herbal -Our Blog')
@include('layouts.main.header')
<link rel="stylesheet" type="text/css" href="/css/blog.css">
    @include('layouts.main.navbar')
    <main>
        <!-- BLOG SECTION -->
    <section class="blog">
        <div class="heading">
            <h2>
                BLOGS
            </h2>
        </div>
        <div class="blogContent">
            <div class="row">
                <div class="col-sm-4">
                    <div class="blogBox">
                        <div class="blogImg">
                            <img src="./images/blog1.jpg" alt="">
                        </div>
                        <div class="blogDesc">
                            <h3>
                                How We’re Responding to COVID-19
                            </h3>
                            <p>
                                We’re doing everything we can to help strengthen our community of families, friends and associates.
                            </p>
                            <p class="date">
                                November 23, 2020
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="blogBox">
                        <div class="blogImg">
                            <img src="./images/blog3.jpg" alt="">
                        </div>
                        <div class="blogDesc">
                            <h3>
                                Inside Look: Spree Media Group Continues to Gain Momentum
                            </h3>
                            <p>
                                Connecting brands with millions of Spree customers every day – that's what we do at Spree Media Group. Every year, 90% of America shops at Spree. Our goal is to provide a brand-safe platform that enables advertisers to engage with customers.
                            </p>
                            <p class="date">
                                December 16, 2020
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="blogBox">
                        <div class="blogImg">
                            <img src="./images/blog2.jpg" alt="">
                        </div>
                        <div class="blogDesc">
                            <h3>
                                Spree Continues to Prioritize Forest Conservation by Stepping Up Efforts Toward 2025
                            </h3>
                            <p>
                                Our customers want to feel good about shopping at Spree, and they count on us to deliver access to products that are safe, healthier and affordable in a way that is sustainable. For more than 15 years, we’ve been collaborating with others to drive positive impact across…
                            </p>
                            <p class="date">
                                December 22, 2020
                            </p>
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