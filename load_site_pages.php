<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

$pages = getPageFiles(); //Retrieve list of pages in root usercake folder
$dbpages = fetchAllPages(); //Retrieve list of pages in pages table
$creations = array();
$deletions = array();
$originals = array();

//Check if any pages exist which are not in DB
foreach ($pages as $page){
	if(!isset($dbpages[$page])){
		$creations[] = $page;	
	}
}

//Enter new pages in DB if found
if (count($creations) > 0) {
	createPages($creations)	;
}

// Find pages in table which no longer exist
if (count($dbpages) > 0){
	//Check if DB contains pages that don't exist
	foreach ($dbpages as $page){
		if(!isset($pages[$page['page']])){
		  $deletions[] = $page['id'];	
		} else {
		  $originals[] = $page['id'];
		}
	}
}

//echo var_dump($creations);
//echo var_dump($originals);
//echo var_dump($deletions);

$allPages = fetchAllPages();
// Merge the newly created pages, plus the pages slated for deletion, load their permissions, and set a flag (C)reated, (U)pdated, (D)eleted
foreach ($allPages as $page){
  $id = $page['id'];
  $name = $page['page'];
  if (in_array($name, $creations)){
	$allPages[$name]['status'] = 'C';
  } else if (in_array($id, $deletions)){
    $allPages[$name]['status'] = 'D';
  } else {
    $allPages[$name]['status'] = 'U';
  }
  $pagePermissions = fetchPagePermissions($id);
  if ($pagePermissions)
	$allPages[$name]['permissions'] = $pagePermissions;
  else
	$allPages[$name]['permissions'] = array();
}

//Delete pages from DB
if (count($deletions) > 0) {
	deletePages($deletions);
}

echo json_encode($allPages);
?>
