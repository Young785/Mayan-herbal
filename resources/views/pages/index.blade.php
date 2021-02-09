    @extends('layouts.web')

{{-- {{ dd(Auth::user()->user_type) }} --}}
@section('title', "Dashboard || Mayan-Herbal")

@section('breadtitle', "Dashboard")

@section('breadli')
<li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
@if(Auth::user()->level < 1)
     <div class="alert alert-success">You Sponsor 2New Distributors within in 5Day's and earn #6,000 each,6000x2=#12,000)<br>

When sponsor 4New Distributors with 15Days,you earn #6,000 each,#6,000x4=#28,000<br>


Core value is the currency use in calculate  products in Mayan herbal, 2Core Value is (60,000)<br>

In level 1,you purchase product worth #60,000,and you sponsor 2 New Distributor that purchase product worth #60,000 2cv each,
#60,000x2=#120,000,<br>

Mayan pay commission and bonus on 15th of every new month.</div>
@elseif(Auth::user()->level == 1)
<div class="alert alert-success"> Upgrade to Level 2 with ₦2,500 to earn ₦10,000. Check wallet balance to see if you have enough to upgrade!</div>
@elseif(Auth::user()->level == 2)
<div class="alert alert-success"> Upgrade to Level 3 with ₦5,000 to earn ₦40,000. Check wallet balance to see if you have enough to upgrade!</div>
@elseif(Auth::user()->level == 3)
<div class="alert alert-success"> Upgrade to Level 4 with ₦16,000 to earn ₦256,000. Check wallet balance to see if you have enough to upgrade!</div>
@elseif(Auth::user()->level == 4)
<div class="alert alert-success"> Upgrade to Level 5 with ₦56,000 to earn ₦1,792,000. Check wallet balance to see if you have enough to upgrade!</div>
@elseif(Auth::user()->level == 5)
<div class="alert alert-success"> Upgrade to Level 6 with ₦350,000 to earn ₦22,400,000. Check wallet balance to see if you have enough to upgrade!</div>
@endif



                         <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
                          aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="myModalLabel2"><i class="la la-road2"></i> Upgrade to next Level (₦{{number_format($pay_amount ?? '')}})</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form id="registerForm" method="post" >
                                <div class="modal-body">



                                  <h5><i class="icon-arrow-right"></i> <b  class="text-danger">Select Prefered Upgrade method!!</b></h5>
                                  <div class="input-group">
                                                        <ul class="list-group col-sm-12">
                                                            <li class="list-group-item p-3" >
                                                                <input type="radio"  class="check " id="flat-radio-1" name="payment_method" checked data-radio="iradio_flat-red" value="wallet" >
                                                                <label for="flat-radio-1">Upgrade with Wallet Balance - <em><b>₦{{number_format($pay_amount ?? '')}}</b></em></label>
                                                            </li>
                                                            <li class="list-group-item p-3">
                                                                <input type="radio" class="check " id="flat-radio-2" name="payment_method" data-radio="iradio_flat-red" value="paystack">
                                                                <label for="flat-radio-2">Upgrade with Credit Card  </label>
                                                                <img src="/assets/images/paystack-ii.png" alt="PAYSTACK" class="img-fluid">
                                                            </li>

                                                        </ul>
                                                    </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-outline-info waves-effect waves-light">Make Payment</button>

                                </div>
                             </form>
                              </div>
                            </div>
                        </div>
            @if (Session()->has("saved"))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
              Product saved to your Account Successfully!
            </div>
            @endif

            <div class="row">
                    <div class="col-md-6">
                        <div class="card border-success">
                            <div class="card-header bg-light">
                                <h3 class="m-b-0 text-dark">User Summary</h3></div>
                            <div class="card-body">
                              
                            <script src="https://js.paystack.co/v1/inline.js"></script>
                                @if(Auth::user()->level < 1)
                                <a onclick="payWithPaystack()" id="buttonText" href="javascript:void(0)" class="btn btn-outline-info" ></i> Activate Your Account</a>
                                @else
                                    @if(Auth::user()->level < 6)
                                    <a href="javascript:void(0)" id="buttonText" data-toggle="modal" data-target="#modal" class="btn btn-outline-success">Upgrade to next level</a>
                                    <!-- <a href="javascript:void(0)" class="btn btn-info mt-2 ml-2">Edit Profile</a> -->
                                    @else
                                    <div class="alert alert-success"> You did it! </div>
                                    @endif
                                @endif

                                <!-- <a href="javascript:void(0)" class="btn btn-outline-info" data-toggle="modal"
                          data-target="#iconModal">How to?</a> -->
                                <table class="table mt-3">

                                    <tbody>
                                        <tr >
                                            <td>Level:</td>
                                            <td class="{{Auth::user()->level == 0 ? 'text-danger' : ''}}">{{Auth::user()->level == 0 ? "Not activated" : Auth::user()->level}}</td>
                                        </tr>

                                        <tr >
                                            <td>Total Benefits:</td>
                                            <td class="text-success">₦{{number_format($transIn)}}</td>
                                        </tr>

                                        <tr >
                                            <td>Total Withdrawal:</td>
                                            <td class="text-danger">₦{{number_format($transOut)}}</td>
                                        </tr>
                                        <tr >
                                            <td>Joined:</td>
                                            <td class="text-dark">{{date_format(date_create(Auth::user()->created_at),"d-M-Y")}}</td>
                                        </tr>
                                        @if(Auth::user()->level > 0)
                                        <tr >
                                            <td>Referral Link:</td>
                                            <td><a class="text-info" href="http://mayanherbal.com.ng/pages/register?ref={{Auth::user()->ref_id}}">http://e-earners.com/register?ref={{Auth::user()->ref_id}}</a></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-success">
                            <div class="card-header bg-light">
                                <h3 class="m-b-0 text-dark">Sponsor Details</h3></div>
                            <div class="card-body">

                                <table class="table mt-3">

                                    <tbody>
                                        <tr >
                                            <td>Name:</td>
                                            <td>{{ !$upline ? "Nil": $upline->name }}</td>
                                        </tr>
                                        <tr >
                                            <td>Username:</td>
                                            <td>{{ !$upline ? "Nil": $upline->username }}</td>
                                        </tr>
                                        <tr >
                                            <td>Email:</td>
                                            <td>{{ !$upline ? "Nil": $upline->email }}</td>
                                        </tr>
                                        <tr >
                                        <td>Phone:</td>
                                            <td>{{ !$upline ? "Nil": $upline->phone }}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                    <div class="card border-success mt-2">
                            <div class="card-header bg-info">
                                <h3 class="m-b-0 text-white">How it works</h3></div>
                            <div class="card-body">

                            <h5> <b>HERE IS A STRATEGY THAT WILL ENABLE YOU TO REACH YOUR GOALS</b></h5>
                            <div class="table-responsive">
                  <table class="table table-striped">

                    <tbody>
                      @foreach($contents as $content)
                          <tr>
                              <td scope="row">LEVEL {{$content->level}}: (Activation). Pay ₦{{$content->amount}}</td>
                        </tr>
                        <tr>
                      <td scope="row">{{$content->description }}</td>

                    </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                            </div>
                        </div>

                    </div>
                </div>




                <!-- modal -->
                <div id="daModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Upgrade to level 2</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <form method="post" action="/activate-user">
                                            <div class="modal-body">
                                                <div class="alert alert-danger">
                                                    <p>N2000 will be used to upgrade to level 2</p>

                                                </div>
                                                @csrf

                                                 <input type="radio" name="upgrade" value="balance" checked>Use Balance
                                                    <br>
                                                <input type="radio" name="upgrade" value="paystack"> Use Paystack

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger waves-effect waves-light">Activate User</button>

                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_live_5f05fdbacfe00f27eb064c56c351f834db84344e',
      email: '{{Auth::user()->email}}',
      amount: {{$pay_amount * 100}},
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "{{Auth::user()->phone}}"
            },
            {
                display_name: "Username",
                variable_name: "username",
                value: "{{Auth::user()->username}}"
            }
         ]
      },
      callback: function(response){
        //   alert('success. transaction ref is ' + response.reference);

         document.getElementById("buttonText").innerHTML = '<h3>Processing... <i class="fa fa-spinner fa-spin fa-1x fa-fw" aria-hidden="true"></i></h3>';

          $.ajax({
                url: '/verify/'+ response.reference ,
                method: 'GET'
            }).done(function(data) {

                    location.reload();

            }).fail(function(err) {

                swal("Opps!", err.message, "error");

            })

      },
      onClose: function(){
        //   alert('window closed');

      }
    });
    handler.openIframe();
  }
</script>
@endsection
