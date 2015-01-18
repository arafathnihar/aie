<?php
/* aiefin user mangement */
include('models/db-settings.php');
include('models/config.php');

if (!securePage($_SERVER['PHP_SELF'])){die();}

extract($_GET);

// Load information for all users.  TODO: also load permissions

// Parameters: limit

$results = array();

$db = pdoConnect();

$sqlVars = array();

$query = "select uc_users.id as user_id, user_name, display_name, email, title, sign_up_stamp, last_sign_in_stamp, active, enabled from uc_users";    

//echo $query;
$stmt = $db->prepare($query);
$stmt->execute($sqlVars);

if (!isset($limit)){
    $limit = 9999999;
}
$i = 0;
while ($r = $stmt->fetch(PDO::FETCH_ASSOC) and $i < $limit) {
    $id = $r['user_id'];
    $results[$id] = $r;
    $i++;
}
$stmt = null;

echo json_encode($results);

?>