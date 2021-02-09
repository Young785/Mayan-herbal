@extends('layouts.web')

@section('title', "Orders || Mayan-Herbal")

@section('breadtitle', "Company Accounts")

@section('breadli')
<li class="breadcrumb-item active">Orders</li>
@endsection

@section('content')
{{-- {{ dd($order_products) }} --}}
                        @if (Session()->has("msg"))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                The user was deleted Successfully!
                            </div>
                        @endif
                        @if (Session()->has("user"))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                You have Successfully make the vendor a User!
                            </div>
                        @endif
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Users</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="border-0">#</th>
                                                <th class="border-0">Image</th>
                                                <th class="border-0">Product Name</th>
                                                <th class="border-0">Product Id</th>
                                                <th class="border-0">Quantity</th>
                                                <th class="border-0">Price</th>
                                                <th class="border-0">Order Time</th>
                                                <th class="border-0">Customer</th>
                                                <th class="border-0">Status</th>
                                                <th class="border-0">Action</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                            @php
                                                $i = 0;
                                                while($i <= 0){
                                                    $i++;
                                                }
                                            @endphp 
                                            {{-- {{ dd($order_products) }} --}}
                                        @foreach ($order_products as $item)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                <div class="m-r-10"><img src="{{ asset('/images/products/') }}/{{ $order_products[$loop->index]['image_name'][0] }}" alt="user" class="rounded" width="45"></div>
                                            </td>
                                            <td>{{ $item->name }} </td>
                                            <td>{{ $item->id }} </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>${{ $item->paid_amount }}</td>
                                            <td>{{ $item->created_at->diffForHumans() }}</td>

                                            <td>{{ $item->username }} </td>
                                            @if ($item->order_status == "pending")
                                                <td><span class="badge-dot badge-brand mr-1"></span>InTransit </td>
                                                @else
                                                <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                            @endif
                                            <td style="width: 19%;">
                                                <a  data-toggle="modal" data-target="#see{{$item->id}}" class="btn btn-outline-primary float-right text-primary btn-sm">View Details</a>

                                                <a  data-toggle="modal" data-target="#delete{{$item->id}}" class="btn btn-outline-danger text-danger btn-sm">Delete Order</a>
                                            </td>

                                            <!-- modal daModal-->
                                            <div id="delete{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Account</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <form method="get" action="/orders/delete/{{$item->id}}">
                                                        <div class="modal-body">

                                                                    @csrf

                                                                <div class="alert alert-danger" role="alert">
                                                                    Are you sure you want to delete this Order?
                                                                </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Delete</button>

                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                                    <!-- modal daModal-->
                                                    <div id="see{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit Account</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                @php
                                                                    $order = App\Order::where("id", $item->id)->first();
                                                                @endphp
                                                                <div class="modal-body">
                                                                    <form action="/products/edit/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @METHOD('PATCH')
                                                                        <div class="form-group">
                                                                            <label for="inputText3" class="col-form-label">Order Images</label>
                                                                            <img style="height: 100px;" src="{{ asset('/images/products/') }}/{{ $order_products[$loop->index]['image_name'][0] }}" alt="">
                                                                            <img style="height: 100px;" src="{{ asset('/images/products/') }}/{{ $order_products[$loop->index]['image_name'][1] }}" alt="">
                                                                            <img style="height: 100px;" src="{{ asset('/images/products/') }}/{{ $order_products[$loop->index]['image_name'][2] }}" alt="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputText3" class="col-form-label">Vendor Id</label>
                                                                            <input id="inputText3" type="text" disabled value="{{ $order->vendor_id }}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputText3" class="col-form-label">Product Id</label>
                                                                            <input id="inputText3" type="text" disabled value="{{ $order->id }}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputText3" class="col-form-label">Product Price</label>
                                                                            <input id="inputText3" type="text" disabled value="{{ $item->paid_amount }}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputText3" class="col-form-label">Paid Price</label>
                                                                            <input id="inputText3" type="text" disabled value="{{ $order->paid_amount }}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputText3" class="col-form-label">Customer Name</label>
                                                                            <input id="inputText3" type="text" disabled value="{{ $item->name }}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputText3" class="col-form-label">Customer's Email</label>
                                                                            <input id="inputText3" type="text" disabled value="{{ $item->email }}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputText3" class="col-form-label">Customer's Address</label>
                                                                            <input id="inputText3" type="text" disabled value="{{ $item->address }}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputText3" class="col-form-label">Customer's Phone</label>
                                                                            <input id="inputText3" type="text" disabled value="{{ $item->phone }}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="inputText3" class="col-form-label">Order's Status</label>
                                                                            <input id="inputText3" type="text" disabled value="{{ $order->order_status }}" class="form-control">
                                                                        </div>
                                                                        <div class="form-group">
                                                                           <a href="/main/category/hoodie/product/{{ $item->product_id }}">Check out full details of the product here!</a>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
@endsection
