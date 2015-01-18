<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

// Look up specified user
$selected_user_id = $_GET['id'];

if (!is_numeric($selected_user_id)){
	echo "Error: Please specify a numeric user id!";
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AIEFIN Admin - User Details</title>

	<link rel="icon" type="image/x-icon" href="css/favicon.ico" />
	
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-switch.min.css" type="text/css" />
	 
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/userfrosting.js"></script>
	<script src="js/date.min.js"></script>
    <script src="js/handlebars-v1.2.0.js"></script> 

    <!-- Page Specific Plugins -->
    <script src="js/bootstrap-switch.min.js"></script>
	<script src="js/widget-users.js"></script>
  </head>
<body>
  
<?php
echo "<script>selected_user_id = $selected_user_id;</script>";
?>
  
<!-- Begin page contents here -->
<div id="wrapper">

<!-- Sidebar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
</nav>

	<div id="page-wrapper">
		<div class="row">
		  <div id='widget-action-response' class="col-lg-12">
  
		  </div>
		</div>
		<div class="row">
			<div id='widget-user-info' class="col-lg-6">          

			</div>
		</div>
  </div><!-- /#page-wrapper -->

</div><!-- /#wrapper -->
    
    <script>
		$(document).ready(function() {
			// Get id of the logged in user
			var user = loadCurrentUser();

			// Load the header
			$('.navbar').load('header.php', function() {
				$('#user_logged_in_name').html('<i class="fa fa-user"></i> ' + user['user_name'] + ' <b class="caret"></b>');          
			});
													
			alertWidget('widget-action-response');

			userInfoBox('widget-user-info', {
			  user_id: selected_user_id,
				disabled: 'true',
				showDates: 'true',
				view: 'panel'
			});

    });

    </script>
  </body>
</html>

