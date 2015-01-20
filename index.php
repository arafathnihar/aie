<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}

//Forward the user to their default page if he/she is already logged in
if(isUserLoggedIn()) {
	header("Location: account.php");
	exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to AIEFIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>AIEFIN</h1>
                        <hr class="small">
                        <span class="subheading">A Finance System for AIESEC in Sri Lanka</span><br>
                        <!--<button type="button" class="btn btn-default" href="login.php">Log In</button>-->
                        <a href="login.php" class="btn btn-success" role="button" value='Login'>Login</a>
                    </div>

                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                    <a href="http://en.wikipedia.org/wiki/AIESEC" target="_blank">
                        <h2 class="post-title">
                            What is AIESEC?
                        </h2>
                        <h4 class="post-subtitle">
                            AIESEC is an international non-governmental not-for-profit organization that provides young people with leadership development and cross-cultural global internship and volunteer exchange experiences across the globe, with a focus to empower young people so they can make a positive impact on society. The AIESEC network includes over 100,000 members in 125 countries and territories. It is the largest youth-run organization in the world
                        </h4>
                    </a>
                    <p class="post-meta" align="right">-Wikipedia</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="#">
                        <h2 class="post-title">
                            What is AIEFIN?
                        </h2>
                        <h4 class="post-subtitle">
                            AIEFIN is a Finance system created for AIESEC in Sri Lanka, the local devision of AIEFIN. AIEFIN provides a complete online based solution for AIESEC Sri Lanka's needs
                        </h4>
                    </a>
                    
                
                <hr>
                <!-- Pager -->
                
            </div>
        </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="https://twitter.com/AIESECSriLanka" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/AIESECSriLanka" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                       
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; University of Colombo, School of Computing 2014/2015</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

</body>

</html>


<script>
	$(document).ready(function() {
		alertWidget('display-alerts');
        // Load navigation bar
        $(".navbar").load("header-loggedout.php", function() {
            $(".navbar .navitem-home").addClass('active');
        });
        // Load jumbotron links
        $(".jumbotron-links").load("jumbotron_links.php");     
	});
</script>
