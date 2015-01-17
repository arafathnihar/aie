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
