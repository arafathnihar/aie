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

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UserFrosting - Dashboard</title>

    <link rel="icon" type="image/x-icon" href="css/favicon.ico" />
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    
    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.js"></script>   
    <script src="js/userfrosting.js"></script>    
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      </nav>

      <div id="page-wrapper">
       <!-- do All your html  here ARAFATH start-->
<?php
# include this file at the very top of your script
#require_once('preheader.php');

# the code for the class
#include ('ajaxCRUD.class.php');
 
# this one line of code is how you implement the class
$tblCustomer = new ajaxCRUD("Customer","tblCustomer", "pkCustomerID");

# don't show the primary key in the table
$tblCustomer->omitPrimaryKey();

# my db fields all have prefixes;
# display headers as reasonable titles
$tblCustomer->displayAs("fldFName", "First");
$tblCustomer->displayAs("fldLName", "Last");
$tblCustomer->displayAs("fldPaysBy", "Pays By");
$tblCustomer->displayAs("fldPhone", "Phone");
$tblCustomer->displayAs("fldZip", "Zip");

# define allowable fields for my dropdown fields
# (this can also be done for a pk/fk relationship)
$values = array("Cash", "Credit Card", "Paypal");
$tblCustomer->defineAllowableValues("fldPaysBy", $values);

# add the filter box (above the table)
$tblCustomer->addAjaxFilterBox("fldFName");

# add validation to certain fields (via jquery in validation.js)
#$tblCustomer->modifyFieldWithClass("fldPhone", "phone");
#$tblCustomer->modifyFieldWithClass("fldZip", "zip");

# actually show to the table
$tblCustomer->showTable();
?>

<!-- do All your html here ARAFATH end-->
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
			$('.navitem-dashboard').addClass('active');
          });
		});
	</script>
  </body>
</html>


