<?php
/* aiefin user mangement */

include('models/db-settings.php');
include('models/config.php');

// Load information for a user.  Recommend admin-only access.
if (!securePage($_SERVER['PHP_SELF'])){die();}

// Parameters: id
extract($_GET);

$results = array();

$db = pdoConnect();

$sqlVars = array();

$query = "select uc_users.id as user_id, user_name, display_name, email, title, sign_up_stamp, last_sign_in_stamp, active, enabled from uc_users where uc_users.id = :user_id";    
$sqlVars[':user_id'] = $id;

//echo $query;
$stmt = $db->prepare($query);
$stmt->execute($sqlVars);

if ($results = $stmt->fetch(PDO::FETCH_ASSOC)){
	echo json_encode($results);
} else {	
	$result = array();
	$result['errors'] = array('Invalid user id.');
	echo json_encode($result);
}

$stmt = null;



?>