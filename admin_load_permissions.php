<?php
/* aiefin user mangement */

include('models/db-settings.php');
include('models/config.php');

// Recommended access restriction: admin only
if (!securePage($_SERVER['PHP_SELF'])){die();}

// Parameters: user_id
if (isset($_GET['user_id']))
	$user_id = $_GET['user_id'];
else {
	echo "user_id must be specified!";	
	exit();
}

$results = array();

$db = pdoConnect();

$sqlVars = array();

$query = "select uc_permissions.*, uc_user_permission_matches.user_id as user_id from uc_permissions, uc_user_permission_matches where uc_user_permission_matches.permission_id = uc_permissions.id and uc_user_permission_matches.user_id = :user_id";    
// Required
$sqlVars[':user_id'] = $user_id;

$stmt = $db->prepare($query);
$stmt->execute($sqlVars);

while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $r['id'];
    $results[$id] = $r;
}
$stmt = null;

echo json_encode($results);

?>