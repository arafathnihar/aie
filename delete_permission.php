<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Forms posted
if(!empty($_POST))
{
	//Delete permission levels
	if(!empty($_POST['permission_id'])){
		$permission_id = $_POST['permission_id'];
		if ($name = deletePermission($permission_id)){
		$successes[] = lang("PERMISSION_DELETION_SUCCESSFUL_NAME", array($name));
		}
	}
}

if (isset($_POST['ajaxMode']) and $_POST['ajaxMode'] == "true" ){
  $result = array();
  $result['errors'] = $errors;
  $result['successes'] = $successes;
  echo json_encode($result);
} else {
  header('Location: site_settings.php');
  exit;
}
?>
