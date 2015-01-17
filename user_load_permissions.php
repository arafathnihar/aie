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

// Fetch id of logged in user
$user_id_logged_in = null;
if(isUserLoggedIn()) {
	$user_id_logged_in = $loggedInUser->user_id;
} else {
    echo "You must be logged in to perform this action.";
    exit();
}

$results = array();

$db = pdoConnect();

$sqlVars = array();

$query = "select uc_permissions.*, uc_user_permission_matches.user_id as user_id from uc_permissions, uc_user_permission_matches where uc_user_permission_matches.permission_id = uc_permissions.id and uc_user_permission_matches.user_id = :user_id";    
// Required
$sqlVars[':user_id'] = $user_id_logged_in;

$stmt = $db->prepare($query);
$stmt->execute($sqlVars);

while ($r = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $id = $r['id'];
    $results[$id] = $r;
}
$stmt = null;

echo json_encode($results);

?>