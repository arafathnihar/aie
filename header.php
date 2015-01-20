<?php
/* aiefin user mangement */

include('models/db-settings.php');
include('models/config.php');

if (!securePage($_SERVER['PHP_SELF'])){die();}
?>

<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="account.php">AIEFIN Admin</a>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse">
<!-- Collect the nav links, forms, and other content for toggling -->

  <ul class="nav navbar-nav side-nav">
	
<?php
//Links for permission level 2 (default admin)
if ($loggedInUser->checkPermission(array(2))){
	echo "
    <li class='navitem-dashboard-admin'><a href='dashboard_admin.php'><i class='fa fa-dashboard'></i> Admin Dashboard</a></li>
	<li class='navitem-users'><a href='users.php'><i class='fa fa-users'></i> Users</a></li>";
}
?>
    <li class="navitem-dashboard"><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class='navitem-settings'><a href="account_settings.php"><i class="fa fa-gear"></i> Account Settings</a></li>

<?php
	//Links for permission level 2 (default admin)
	if ($loggedInUser->checkPermission(array(2))){
	echo "
	<li class='dropdown'>
    <a href='#' class='dropdown-toggle' data-toggle='dropdown'><i class='fa fa-wrench'></i> Site Settings <b class='caret'></b></a>
		<ul class='dropdown-menu'>
			<li class='navitem-site-settings'><a href='site_settings.php'><i class='fa fa-globe'></i> Site Configuration</a></li>
			<li class='navitem-site-pages'><a href='site_pages.php'><i class='fa fa-files-o'></i> Site Pages</a></li>
		</ul>
	</li>";
}
?>
	</ul>
  <ul class="nav navbar-nav navbar-right navbar-user">
    <li class="dropdown user-dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="user_logged_in_name"></a>
      <ul class="dropdown-menu">
        <li><a href="account_settings.php"><i class="fa fa-gear"></i> Account Settings</a></li>
        <li class="divider"></li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
      </ul>
    </li>
  </ul>
</div><!-- /.navbar-collapse -->
