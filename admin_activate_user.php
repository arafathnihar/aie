<?php
/* aiefin user mangement */

require_once("models/config.php");

// Recommended access level: admin only
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Check if selected user exists
if(!isset($_POST['id']) or !userIdExists($_POST['id'])){
	$errors[] = lang("ACCOUNT_INVALID_USER_ID");
} else {
    // Required: id
    $id = $_POST['id'];
    
    $userdetails = fetchUserDetails(NULL, NULL, $id); //Fetch user details
    $displayname = $userdetails['display_name'];
    
    //Activate account
    if(isset($_POST['activate']) && $_POST['activate'] == "activate"){
        if (setUserActive($userdetails['activation_token'])){
            $successes[] = lang("ACCOUNT_MANUALLY_ACTIVATED", array($displayname));
        }
        else {
            $errors[] = lang("SQL_ERROR");
        }
    }
}

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
