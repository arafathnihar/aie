<?php
/* aiefin user mangement */

require_once("./models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UserFrosting Admin - Users</title>

    <link rel="icon" type="image/x-icon" href="css/favicon.ico" />
        
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/typeahead.css" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap-switch.min.css" type="text/css" />
        
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/userfrosting.js"></script>
    <script src="js/date.min.js"></script>
    <script src="js/handlebars-v1.2.0.js"></script> 

    <!-- Page Specific Plugins -->
    <script src="js/bootstrap-switch.min.js"></script>
	<script src="js/jquery.tablesorter.js"></script>
	<script src="js/tables.js"></script>    
    <script src="js/widget-users.js"></script>
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      </nav>

      <div id="page-wrapper">
	  	<div class="row">
          <div id='display-alerts' class="col-lg-12">

          </div>
        </div>
        <div class="row">
          <div id='widget-action-response' class="col-lg-12">

          </div>
        </div>
        <div class="row">
          <div id='widget-users' class="col-lg-12">          

          </div>
        </div><!-- /.row -->
        
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->
    
    <script>
        $(document).ready(function() {
          // Get id of the logged in user to determine how to render this page.
          var user = loadCurrentUser();
          var user_id = user['id'];
          var admin_flag = user['admin'];
          
          // Load the header
          $('.navbar').load('header.php', function() {
            $('#user_logged_in_name').html('<i class="fa fa-user"></i> ' + user['user_name'] + ' <b class="caret"></b>');
            $('.navitem-users').addClass('active');
          });
                              
          alertWidget('widget-action-response');
          
          usersWidget('widget-users', {
            title: 'Users',
            limit: 1000,
            sort: 'asc',
            columns: {
              user_info: 'User/Info',
              user_sign_in: 'Last Sign-in',
              user_since: 'User Since',
              action: 'Actions'
            }
          }); 
        });      
    </script>
  </body>
</html>
