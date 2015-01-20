<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

// If registration is disabled, send them back to the home page with an error message
if ($can_register != "true"){
	addAlert("danger", "Registration has been disabled.");
	header("Location: login.php");
	exit();
}


//Prevent the user visiting the logged in page if he/she is already logged in
if(isUserLoggedIn()) {
	addAlert("danger", "You cannot register for an account while logged in.  Please log out first.");
	header("Location: account.php");
	exit();
}

//Forms posted
if(!empty($_POST))
{
	$new_user_id = "";
	$errors = array();
	$email = trim($_POST["email"]);
	$username = trim($_POST["username"]);
	$displayname = trim($_POST["displayname"]);
	$password = trim($_POST["password"]);
	$confirm_pass = trim($_POST["passwordc"]);
	$captcha = md5($_POST["captcha"]);
	
	
	if ($captcha != $_SESSION['captcha'])
	{
		$errors[] = lang("CAPTCHA_FAIL");
	}
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
	if(!isValidName($displayname)){
		$errors[] = lang("ACCOUNT_DISPLAY_INVALID_CHARACTERS");
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
	//End data validation
	if(count($errors) == 0)
	{	
		//Construct a user object
		$user = new User($username, $displayname, $new_user_title, $password, $email);
		
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
			//Attempt to add the user to the database, carry out finishing  tasks like emailing the user (if required)
			$new_user_id = $user->userCakeAddUser();
			if($new_user_id == -1)
			{
				if($user->mail_failure) $errors[] = lang("MAIL_ERROR");
				if($user->sql_failure)  $errors[] = lang("SQL_ERROR");
			}
		}
	}
	
	// If everything went well, add default permissions for the new user
	if(count($errors) == 0) {
		// Get default permissions
		$permissions = fetchAllPermissions();
		$add = array();
		foreach ($permissions as $permission){
			if ($permission['is_default'] == 1) {
				$permission_id = $permission['id'];
				$add[$permission_id] = $permission_id;
			}
		}
		if ($addition_count = addPermission($add, $new_user_id)){
			// Uncomment this if you want self-registered users to know about permission groups
			//$successes[] = lang("ACCOUNT_PERMISSION_ADDED", array ($addition_count));
		}
		else {
			$errors[] = lang("SQL_ERROR");
		}
	}

	if(count($errors) == 0) {
		$successes[] = $user->success;
	}	
}

// Send successfully registered users to the login page, while errors should return them to the registration page.
if (isset($_POST['ajaxMode']) and $_POST['ajaxMode'] == "true" ){
  $result = array();
  $result['errors'] = $errors;
  $result['successes'] = $successes;
  echo json_encode($result);
} else {
  foreach ($errors as $error){
	addAlert("danger", $error);
  }
  foreach ($successes as $success){
	addAlert("success", $success);
  }
  if(count($errors) == 0) {
	header('Location: login.php');
	exit();
  } else {
	header('Location: register.php');
	exit();	
  }
}

?>
