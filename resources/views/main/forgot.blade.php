<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Mayan Herbal - Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->

  </head>
  <body>
    <div class="global-container">
    	<div class="card login-form">
    	<div class="card-body">
        <h2 class="text-center">Spree</h2>
    		<h3 class="card-title text-center">Forgot your password? <br>We can help.
          </h3>
          <p>Enter the email address for your Spree account. We'll send a verification code for you to enter before signing in.</p>
    		<div class="card-text">
        @if (session()->has("wrongInfo"))
          <div class="alert alert-danger alert-dismissible text-center" id="remove">
            <a data-dismiss="alert" href="#" class="close" aria-label="close">&times;</a>
            <strong>Error!</strong> Wrong Email Provided!
          </div>
        @endif
    			<!--
    			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
          <form action="/main/forgot-password/" method="GET">
            @csrf
    				<!-- to error: add class "has-danger" -->
    				<div class="form-group">
    					<!-- <label for="exampleInputEmail1">Email address</label> -->
    					<input type="email" name="email" placeholder="Email address" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp">
    				</div>

    				<button type="submit" class="btn btn-primary btn-block" >Submit</button>

    				<div class="sign-up">
    					Remember your password?
                <a href="login.html">Sign in</a>

    				</div>
    			</form>
    		</div>
    	</div>
    </div>
    </div>

  </body>
</html>
