<?php
/* aiefin user mangement */

// UserCake authentication
include('models/db-settings.php');
include('models/config.php');

if (!securePage($_SERVER['PHP_SELF'])){die();}

$user_id = requiredPostVar('user_id');
$enabled = requiredPostVar('enabled');

// Disable the specified user, but leave their information intact in case the account is re-enabled.
$db = pdoConnect();

// Set enabled status to '0' or '1'
$sqlVars = array();
$stmt = $db->prepare("UPDATE uc_users SET enabled = :enabled WHERE id = :user_id LIMIT 1");
$sqlVars[':user_id'] = $user_id;
if ($enabled == 'true')
	$sqlVars[':enabled'] = '1';
else
	$sqlVars[':enabled'] = '0';

if (!$stmt->execute($sqlVars)){
	error_log(var_dump($db->errorInfo()));
	echo var_dump($db->errorInfo());
	die();
}
$stmt = null;

return true;
