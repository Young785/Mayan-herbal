@section('title', 'Spree - Profile Page')
@include('layouts.main.header')

@include('layouts.main.navbar')
    <main>
    @include('layouts.main.sidebar')
            <div class="pCol2">
                <div class="heading">
                    <h2>Communication Preference</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding: 0px;">
                        <div style="overflow-x: auto;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            Best Time to Contact
                                        </th>
                                        <th>
                                            Contact Via
                                        </th>
                                        <th>
                                            Communication Language
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            After 1am
                                        </td>
                                        <td>
                                            Phone/Email
                                        </td>
                                        <td>
                                            English
                                        </td>
                                        <td>
                                            <a href="#" class="edit btn btn-primary">
                                                Edit
                                            </a>
                                            <a href="#" class="delete btn btn-danger">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="addBtn">
                            <button class="button">
                               + Add New Details
                            </button>
                        </div>
                    </div>
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