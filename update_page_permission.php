<?php
/*

UserFrosting Version: 0.1
By Alex Weissman
Copyright (c) 2014

Based on the UserCake user management system, v2.0.2.
Copyright (c) 2009-2012

UserFrosting, like UserCake, is 100% free and open-source.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the 'Software'), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:
The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

*/

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
