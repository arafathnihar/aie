<?php
/* aiefin user mangement */

include('models/db-settings.php');
include('models/config.php');

if (!securePage($_SERVER['PHP_SELF'])){die();}

//Links for permission level 2 (default admin)
if ($can_register == "true"){
	echo "
		<li class='navitem-home'><a href='index.php'>Home</a></li>
        <li class='navitem-login'><a href='login.php'>Login</a></li>
        <li class='navitem-register'><a href='register.php'>Register</a></li>";
} else {
	echo "
		<li class='navitem-home'><a href='index.php'>Home</a></li>
        <li class='navitem-login'><a href='login.php'>Login</a></li>";
}

?>
