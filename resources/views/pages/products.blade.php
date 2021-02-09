@extends('layouts.admin-web')

@section('title', "Products || Mayan-Herbal")

@section('breadtitle', "Company Products")

@section('breadli')
<li class="breadcrumb-item active">Products</li>
@endsection

@section('content')
    @if (Session()->has("msg"))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            Product Created Successfully!
        </div>
    @endif
    @if (Session()->has("prodEdited"))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            Product Edited Successfully!
        </div>
    @endif
    @if (Session()->has("prodDeleted"))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            Product Deleted Successfully!
        </div>
    @endif
    <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Products</h4>
                <div class="row" style="background: #fcfcff;">
                    @foreach ($products as $product)
                        <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="product-thumbnail">
                                <div class="product-img-head">
                                    <div class="product-img">
                                        <img src="{{ asset('/images/products/') }}/{{ $pics[$loop->index]['image_name'][0] }}" alt="{{ $product->name }}" class="category-img img-fluid"></div>
                                    <div class="ribbons"></div>
                                    <div class="ribbons-text">New</div>
                                    <div class="">
                                        <h1  class="product-wishlist-btn">
                                            <div class="dropdown dd-action">
                                                <i class="fa fa-ellipsis-v dd-i"  style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"></i>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item editDropdown" data-toggle="modal" data-target="#edit{{ $product->id }}"  data-id="{{ $product->id }}"  href="#">Edit</a>
                                                    <a class="dropdown-item"  data-toggle="modal" data-target="#delete{{ $product->id }}" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </h1>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-content-head">
                                        <h3 class="product-title"><b class="bold"> {{ $product->name }}</b></h3>
                                        <div class="product-rating d-inline-block">
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                            <i class="fa fa-fw fa-star"></i>
                                        </div>
                                        <div class="product-price">${{ $product->price }}</div>
                                    </div>
                                    <div class="product-btn">
                                        <b class="bold">Description</b>: {{ $product->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                    <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteLabel">Delete Product</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </a>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Product?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">No</a>
                                    <form action="/products/{{ $product->id }}" method="POST">
                                        @csrf
                                        @METHOD('DELETE')
                                        <button class="btn btn-primary" type="submit">Yes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1"role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editLabel">Edit Category</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                                @php
                                    $prod = App\Product::where("id", $product->id)->first();
                                @endphp
                                <div class="modal-body">
                                    <form action="/products/edit/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @METHOD('PATCH')
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Product Name</label>
                                            <input id="inputText3" type="text" name="name" required value="{{ $prod->name }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Product Description</label>
                                            <input id="inputText3" type="text" name="description" required value="{{ $prod->description }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Product Price</label>
                                            <input id="inputText3" type="text" name="price" required value="{{ $prod->price }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputText3" class="col-form-label">Product Quantity</label>
                                            <input id="inputText3" type="text" name="quantity" required value="{{ $prod->quantity }}" class="form-control">
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                                        <button class="btn btn-primary" type="submit">Edit Category</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> 
        @endforeach

                </div>
            </div>
        </div>

                    

@endsection
