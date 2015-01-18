<?php
/* aiefin user mangement */

include('models/db-settings.php');
include('models/config.php');

// Load all permissions settings.  Recommended access level: admin only.
if (!securePage($_SERVER['PHP_SELF'])){die();}

extract($_GET);

// Parameters: [limit]

$results = array();

$db = pdoConnect();

$sqlVars = array();

$query = "select * from uc_permissions order by name asc";    

//echo $query;
$stmt = $db->prepare($query);
$stmt->execute($sqlVars);

if (!isset($limit)){
    $limit = 9999999;
}
$i = 0;
while ($r = $stmt->fetch(PDO::FETCH_ASSOC) and $i < $limit) {
    $id = $r['id'];
    $results[$id] = $r;
    $i++;
}
$stmt = null;

echo json_encode($results);

?>