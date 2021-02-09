@extends('layouts.admin-web')

@section('title', "Categories || Mayan-Herbal")

@section('breadtitle', "Company Accounts")

@section('breadli')
<li class="breadcrumb-item active">Categories</li>
@endsection

@section('content')
    @if (Session()->has("msg"))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            You have Successfully added a new Category!
        </div>
    @endif
    @if (Session()->has("catDeleted"))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        Category Deleted Successfully!
    </div>
    @endif
    @if (Session()->has("catEdited"))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        Category Edited Successfully!
    </div>
    @endif
    <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Users</h4>
                <div class="row" style="background: #fcfcff;">
                    @foreach ($categories as $category)
                        <div class="col-xl-3 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="product-thumbnail">
                                <div class="product-img-head">
                                    <div class="product-img">
                                        <img src="{{ asset("images/category") }}/{{ $category->category_image }}" alt="{{ $category->category_name }}" class="category-img img-fluid"></div>
                                    <div class="ribbons"></div>
                                    <div class="ribbons-text">New</div>
                                    <div class="">
                                        <h1  class="product-wishlist-btn">
                                            <div class="dropdown dd-action">
                                                <i class="fa fa-ellipsis-v dd-i"  style="cursor: pointer" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"></i>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item editDropdown" data-toggle="modal" data-target="#edit{{ $category->id }}"  data-id="{{ $category->id }}"  href="#">Edit</a>
                                                    <a class="dropdown-item"  data-toggle="modal" data-target="#delete{{ $category->id }}" href="#">Delete</a>
                                                </div>
                                            </div>
                                        </h1>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-content-head">
                                        <h3 class="product-title"><b class="bold"> {{ $category->category_name }}</b></h3>
                                    </div>
                                    <div class="product-content-head">
                                        <b class="bold">Description</b>: {{ $category->category_description }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteLabel">Delete Category</h5>
                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </a>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this Category?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-secondary" data-dismiss="modal">No</a>
                                        <form action="/categories/{{ $category->id }}" method="POST">
                                            @csrf
                                            @METHOD('DELETE')
                                            <button class="btn btn-primary" type="submit">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1"role="dialog" aria-labelledby="editLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editLabel">Edit Category</h5>
                                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </a>
                                    </div>
                                    @php
                                        $cat = App\Category::where("id", $category->id)->first();
                                    @endphp
                                    <div class="modal-body">
                                        <form action="/categories/edit/{{ $category->id }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @METHOD('PATCH')
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Category Name</label>
                                                <input id="inputText3" type="text" name="category_name" required value="{{ $cat->category_name }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Category Image</label>
                                                <p>This field is Optional!</p>
                                                <input id="inputText3" type="file" name="category_image" value="{{ $cat->category_image }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="inputText3" class="col-form-label">Category Description</label>
                                                <input id="inputText3" type="text" name="category_description" required value="{{ $cat->category_description }}" class="form-control">
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
