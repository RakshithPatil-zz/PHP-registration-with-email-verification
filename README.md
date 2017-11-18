# PHP-registration-with-email-verification

This web app was created as an assignment for a PHP, Python and Perl survey course. It is a site for a 
fictitious charity that offers an option for users to register as volunteers. 
The app relies on the [PHP Mailer Library](https://github.com/PHPMailer/PHPMailer) to send an email verification link to the registered email addresses. Once the link is clicked,
the email is marked as verified in the database and the user can sign in to access exclusive content. There is an option for lost password. 


Thanks to Pradeep Khodke for the [awesome tutorials at Coding Cage](http://www.codingcage.com/2015/08/how-to-send-e-mail-using-phpmailer-and.html).
Those tutorials were the starting point for this app. Also thank you [Tutorital Republic](http://www.tutorialrepublic.com/php-tutorial/php-mysql-create-database-and-table.php) for the tutorials in creating databases and tables with PHP.

##Requirements to run app in local test environment 
* PHP interpreter
* MySQL database
* PHP server
* [PHP Mailer, The classic email sending library for PHP](https://github.com/PHPMailer/PHPMailer). 
* Email address and a password to be accessed by the PHP Mailer library. 
  It may necessary to change the email settings with your provider to allow this 
  type of access. If the mail doesn't go through, check into your settings.
* In my local development I used [WAMP-- an abbreviated name for the software stack Windows, Apache, MySQL, PHP](http://www.wampserver.com/en/). 

  

##Setting up the database and server 
After setting up your WAMP ( or LAMP or whatever you are using) and the local database + PHP + MySQL environment you want: 
* create the database and table by running the *create_db.php* file. 
* Open the local host (on WAMP it might be localhost/cc/create_db.php)
  and see the echoed confirmation that database db_demo was created successfully.
* Create the tables by running the *create_tblUser.php*. Open localhost/cc/create_tblUser.php and see if you have the success message that the
  table is created. If not, troubleshoot. 
* Open db_config.php. This file handles the database connection. 
  Notice that the default settings for the WAMP server *username: root* and *password: ""* are entered, as well as the name 
  of the demo database and table. Changes to this will depend on your setup.
* Time to test the database and connections by attempting to register as a volunteer on the home page "Volunteer Sign In" panel . 
  You should get so far as the see the 'Success! 
  We've sent an email to your-email-address.com. Please click on the confirmation link in the email to create your account" message.
  However, in the debugging message you will see there is an email error. Read on...

##Settings within the files for the mailer and database

* Mail settings in the class.user.php on lines 132-135 need to be set with the address and passwords of the email account
  to be used with the app email verification system.
* The email address on line 132 and line 134 are the same.
* Possibly, on line 135 the $mail->AddReplyTo address needs to be different than the address on line 132 and 134. 
  They also need to be real working addresses or the mailer will not work. 

##Testing the app
At this point you should be able to test if the mailer works and your database is correctly taking down info, querying properly, etc. 
* Register a name and email address and see if the mail is sent to the address you entered. 
* See on http://localhost/phpmyadmin if the information is correct in the database. 

That is all you can do on the local host-- the local host cannot  receive the verification link in the sent email. 
If you want to see all the functionality of this app you must go live on the web so that the regstration
and verification links sent in the emails will work. Read below for that:

##If you want to test all functionality on a live server, set up the database with the host and then fix these links: 
* line 44 of forgot_pw.php needs to link back reset_pw.php on your live server.
* line 126 in signup.php needs to link back to verify.php on your live server.

**NOTICE:** The debug setting in class.user.php is set to 1, or true for development. A setting of 1 will give 
messages about any errors. If you use any part of this app online, be certain to set debug to 0 for security reasons. 

