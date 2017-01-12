<?php
/**
 * VIEW AT
 * Author: Anne Barrat
 * Assignment: PHP Web App for Perl, Python and PHP Class Fall 2016 UMass Lowell
 * Website
 * Date: 10/21/2016
 * FILE TITLE: INDEX.PHP
 * This program is a website demo for a fictitious charity 'Community Cupbord', featuring a volunteer registration with email verification app. PHP mailer is used.  TO INVOKE THE WORKING PORTION OF THIS APP PLEASE REGISTER AS A VOLUNTEER to test the registration, validation, verification, reset, signin and signout files. You will need a valid email address and may need to check the junk folder for a verification email from 'Community Cupboard.' Just follow the links and instructions provided. 
 * 
 *
 *
 */
session_start();
require_once 'class.user.php';
$user_login = new USER();

// include phpmailer class
require_once 'mailer/class.phpmailer.php';
// creates object
$mail = new PHPMailer(true);

//if the user is logged in already go straight to the home page
if($user_login->is_logged_in()!="")
{
    $user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
    $email = trim($_POST['txtemail']);
    $upass = trim($_POST['txtupass']);

    if($user_login->login($email,$upass))
    {
        $user_login->redirect('home.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Charity Organization" content="Demo of homepage with signup/sign in and email verification">

    <title>Community Cupboard</title>

    <!-- Bootstrap Core CSS -->
     <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
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
                        <a href="#">En español</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container" >
<h1> Community Cupboard <span id= "header_subtitle"> Serving Central County</span></h1>
        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                <img class="img-responsive img-rounded" src="css/girl.jpg" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
               

<div id="login">
<div class="container">
<!--form for sign in or sign up-->
    <div class="col-md-4">
    <form class="form-signin" method="post">
    <?php
    if(isset($_GET['inactive']))
    {
        ?>
        <div class='alert alert-danger'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Sorry!</strong> This Account is not Activated. <br> Go to your Inbox and Activate it.
        </div>
        <?php
    }
    ?>
        <?php
        if(isset($_GET['error']))
        {
            ?>
            <div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>&times;</button>
                <strong>Sorry, we can't find that account.<br> Try again.</strong>
            </div>
            <?php
        }
        ?>
        <h3 class="form-signin-heading">Volunteer Sign In.</h3><hr />
        <input type="email" class="input-block-level" placeholder="Email address" name="txtemail" />
        <input type="password" class="input-block-level" placeholder="Password" name="txtupass" />
     <br><br>
        <button class="btn btn-large btn-primary" type="submit" name="btn-login">Sign in</button>
        <a href="signup.php" button class="btn btn-large btn-primary" >Register As A Volunteer</button> </a>  
       <!-- <a href="signup.php" class="btn btn-large">Register As A Volunteer</a><hr />-->
     <br><br>
        <a href="forgot_pw.php" style= "font-weight: bold; color: green">Lost your Password ? </a>
     </form>
   </div>
 </div> <!-- /container -->
</div>  
</div>      

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
              <hr> 
                </div>
            </div>
         </div>
        <!-- /.row -->

        <!-- Content Row -->
        <!-- /.col-md-3 -->
        <div class="row">
            <div class="col-md-3">
                <h3>Food Packs</h3>
                <p>Thousands of children in our county receive free or reduced-price meals through the National School Lunch Program and the National School Breakfast Program. For many of these children, school meals <strong>may be the only meals they eat. </strong> What happens when they go home over the weekend?</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-3 -->
            <div class="col-md-3">
                <h3>Christmas Drive</h3>
                <p>Times are tough in some homes in our county, and there won't be gifts under the tree on Christmas morning. That's why			we work to help these children have a Merry Christmas in the midst of their difficult circumstances. We need your help to make this possible!</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-3 -->
            <div class="col-md-3">
                <h3>Upcoming Drives</h3>
                <p>November 1 : Christmas Drive <br>
                   December 10 : Wrapping Party! <br>
                   December 22 : Gift Deliveries (drivers needed)</p> <br>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-3 -->
            <div class="col-md-3">
                <h3>Monthly Calendar</h3>
                <p>View our events. Register as a volunteer to access the sign up sheets and get on the schedule as a helper</p>
                <a class="btn btn-default" href="#">More Info</a>
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
