<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

$pageId = $_POST['page_id'];
$permissionId = $_POST['permission_id'];
$checked = $_POST['checked'];


//Check if selected pages exist
if(!pageIdExists($pageId)){
	echo "Page does not exist!";
	die();	
}

$pageDetails = fetchPageDetails($pageId); //Fetch information specific to page

// Determine if we're changing the 'private' status, or a specific page permission
if ($permissionId == "private"){
	// Set as private if checked=1, otherwise set as 0
	updatePrivate($pageId, $checked);
} else {
	// Get the current page permissions
	$pagePermissions = fetchPagePermissions($pageId);
	
	// Add the page permission if checked=1 and the page doesn't already have that permission
	if ($checked == "1") {
		if (!isset($pagePermissions[$permissionId])){
			addPage($pageId, $permissionId);
		}
	} else {
		if (isset($pagePermissions[$permissionId])){
			removePage($pageId, $permissionId);
		}
	}
}
?>
