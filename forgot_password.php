<?php
/*

UserFrosting Version: 0.1
By Alex Weissman
Copyright (c) 2014

Based on the UserCake user management system, v2.0.2.
Copyright (c) 2009-2012

UserFrosting, like UserCake, is 100% free and open-source.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the 'Software'), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

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

    <title>UserFrosting - Reset Password</title>

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
        <h1>Reset Password</h1>
        <p class="lead">Please enter your username and the email address you used to sign up.  A link with instructions to reset your password will be emailed to you.</p> 
		<form class='form-horizontal' role='form' name='reset_password' action='user_reset_password.php' method='post'>
		  <div class="row">
			<div id='display-alerts' class="col-lg-12">
  
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-offset-3 col-md-6">
			  <input type="text" class="form-control" placeholder="Username" name = 'username' value=''>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-offset-3 col-md-6">
			  <input type="email" class="form-control" placeholder="Email" name='email'>
			</div>
		  </div>
		  <div class="form-group">
			<div class="col-md-12">
			  <button type="submit" class="btn btn-success submit" value='Reset'>Reset Password</button>
			</div>
		  </div>
		</form>
      </div>	
      <div class="footer">
        <p>&copy; Your Website, 2014</p>
      </div>

    </div> <!-- /container -->

	<script>
        $(document).ready(function() {          
			// Load the header
			$(".navbar").load("header-loggedout.php", function() {
				$(".navbar .navitem-login").addClass('active');
			});
		  	
			alertWidget('display-alerts');
			  
		  	$("form[name='reset_password']").submit(function(e){
			var form = $(this);
			var url = 'user_reset_password.php';
			$.ajax({  
			  type: "POST",  
			  url: url,  
			  data: {
				username:	form.find('input[name="username"]').val(),
				email:	form.find('input[name="email"]').val(),
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
				  window.location.replace("login.php");
				}
			  }
			});
			return false;
		  });
		  
		});
	</script>
  </body>
</html>
