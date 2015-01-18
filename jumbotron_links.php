<?php
/* aiefin user mangement */

include('models/db-settings.php');
include('models/config.php');

if (!securePage($_SERVER['PHP_SELF'])){die();}

//Links for permission level 2 (default admin)
if ($can_register == "true"){
	echo "
		  <div class='row'>
			  <div class='col-md-12'>
				<a href='register.php' class='btn btn-link' role='button' value='Register'>Not a member yet?  Register here.</a>
			  </div>
		  </div>
		  <div class='row'>
			  <div class='col-md-12'>
				<a href='forgot_password.php' class='btn btn-link' role='button' value='Forgot Password'>Forgot your password?</a>
			  </div>
		  </div>
		  <div class='row'>
			  <div class='col-md-12'>
				<a href='resend_activation.php' class='btn btn-link' role='button' value='Activate'>Resend activation email</a>
			  </div>
		  </div>";
} else {
	echo "
		  <div class='row'>
			  <div class='col-md-12'>
				<a href='forgot_password.php' class='btn btn-link' role='button' value='Forgot Password'>Forgot your password?</a>
			  </div>
		  </div>
		  <div class='row'>
			  <div class='col-md-12'>
				<a href='resend_activation.php' class='btn btn-link' role='button' value='Activate'>Resend activation email</a>
			  </div>
		  </div>";
}

?>
