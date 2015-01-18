<?php
/* aiefin user mangement */

// Create a user from the admin panel

require_once("./models/config.php");

// Recommended admin-only access
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Forms posted
if(!empty($_POST)) {
	$errors = array();
	$username = trim($_POST["user_name"]);
	$displayname = trim($_POST["display_name"]);
	$email = trim($_POST["email"]);
	$title = trim($_POST["user_title"]);
	$add_permissions = trim($_POST["add_permissions"]);
	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);

	if(minMaxRange(1,25,$username))
	{
		$errors[] = lang("ACCOUNT_USER_CHAR_LIMIT",array(1,25));
	}
	if(!ctype_alnum($username)){
		$errors[] = lang("ACCOUNT_USER_INVALID_CHARACTERS");
	}
	if(minMaxRange(1,50,$displayname))
	{
		$errors[] = lang("ACCOUNT_DISPLAY_CHAR_LIMIT",array(1,50));
	}
	if(minMaxRange(8,50,$password) && minMaxRange(8,50,$confirm_pass))
	{
		$errors[] = lang("ACCOUNT_PASS_CHAR_LIMIT",array(8,50));
	}
	else if($password != $confirm_pass)
	{
		$errors[] = lang("ACCOUNT_PASS_MISMATCH");
	}
	if(!isValidEmail($email))
	{
		$errors[] = lang("ACCOUNT_INVALID_EMAIL");
	}
	
	$new_user_id = "";
	
	//End data validation
	if(count($errors) == 0)
	{	
		//Construct a user object
		$user = new User($username, $displayname, $title, $password, $email);
		
		//Checking this flag tells us whether there were any errors such as possible data duplication occured
		if(!$user->status)
		{
			if($user->username_taken) $errors[] = lang("ACCOUNT_USERNAME_IN_USE",array($username));
			if($user->displayname_taken) $errors[] = lang("ACCOUNT_DISPLAYNAME_IN_USE",array($displayname));
			if($user->email_taken) 	  $errors[] = lang("ACCOUNT_EMAIL_IN_USE",array($email));		
		}
		else
		{
			//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
			$new_user_id = $user->userCakeAddUser();
			if($new_user_id == -1)
			{
				if($user->mail_failure) $errors[] = lang("MAIL_ERROR");
				if($user->sql_failure)  $errors[] = lang("SQL_ERROR");
			}
		}
	}
	// If everything went well, add the specified permissions for the user
	if(count($errors) == 0) {
		// Add initial permissions
		// Convert string of comma-separated permission_id's into array
		$add_permissions_arr = explode(',',$add_permissions);
		$add = array();
		foreach ($add_permissions_arr as $permission_id){
				$add[$permission_id] = $permission_id;
		}
		if ($addition_count = addPermission($add, $new_user_id)){
			$successes[] = lang("ACCOUNT_PERMISSION_ADDED", array ($addition_count));
		}
		else {
			$errors[] = lang("SQL_ERROR");
		}

		$successes[] = lang("ACCOUNT_CREATION_COMPLETE", array($username));
	}
	
	if (isset($_POST['ajaxMode']) and $_POST['ajaxMode'] == "true" ){
	  $result = array();
	  $result['errors'] = $errors;
	  $result['successes'] = $successes;
	  echo json_encode($result);
	} else {
	  header('Location: account.php');
	  exit;
	}
	
}

?>