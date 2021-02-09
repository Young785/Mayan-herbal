<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
    <title>Mayan Herbal - Register with Us</title>
  </head>
  <body>
    <div class="global-container">
    	<div class="card login-form">
    	<div class="card-body">
        <h2 class="text-center">Spree</h2>
    		<h3 class="card-title text-center">Create your Spree account</h3>
    		<div class="card-text">
         {{-- {{$hash = md5( rand(0,1000) )}} --}}
          <!--
    			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
          <form action="/main/register" method="POST">
            @csrf
    				<!-- to error: add class "has-danger" -->
            <div class="form-group">
    					<!-- <label for="exampleInputEmail1">Email address</label> -->
              <input type="text" placeholder="Username" name="username" class="form-control form-control-sm" id="" value="{{ old("username") }}">
              <p class="error">{{ $errors->first("username") }}</p>
    				</div>
            <div class="form-group">
    					<!-- <label for="exampleInputEmail1">Email address</label> -->
              <input type="text" placeholder="Fullname" name="fullname" class="form-control form-control-sm" id="" value="{{ old("fullname") }}">
              <p class="error">{{ $errors->first("fullname") }}</p>
    				</div>
          	<div class="form-group">
    					<!-- <label for="exampleInputEmail1">Email address</label> -->
              <input type="email" placeholder="Email address" name="email" class="form-control form-control-sm" id="" value="{{ old("email") }}">
              <p class="error">{{ $errors->first("email") }}</p>
    				</div>
    				<div class="form-group">
    					<!-- <label for="exampleInputPassword1">Password</label> -->
    					<!-- -->
              <input type="password" placeholder="Create a password" name="password" class="form-control form-control-sm" id="">
              <p class="error">{{ $errors->first("password") }}</p>
              <!-- <a href="#" style="float:right;font-size:12px;">Forgot password?</a> -->
            </div>
            <div class="form-group">
    					<!-- <label for="exampleInputPassword1">Password</label> -->
    					<!-- -->
              <input type="password" placeholder="Confirm password" name="confPass" class="form-control form-control-sm" id="">
              <p class="error">{{ $errors->first("confPass") }}</p>
              <!-- <a href="#" style="float:right;font-size:12px;">Forgot password?</a> -->
            </div>
            <div class="form-group">
    					<!-- <label for="exampleInputEmail1">Email address</label> -->
              <input type="number" placeholder="Phone" name="phone" class="form-control form-control-sm" id="" value="{{ old("phone") }}">
              <p class="error">{{ $errors->first("phone") }}</p>
            </div>
            <div class="form-group">
    					<!-- <label for="exampleInputEmail1">Email address</label> -->
              <input type="text" placeholder="Address" name="address" class="form-control form-control-sm" id="" value="{{ old("address") }}">
              <p class="error">{{ $errors->first("address") }}</p>
    				</div>
            <div class="" style="margin-top: 52px;">
              <input type="checkbox" name="vendor" style="margin-right: 8px;">Optional: Will like to become vendor/seller? check the checkbox to be a vendor!<br>
            </div>
            <div class="" style="margin-top: 20px;">
              <input type="checkbox" name="emailme" style="margin-right: 8px;">Email me about Rollbacks, special pricing, hot new items, gift ideas and more.
            </div>
            <div class="" style="margin-top: 20px;">
              <input type="checkbox" required style="margin-right: 8px;">
                By clicking Create Account, you acknowledge you have read and agreed to our
              <a href="#">Terms of Use</a>  and  <a href="#">Privacy Policy</a>.

              </div>

    				<button type="submit" class="btn btn-primary btn-block" >Create account</button>

    				<div class="sign-up">
    					Already have an account?
              <button type="submit" class="btn btn-create btn-block">
                <a href="/login">Sign in</a>
              </button>
    				</div>
    			</form>
    		</div>
    	</div>
    </div>
    </div>
  </body>
</html>
