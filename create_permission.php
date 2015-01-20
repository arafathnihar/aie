<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Forms posted
if(!empty($_POST))
{
	//Create new permission level
	if(!empty($_POST['new_permission'])) {
		$permission = trim($_POST['new_permission']);
		
		//Validate request
		if (permissionNameExists($permission)){
			$errors[] = lang("PERMISSION_NAME_IN_USE", array($permission));
		}
		elseif (minMaxRange(1, 50, $permission)){
			$errors[] = lang("PERMISSION_CHAR_LIMIT", array(1, 50));	
		}
		else{
			if (createPermission($permission)) {
			$successes[] = lang("PERMISSION_CREATION_SUCCESSFUL", array($permission));
		}
			else {
				$errors[] = lang("SQL_ERROR");
			}
		}
	} else {
		$errors[] = lang("PERMISSION_CHAR_LIMIT", array(1, 50));	
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
