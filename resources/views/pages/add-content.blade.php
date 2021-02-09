@extends('layouts.admin-web')

@section('title', "Wallet|| Mayan-Herbal")

@section('breadtitle', "Wallet")

@section('breadli')
<li class="breadcrumb-item active">Add Content</li>
@endsection

@section('content')
<style>
.error{
    color:red;
}
</style>
<div class="card">
    @if (Session()->has("msg"))
        <div class="col-lg-12 col-md-12 col-sm-12" id="timeOut">
            <div class="col-lg-12 col-md-12 col-sm-12 btn alert alert-success">Content Added Successfully!</div>
        </div>
    @endif
    @if (Session()->has("mssg"))
        <div class="col-lg-12 col-md-12 col-sm-12" id="timeOut">
            <div class="col-lg-12 col-md-12 col-sm-12 btn alert alert-success">Content Deleted Successfully!</div>
        </div>
    @endif
    <div class="card-body">
        <h4 class="card-title">All Contents</h4>
        <a href="javascript:void(0)"  data-toggle="modal" data-target="#daModal" class="btn btn-outline-success float-right mb-2">Add Content</a>
        <div id="daModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Bank Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form method="post" action="/site-contents">
                    <div class="modal-body">
                                @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Content Level:</label>
                                <input type="text" class="form-control" name="level" placeholder="E.g: 1">
                                <p class="error">{{$errors->first("level")}}</p>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Content Amount:</label>
                                <input type="number" class="form-control" name="amount" placeholder="E.g: Level ₦2,000">
                                <p class="error">{{$errors->first("level")}}</p>
                            </div>
                              <div class="form-group">
                                <label for="recipient-name" class="control-label">Downlines Description:</label>
                                <input type="text" class="form-control" name="description" placeholder="Get 2 (downlines) x ₦2,500 = ₦3,000 – ₦2,500 (move to 2) = ₦500 profit">
                                <p class="error">{{$errors->first("level")}}</p>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>DB Id</th>
                        <th>Level Id</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->level}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->created_at->diffForHumans()}}</td>
                            <td>
                                <a  data-toggle="modal" data-target="#delete{{$item->id}}" class="btn btn-outline-danger text-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                            </td>
                            <!-- modal daModal-->
                            <div id="delete{{$item->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Account</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <form action="/site-contents/delete/{{$item->id}}" method="POST">
                                        <div class="modal-body">
                                            @csrf
                                            @METHOD("DELETE")
                                            <div class="alert alert-danger" role="alert">
                                                Are you sure you want to delete ?
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
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="create" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add New Account</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form method="post" action="/app-accounts">
                    <div class="modal-body">

                                @csrf
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Account Name:</label>
                                <input type="text" class="form-control" name="account_name" >
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Account Number</label>
                                <input type="text" class="form-control" name="account_no" id="recipient-name" >
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Bank Name</label>
                                <input type="text" class="form-control" name="bank_name" id="recipient-name" >
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>


@endsection
