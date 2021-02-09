@section('title', 'Spree - Profile Page')
@include('layouts.main.header')

@include('layouts.main.navbar')
    <main>
    @include('layouts.main.sidebar')
            <div class="pCol2">
                <div class="heading">
                    <h2>Shipping Addresses</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding: 0px;">
                        <div style="overflow-x: auto;">
                            <table>
                                <thead>
                                    <tr>
                                        <th>
                                            Full name
                                        </th>
                                        <th>
                                            Address
                                        </th>
                                        <th>
                                            Region
                                        </th>
                                        <th>
                                            Phone Number
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Jhon Doe
                                        </td>
                                        <td>
                                            house no#00 address country etc
                                        </td>
                                        <td>
                                            country name
                                        </td>
                                        <td>
                                            090909090
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
                               + Add New Address
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @include('layouts.main.footer')
</html>