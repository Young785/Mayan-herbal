@extends('layouts.admin-web')

@section('title', "Add Category || Mayan-Herbal")

@section('breadtitle', "Company Accounts")

@section('breadli')
<li class="breadcrumb-item active">Add Category</li>
@endsection

@section('content')
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Users</h4>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Your Category</h5>
                        <div class="card-body">
                            <form action="/add-category" method="POST" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Category Name</label>
                                        <input id="inputText3" type="text" name="category_name" placeholder="Category Name: " value="{{old("category_name") }}" class="form-control">
                                        <p class="error">{{ $errors->first("category_name") }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Category Image</label>
                                        <input id="inputText3" type="file" name="category_image" value="{{old("category_image") }}" class="form-control">
                                        <p class="error">{{ $errors->first("category_image") }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Category Descripton</label>
                                        <input id="inputText3" type="text" name="category_description"  placeholder="Category Description: " value="{{old("category_description") }}" class="form-control">
                                        <p class="error">{{ $errors->first("category_description") }}</p>
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-primary">Add Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
