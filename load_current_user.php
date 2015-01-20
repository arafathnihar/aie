<?php
/* aiefin user mangement */

include('models/db-settings.php');
include('models/config.php');

if (!securePage($_SERVER['PHP_SELF'])){die();}

// Check permissions status
$user_id = null;
if(isUserLoggedIn()) {
	$user_id = $loggedInUser->user_id;
} else {
    exit();
}

extract($_POST);

// Fetch information for currently logged in user
// Parameters: none

$results = array();

$db = pdoConnect();

$sqlVars = array();

$query = "select id, user_name, display_name, email, title, sign_up_stamp from uc_users where id = :user_id";

// Required parameters
$sqlVars[':user_id'] = $user_id;

//echo $query;
$stmt = $db->prepare($query);
$stmt->execute($sqlVars);

$results = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;

// Also, set account type flag.  This flag should be used for rendering purposes only, never for authentication.
if ($loggedInUser->checkPermission(array(2))){
    $results['admin'] = "true";
} else {
    $results['admin'] = "false"; 
}

echo json_encode($results);
?>