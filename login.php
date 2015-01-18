<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Forward the user to their default page if he/she is already logged in
if(isUserLoggedIn()) {
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

    <title>Welcome to UserFrosting!</title>

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
        <h3 class="text-muted">UserFrosting</h3>
      </div>
      <div class="jumbotron">
        <h1>Welcome to UserFrosting!</h1>
        <p class="lead">A secure, modern user management system based on UserCake, jQuery, and Bootstrap.</p>
		<small>Please sign in here:</small>
		<form class='form-horizontal' role='form' name='login' action='process_login.php' method='post'>
		  <div class="row">
			<div id='display-alerts' class="col-lg-12">
  
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-offset-3 col-md-6">
			  <input type="text" class="form-control" id="inputUserName" placeholder="Username" name = 'username' value=''>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-offset-3 col-md-6">
			  <input type="password" class="form-control" id="inputPassword" placeholder="Password" name='password'>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-12">
			  <button type="submit" class="btn btn-success submit" value='Login'>Login</button>
			</div>
		  </div>
		  <div class="jumbotron-links">
		  </div>		  
		</form>
      </div>	
      <div class="footer">
        <p>&copy; Your Website, 2014</p>
      </div>

    </div> <!-- /container -->

	<script>
        $(document).ready(function() {          
			// Load navigation bar
			$(".navbar").load("header-loggedout.php", function() {
				$(".navbar .navitem-login").addClass('active');
			});
		  	// Load jumbotron links
			$(".jumbotron-links").load("jumbotron_links.php");
		
			alertWidget('display-alerts');
			  
		  	$("form[name='login']").submit(function(e){
			var form = $(this);
			var url = 'process_login.php';
			$.ajax({  
			  type: "POST",  
			  url: url,  
			  data: {
				username:	form.find('input[name="username"]').val(),
				password:	form.find('input[name="password"]').val(),
				ajaxMode:	"true"
			  },		  
			  success: function(result) {
				console.log(result);
				$('#display-alerts').html("");
				resultJSON = jQuery.parseJSON(result);
				var errors = resultJSON['errors'];
				if (errors.length > 0) { // Don't bother unless there are some results found
				  jQuery.each(errors, function(idx, record) {
					$('#display-alerts').append("<div class='alert alert-danger'>" + record + "</div>");
				  });
				} else {
				  window.location.replace("account.php");
				}
			  }
			});
			return false;
		  });
		  
		});
	</script>
  </body>
</html>