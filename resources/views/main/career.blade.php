@section('title', 'Mayan Herbal - Careers')
@include('layouts.main.header')
<link rel="stylesheet" type="text/css" href="/main/css/career.css">
<link rel="stylesheet" type="text/css" href="/main/css/partner.css">
    @include('layouts.main.navbar')

    <div class="career_bannner">
        <div class="career_banner_cap">
            <div class="heading d-flex" style="flex-direction: column;">
                <h2>
                    Do what you love
                </h2>
                <p class="bold mb-1">
                    Create the future you want
                </p>
            </div>
            <input type="search" placeholder="Search jobs" class="careerInput">
            <button class="careerBtn">Find Jobs</button>
        </div>
    </div>
    <main>
        <!-- career section -->
        <section class="career">
            <!-- banner -->
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="rowImg">
                            <img src="/main/images/career1.jpg" alt="image">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="desc">
                            <h4 class="mb-4">
                                Yur Education Benefits
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
                            <img src="/main/images/career2.jpg" alt="image">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="desc">
                            <h4 class="mb-4">
                                Smart Benefits
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
                            <img src="/main/images/career3.jpg" alt="image">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="desc">
                            <h4 class="mb-4">
                                A culture of success
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
</html>