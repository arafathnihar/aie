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

include('models/db-settings.php');
include('models/config.php');

if (!securePage($_SERVER['PHP_SELF'])){die();}

// Check permissions status
$user_id = null;
if(isUserLoggedIn()) {
	$user_id = $loggedInUser->user_id;
} else {
    exit();
}

extract($_POST);

// Fetch information for currently logged in user
// Parameters: none

$results = array();

$db = pdoConnect();

$sqlVars = array();

$query = "select id, user_name, display_name, email, title, sign_up_stamp from uc_users where id = :user_id";

// Required parameters
$sqlVars[':user_id'] = $user_id;

//echo $query;
$stmt = $db->prepare($query);
$stmt->execute($sqlVars);

$results = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;

// Also, set account type flag.  This flag should be used for rendering purposes only, never for authentication.
if ($loggedInUser->checkPermission(array(2))){
    $results['admin'] = "true";
} else {
    $results['admin'] = "false"; 
}

echo json_encode($results);
?>