<?php
/* aiefin user mangement */

// UserCake authentication
include('models/db-settings.php');
include('models/config.php');

// Recommended access setting: admin only
if (!securePage($_SERVER['PHP_SELF'])){die();}

$user_id = requiredPostVar('user_id');

// Delete the user entirely.  This action cannot be undone!
$deletions = array($user_id);
if ($deletion_count = deleteUsers($deletions)) {
	$successes[] = lang("ACCOUNT_DELETIONS_SUCCESSFUL", array($deletion_count));
}
else {
	$errors[] = lang("SQL_ERROR");
}

// Allows for functioning in either ajax mode or graceful degradation to PHP/HTML only
if (isset($_POST['ajaxMode']) and $_POST['ajaxMode'] == "true" ){
  $result = array();
  $result['errors'] = $errors;
  $result['successes'] = $successes;
  echo json_encode($result);
} else {
  header('Location: users.php');
  exit;
}

?>
