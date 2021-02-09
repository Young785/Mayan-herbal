@section('title', 'Mayan Herbal - Contact Us')
@include('layouts.main.header')
<link rel="stylesheet" type="text/css" href="/main/css/contact.css">
    @include('layouts.main.navbar')
    <main>
        <section class="contact">
            <div class="heading">
                <h2>
                    Contact Us
                </h2>
            </div>
            <div class="contactContent">
                <div class="row">
                    <div class="col-sm-8 contactImg">
                    </div>
                    <div class="col-sm-4 contactDesc">
                        <h3>
                            Customer Feedback
                        </h3>
                        <p>
                            Contact us to provide a comment or ask a question about your local store or our corporate
                            headquarters.
                        </p>
                        <p>
                            If you have a question about item pricing, please contact customer service below.
                        </p>
                        <div class="iconText d-flex mt-4">
                            <div>
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                Call 1-800-925-0000 (SPREE)
                            </div>
                        </div>
                        <div class="iconText d-flex mt-3">
                            <div>
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <div>
                                spree@gmail.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.main.footer')
</html>