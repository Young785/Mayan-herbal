<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->
    <title>Mayan Herbal - Login Page</title>
  </head>
  <body>
    <div class="global-container">
    	<div class="card login-form">
    	<div class="card-body">
        <h2 class="text-center">Spree</h2>
    		<h3 class="card-title text-center">Sign in to your Spree account</h3>
    		<div class="card-text">
          @if (session()->has("msgError"))
            <div class="alert alert-danger alert-dismissible text-center" id="remove">
              <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
              <strong>Error!</strong> User credential was not found!
            </div>
          @endif
          @if (session()->has("msgNopermit"))
          <div class="alert alert-danger alert-dismissible text-center" id="remove">
            <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
            <strong>No Permission!</strong> You have no access there!
          </div>
          @endif
          @if (session()->has("notExist"))
            <div class="alert alert-danger alert-dismissible text-center" id="remove">
              <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
              <strong>Error!</strong> These credentials do not match our records!
            </div>
          @endif
        @if (session()->has("changedPass"))
          <div class="alert alert-success alert-dismissible text-center" id="remove">
            <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
            <strong>Success!</strong> Your password was changed Successfully! You can now login with the new Password
          </div>
        @endif
         @if (session()->has("mustLogin"))
          <div class="alert alert-danger alert-dismissible text-center">
            <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
            <strong>Error! </strong> Please login to confirm your request! Dont't have an account? <a href="/main/register">Register</a>
          </div>
        @endif
          
    			<!--
    			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
          <form action="/main/login" method="POST">
            @csrf
    				<!-- to error: add class "has-danger" -->
    				<div class="form-group">
    					<!-- <label for="exampleInputEmail1">Email address</label> -->
              <input type="email" placeholder="Email address" class="form-control form-control-sm" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
              <p class="error">{{ $errors->first("email") }}</p>
    				</div>
    				<div class="form-group">
    					<!-- <label for="exampleInputPassword1">Password</label> -->
    					<!-- -->
              <input type="password" placeholder="password"  name="password" class="form-control form-control-sm" id="exampleInputPassword1">
              <p class="error">{{ $errors->first("password") }}</p>
              <a href="/main/forgot-password" style="float:right;font-size:12px;">Forgot password?</a>
          	</div>
            <div class="" style="margin-top: 52px;">
              <input type="checkbox" name="" value="" style="margin-right: 8px;">Keep me
              <a href="#">Signed in </a> <br> Uncheck if using a public device.
            </div>

    				<button type="submit" class="btn btn-primary btn-block" >Sign in</button>

    				<div class="sign-up">
    					Don't have an account?
                <a href="/main/register" class="btn btn-create btn-block">Create account</a>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
    </div>
    <script src="/assets/my.js"></script>
  </body>
</html>
