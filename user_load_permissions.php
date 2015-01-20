<?php
/* aiefin user mangement */

include('models/db-settings.php');
include('models/config.php');

if (!securePage($_SERVER['PHP_SELF'])){die();}

// Fetch id of logged in user
$user_id_logged_in = null;
if(isUserLoggedIn()) {
	$user_id_logged_in = $loggedInUser->user_id;
} else {
    echo "You must be logged in to perform this action.";
    exit();
}

$results = array();

$db = pdoConnect();

$sqlVars = array();

$query = "select uc_permissions.*, uc_user_permission_matches.user_id as user_id from uc_permissions, uc_user_permission_matches where uc_user_permission_matches.permission_id = uc_permissions.id and uc_user_permission_matches.user_id = :user_id";    
// Required
$sqlVars[':user_id'] = $user_id_logged_in;

$stmt = $db->prepare($query);
$stmt->execute($sqlVars);

while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $r['id'];
    $results[$id] = $r;
}
$stmt = null;

echo json_encode($results);

?>