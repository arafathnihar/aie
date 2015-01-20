<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

// Automatically forward to appropriate start page based on permissions level
// Admin users
if ($loggedInUser->checkPermission(array(2))){
	header( "Location: dashboard_admin.php" ) ;
	exit;
} 
// Other users
else {
	header( "Location: dashboard.php" ) ;
	exit;
}

?>
