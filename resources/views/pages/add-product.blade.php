@extends('layouts.admin-web')

@section('title', "Add Products || Mayan-Herbal")

@section('breadtitle', "Company Accounts")

@section('breadli')
<li class="breadcrumb-item active">Add Products</li>
@endsection

@section('content')
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Products</h4>
                        <div class="row">
                            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="/add-products" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <div class="form-group">
                                                    <label for="inputText3" class="col-form-label">Product Name</label>
                                                    <input id="inputText3" type="text" name="name" value="{{old("name") }}" class="form-control">
                                                    <p class="error">{{ $errors->first("name") }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputText3" class="col-form-label">Product Description</label>
                                                    <input id="inputText3" type="text" name="description" value="{{old("description") }}" class="form-control">
                                                    <p class="error">{{ $errors->first("description") }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputText3" class="col-form-label">Products Price</label>
                                                    <input id="inputText3" type="number" name="price" value="{{old("price") }}" class="form-control">
                                                    <p class="error">{{ $errors->first("price") }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputText3" class="col-form-label">Available Quantity</label>
                                                    <input id="inputText3" type="number" name="quantity" value="{{old("quantity") }}" class="form-control">
                                                    <p class="error">{{ $errors->first("quantity") }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputText3" class="col-form-label">Category Title</label> 
                                                    <select name="category_id" class="form-control">
                                                        <option readonly="readonly" disabled>Select a Category</option>
                                                        @foreach ($getcat as $item)
                                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                                        @endforeach
                                                     </select>
                                                    <p class="error">{{ $errors->first("category_id") }}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputText3" class="col-form-label">Images</label>
                                                    <br> Note: <em>A product Must have a miinimum of three Images</em><br>
                                                    <input id="inputText3" type="file" name="image_name[]" value="{{old("image_name") }}" class="form-control" multiple>
                                                    <p class="error">{{ $errors->first("image_name") }}</p>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary">Add Product</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
