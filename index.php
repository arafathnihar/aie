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

    <title>Welcome to AIEFIN!</title>

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
        <h1>Welcome to AIEFIN!</h1>
        <p class="lead">A secure, modern user management system based on UserCake, jQuery, and Bootstrap.</p>
		<div class="row">
			<div class="col-sm-12">
			  <a href="login.php" class="btn btn-success" role="button" value='Login'>Login</a>
			</div>
        </div>
        <div class="jumbotron-links">
        </div>
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
            $(".navbar .navitem-home").addClass('active');
        });
        // Load jumbotron links
        $(".jumbotron-links").load("jumbotron_links.php");     
	});
</script>
