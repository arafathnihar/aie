<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

$result = array();
$languages = getLanguageFiles(); //Retrieve list of language files
$templates = getTemplateFiles(); //Retrieve list of template files

//Retrieve settings
$stmt = $mysqli->prepare("SELECT id, name, value FROM ".$db_table_prefix."configuration");	
$stmt->execute();
$stmt->bind_result($id, $name, $value);

while ($stmt->fetch()){
	$result[$name] = $value;
}
$stmt->close();

$result['language_options'] = $languages;
$result['template_options'] = $templates;


if (!file_exists($language)) {
	$language = "models/languages/en.php";
}

if(!isset($language)) $language = "models/languages/en.php";

echo json_encode($result, JSON_FORCE_OBJECT);

?>