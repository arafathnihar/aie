<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

// If registration is disabled, send them back to the home page with an error message
if ($can_register != "true"){
	addAlert("danger", "I'm sorry, registration has been disabled.");
	header("Location: login.php");
	exit();
}

//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) {
	addAlert("danger", "I'm sorry, you cannot register for an account while logged in.  Please log out first.");
	header("Location: account.php");
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="css/favicon.ico">

    <title>AIEFIN - Register</title>

	<link rel="icon" type="image/x-icon" href="css/favicon.ico" />
	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-switch.min.css" type="text/css" />
	 
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/userfrosting.js"></script>
	<script src="js/date.min.js"></script>
    <script src="js/handlebars-v1.2.0.js"></script> 

  </head>

  <body>
    <div class="container">
      <div class="header">
        <ul class="nav nav-pills navbar pull-right">
        </ul>
        <h3 class="text-muted">AIEFIN</h3>
      </div>
      <div class="jumbotron">
        <h1>Let's get started!</h1>
        <p class="lead">Registration is fast and simple.</p>
		<form name='newUser' class='form-horizontal' role='form' action='user_create_user.php' method='post'>
		  <div class="row">
				<div id='display-alerts' class="col-lg-12">
		  
				</div>
		  </div>		
		  <div class="form-group">
			<label class="col-sm-4 control-label">User Name</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" placeholder="User Name" name = 'username' value=''>
			</div>
		  </div>
		  <div class="row form-group">
			<label class="col-sm-4 control-label">Display Name</label>
			<div class="col-sm-8">
			  <input type="text" class="form-control" placeholder="Display Name" name='displayname'>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-4 control-label">Email</label>
			<div class="col-sm-8">
			  <input type="email" class="form-control" placeholder="Email" name='email'>
			</div>
		  </div>		  
		  <div class="form-group">
			<label class="col-sm-4 control-label">Password</label>
			<div class="col-sm-8">
			  <input type="password" class="form-control" placeholder="Password" name='password'>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-4 control-label">Confirm Password</label>
			<div class="col-sm-8">
			  <input type="password" class="form-control" placeholder="Confirm Password" name='passwordc'>
			</div>
		  </div>
		  <div class="form-group">
			<label class="col-sm-4 control-label">Confirm Security Code</label>
			<div class="col-sm-4">
			  <input type="text" class="form-control" name='captcha'>
			</div>
			<div class="col-sm-4">
			  <img src='models/captcha.php'>
			</div>
		  </div>
		  <br>
		  <div class="form-group">
			<div class="col-sm-12">
			  <button type="submit" class="btn btn-success submit" value='Register'>Register</button>
			</div>
		  </div>
		</form>
	  </div>	
      <div class="footer">
        <p>&copy; Your Website, 2014</p>
      </div>

    </div> <!-- /container -->

  </body>
</html>

<script>
	$(document).ready(function() {
		alertWidget('display-alerts');
		// Load navigation bar
		$(".navbar").load("header-loggedout.php", function() {
            $(".navbar .navitem-register").addClass('active');
        });
	});
</script>
