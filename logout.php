<?php
/**
 * Author: Anne Barrat
 * Assignment: PHP Web App for Perl, Python and PHP Class
 * Created by PhpStorm.
 * Date: 10/21/2016
 * Time: 9:53 AM
 * This file controls the logout option on the top nav bar on home.php-- which is restricted to logged in users ONLY.
 */

session_start();
require_once 'class.user.php';
$user = new USER();

if(!$user->is_logged_in()) //if user is not logged in redirect to sign in /index page
{
    $user->redirect('index.php');
}

if($user->is_logged_in()!="") //if the user is logged in and selects log out, they are redirected to the index page
{
    $user->logout();
    $user->redirect('index.php');
}
?>