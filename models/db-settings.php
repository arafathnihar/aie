<?php
/* aiefin user mangement */

//Database Information
$db_host = "localhost"; //Host address (most likely localhost)
$db_name = "aiefin"; //Name of Database
$db_user = "root"; //Name of database user
$db_pass = ""; //Password for database user
$db_table_prefix = "uc_";

function pdoConnect(){
	global $db_host, $db_name, $db_user, $db_pass;
	try {  
	  $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
	  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	  return $db;
	} catch(PDOException $e) {  
		return $e->getMessage();  
	}  
}

GLOBAL $errors;
GLOBAL $successes;

$errors = array();
$successes = array();

/* Create a new mysqli object with database connection parameters */
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
GLOBAL $mysqli;

if(mysqli_connect_errno()) {
	echo "Connection Failed: " . mysqli_connect_errno();
	exit();
}

//Direct to install directory, if it exists
if(is_dir("install/"))
{
	header("Location: install/");
	die();

}

include('preheader.php');
?>