<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"> -->
    <title>Mayan Herbal - Reset Password Page</title>
  </head>
  <body>
    <div class="global-container">
    	<div class="card login-form">
    	<div class="card-body">
        <h2 class="text-center">Spree</h2>
    		<h3 class="card-title text-center">Reset your Password</h3>
    		<div class="card-text">
    			<!--
    			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
          <form action="/main/forgot-password/reset-password/email={{ request("email") }}" method="POST">
            @csrf
    			
    		<div class="form-group">
                    <!-- <label for="exampleInputPassword1">Password</label> -->
                    <!-- -->
                <input type="password" placeholder="Password"  name="password" class="form-control form-control-sm" required id="password">
                <p class="error">{{ $errors->first("password") }}</p>
              </div>
              	<!-- to error: add class "has-danger" -->
    		<div class="form-group">
    		    <!-- <label for="exampleInputpassword1">password address</label> -->
                <input type="password" placeholder="Confirm Password" name="confPass" class="form-control form-control-sm" name="confPass" required id="confirm_password" aria-describedby="passwordHelp">
                <p class="error">{{ $errors->first("confPass") }}</p>
    		</div>
    				<button type="submit" class="btn btn-primary btn-block" >Update Password</button>
    			</form>
    		</div>
    	</div>
    </div>
    </div>
    <script src="/assets/my.js"></script>
    <script>
        var password = document.getElementById("password")
, confirm_password = document.getElementById("confirm_password");

function validatePassword(){
if(password.value != confirm_password.value) {
confirm_password.setCustomValidity("Passwords Don't Match");
} else {
confirm_password.setCustomValidity('');
}
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
      </script>s
  </body>
</html>
