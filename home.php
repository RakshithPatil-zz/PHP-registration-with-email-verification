<?php
/**
 * Author: Anne Barrat
 * Assignment: PHP Web App for Perl, Python and PHP Class
 * Created by PhpStorm.
 * Date: 10/21/2016
 * Time: 9:01 AM
  * FILE TITLE: HOME.PHP
 * This program is a website demo featuring a registration and email verification app. PHP mailer is used.
 * This home page is available only to registered, verified and signed in members. Exclusive content is viewed.
 */
session_start();
require_once 'class.user.php';
$user_home = new USER();

if(!$user_home->is_logged_in())
{
	$user_home->redirect('index.php');
}
$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<html class="no-js">
 <head>
     <title>Community Cupboard |  <?php echo $row['userEmail']; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS--> 
    <link href="css/styles.css" rel="stylesheet">
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>    
                <a class="navbar-brand" href="#">
                    <div style="width: 150px; height: 50px; color:#522627; background: ivory; text-align: center; 
                    padding: 15px 0px; margin-top: -17px">Home </div>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a tabindex="-1" href="logout.php" style="color: pink">Logout</a>
                    </li>                 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
    <p class= "personal_greeting">Welcome <?php echo $row['userName']; ?> <i class="caret"></i>
<h1> Community Cupboard <span id= "header_subtitle"> Serving Central County</span></h1>
        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                <img class="img-responsive img-rounded" src="css/girl.jpg" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4" id= "welcome_back">
                <h4>Welcome Back Volunteers!</h4>
                <p>Look below for the upcoming volunteer and donation opportunities. Click on the more info link to read more details about the opportunities. Click on the volunteer schedule link and put your name on the schedule for that event's needed jobs or donations.<br><br> <span style= "font-weight: bold; font-style: italic; margin-left: 16%">We can't do it without you!</span>  
            
        </div>
 
        <hr>

        <!-- Call to Action Well 
        <div class="row">
            <div class="col-lg-12">
                <div class="well text-center">
                    Sponsorship and volunteer opportunities are available. Call (888)555-5555.
                </div>
            </div>-->
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <!-- /.col-md-3 -->
        <div class="row">
            <div class="col-md-3">
                <h3>Food Packs</h3>
                <p>Thousands of children in our county receive free or reduced-price meals through the National School Lunch Program and the National School Breakfast Program. For many of these children, school meals <strong>may be the only meals they eat. </strong> What happens when they go home over the weekend?</p>
                <a class="btn btn-default" href="#">More Info</a>
                <a class="btn btn-default" href="#">Event Sign-Up</a>
            </div>
            <!-- /.col-md-3 -->
            <div class="col-md-3">
                <h3>Christmas Drive</h3>
                <p>Times are tough in some homes in our county, and there won't be gifts under the tree on Christmas morning. That's why			we work to help these children have a Merry Christmas in the midst of their difficult circumstances. We need your help to make this possible!</p>
                <a class="btn btn-default" href="#">More Info</a>
                <a class="btn btn-default" href="#">Event Sign-Up</a>
            </div>
            <!-- /.col-md-3 -->
            <div class="col-md-3">
                <h3>Upcoming Drives</h3>
                <p>November 1 : Christmas Drive <br>
                   December 10 : Wrapping Party! <br>
                   December 22 : Gift Deliveries (drivers needed)</p>
                <a class="btn btn-default" href="#">More Info</a>
                <a class="btn btn-default" href="#">Event Sign-Up</a>
            </div>
            <!-- /.col-md-3 -->
            <div class="col-md-3">
                <h3>Monthly Calendar</h3>
                <p>View our events. Register as a volunteer to access the sign up sheets and get on the schedule as a helper</p>
                <a class="btn btn-default" href="#">More Info</a>
                <a class="btn btn-default" href="#">Event Sign-Up</a>
            </div>
            
            <!-- /.col-md-3 -->
        </div>
        </div>
        
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Community Cupboard 2016</p>
                </div>
            </div>
        </footer>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
