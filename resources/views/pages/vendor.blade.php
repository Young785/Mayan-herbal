@extends('layouts.admin-web')

@section('title', "App accounts || Mayan-Herbal")

@section('breadtitle', "Company Accounts")

@section('breadli')
<li class="breadcrumb-item active">app_accounts</li>
@endsection

@section('content')
                        @if (Session()->has("msg"))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                The user was deleted Successfully!
                            </div>
                        @endif
                        @if (Session()->has("vendor"))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                You have Successfully make the user a Vendor!
                            </div>
                        @endif
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Users</h4>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Ref Id</th>
                                                <th>Ref By</th>
                                                <th>Phone Number</th>
                                                <th>Address</th>
                                                <th>Level</th>
                                                <th>Amount</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                                while($i <= 0){
                                                    $i++;
                                                }
                                            @endphp 
                                        @foreach ($vendor as $user)

                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->ref_id}}</td>
                                                    @if ($user->ref_by == null)
                                                        <td>Null</td>
                                                        @else
                                                    <td>{{$user->ref_by}}</td>
                                                    @endif
                                                <td>{{$user->phone}}</td>
                                                    @if ($user->address == null)
                                                        <td>Null</td>
                                                        @else
                                                        <td>{{$user->address}}</td>
                                                    @endif
                                                <td>{{$user->level}}</td>
                                                @if ($user->amount == null)
                                                <td>Null</td>
                                                @else
                                                <td>{{$user->amount}}</td>
                                            @endif
                                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                                <td>
                                                    @if ($user->vendor_request =="Yes")
                                                        <a  data-toggle="modal" data-target="#user{{$user->id}}" class="btn btn-outline-success text-success btn-sm">Make User</a>
                                                        <p></p>
                                                        <a  data-toggle="modal" data-target="#delete{{$user->id}}" class="btn btn-outline-danger text-danger btn-sm">Delete User</a>
                                                        @else
                                                        <a  data-toggle="modal" data-target="#delete{{$user->id}}" class="btn btn-outline-danger text-danger btn-sm">Delete User</a>

                                                    @endif
                                                   
                                               
                                                </td>
                                            </tr>

                                            <!-- modal daModal-->
                                            <div id="delete{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Account</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <form method="get" action="/users/delete/{{$user->id}}">
                                                        <div class="modal-body">

                                                                    @csrf

                                                                <div class="alert alert-danger" role="alert">
                                                                    Are you sure you want to delete {{$user->account_no}}?
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
                                                    <div id="user{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit Account</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <form method="POST" action="/vendors/make-user/{{$user->id}}">
                                                                <div class="modal-body">
        
                                                                            @csrf
                                                                            @method('put')
        
                                                                        <div class="alert alert-success" role="alert">
                                                                            Are you sure you want to make this vendor a User?
                                                                        </div>
        
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success waves-effect waves-light">Make User</button>
        
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
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
