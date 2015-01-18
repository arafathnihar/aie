<?php
/* aiefin user mangement */
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//var_dump($_POST);

//Forms posted
if(!empty($_POST))
{
	$newSettings = $_POST;
	$newWebsiteName = $newSettings['website_name'];
	$newWebsiteUrl = $newSettings['website_url'];
	$newEmail = $newSettings['email'];
	if (isset($newSettings['activation']) and $newSettings['activation'] == "on"){
	  $newSettings['activation'] = "true";
	} else {
	  $newSettings['activation'] = "false";
	}
	$newActivation = $newSettings['activation'];
	if (isset($newSettings['can_register']) and $newSettings['can_register'] == "on"){
	  $newSettings['can_register'] = "true";
	} else {
	  $newSettings['can_register'] = "false";
	}
	$newRegistration = $newSettings['can_register'];
	$newResend_activation_threshold = $newSettings['resend_activation_threshold'];
	$newLanguage = $newSettings['language'];
	$newTemplate = $newSettings['template'];
	
	//Validate new site name
	if ($newWebsiteName != $websiteName) {
		if(minMaxRange(1,150,$newWebsiteName))
		{
			$errors[] = lang("CONFIG_NAME_CHAR_LIMIT",array(1,150));
		}
		else if (count($errors) == 0) {
			$websiteName = $newWebsiteName;
		}
	}
	
	//Validate new URL
	if ($newWebsiteUrl != $websiteUrl) {
		if(minMaxRange(1,150,$newWebsiteUrl))
		{
			$errors[] = lang("CONFIG_URL_CHAR_LIMIT",array(1,150));
		}
		else if (substr($newWebsiteUrl, -1) != "/"){
			$errors[] = lang("CONFIG_INVALID_URL_END");
		}
		else if (count($errors) == 0) {
			$websiteUrl = $newWebsiteUrl;
		}
	}
	
	//Validate new site email address
	if ($newEmail != $emailAddress) {
		if(minMaxRange(1,150,$newEmail))
		{
			$errors[] = lang("CONFIG_EMAIL_CHAR_LIMIT",array(1,150));
		}
		elseif(!isValidEmail($newEmail))
		{
			$errors[] = lang("CONFIG_EMAIL_INVALID");
		}
		else if (count($errors) == 0) {
			$emailAddress = $newEmail;
		}
	}
	
	//Validate registration enable/disable selection
	if ($newRegistration != $can_register) {
		if($newRegistration != "true" AND $newRegistration != "false")
		{
			$errors[] = lang("CONFIG_REGISTRATION_TRUE_FALSE");
		}
		else if (count($errors) == 0) {
			$can_register = $newRegistration;
		}
	}

	//Validate email activation selection
	if ($newActivation != $emailActivation) {
		if($newActivation != "true" AND $newActivation != "false")
		{
			$errors[] = lang("CONFIG_ACTIVATION_TRUE_FALSE");
		}
		else if (count($errors) == 0) {
			$emailActivation = $newActivation;
		}
	}	
		
	//Validate new email activation resend threshold
	if ($newResend_activation_threshold != $resend_activation_threshold) {
		if($newResend_activation_threshold > 72 OR $newResend_activation_threshold < 0)
		{
			$errors[] = lang("CONFIG_ACTIVATION_RESEND_RANGE",array(0,72));
		}
		else if (count($errors) == 0) {
			$resend_activation_threshold = $newResend_activation_threshold;
		}
	}
	
	//Validate new language selection
	if ($newLanguage != $language) {
		if(minMaxRange(1,150,$newLanguage))
		{
			$errors[] = lang("CONFIG_LANGUAGE_CHAR_LIMIT",array(1,150));
		}
		elseif (!file_exists($newLanguage)) {
			$errors[] = lang("CONFIG_LANGUAGE_INVALID",array($newLanguage));				
		}
		else if (count($errors) == 0) {
			$language = $newLanguage;
		}
	}
	
	//Validate new template selection
	if ($newTemplate != $template) {
		if(minMaxRange(1,150,$newTemplate))
		{
			$errors[] = lang("CONFIG_TEMPLATE_CHAR_LIMIT",array(1,150));
		}
		elseif (!file_exists($newTemplate)) {
			$errors[] = lang("CONFIG_TEMPLATE_INVALID",array($newTemplate));				
		}
		else if (count($errors) == 0) {
			$template = $newTemplate;
		}
	}
	
	//Update configuration table with new settings
	if (count($errors) == 0) {
	  global $mysqli,$db_table_prefix;
	  $stmt = $mysqli->prepare("UPDATE ".$db_table_prefix."configuration
		  SET 
		  value = ?
		  WHERE
		  name = ?");
	  foreach ($newSettings as $name => $value){
		$stmt->bind_param("ss", $value, $name);
		$stmt->execute();
	  }
	  $stmt->close();	
	  $successes[] = lang("CONFIG_UPDATE_SUCCESSFUL");		
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
