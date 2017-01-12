##PHP Web App Demo with Member Registration Form and Email Verification

###This web app was created as an assignment for a PHP, Python and Perl survey course. It is a site for a fictitious
charity that offers an option for users to sign up to be volunteers. The app uses PHP Mailer to verify the web addresses entered into
the form. There is an option for lost password. Registered users view an exclusive content homepage. 
See the sight live on [Heroku](https://immense-ridge-24250.herokuapp.com/)

##author: Anne Barrat, with grateful thanks for the 
[awesome tutorials at Coding Cage by Pradeep Khodke](http://www.codingcage.com/2015/08/how-to-send-e-mail-using-phpmailer-and.html).

##To run this app you will need a PHP interpreter, MySQL database, and a server running PHP.
I will write about setting the app up to run locally with an Apache server for testing. 
You will also need an email address and a password to be accessed by the mailer. 
It may necessary to change the email settings with your provider to allow this 
type of access. If the mail doesn't go through, check into your settings.

##NOTICE: The debug setting in class.php is set to 1, or true for development. A setting of 1 will give you errors and messages. 
If you use this use any part of this app in production, be certain to set debug to 0 for security reasons. 

##Setting up the database and server
In my local development I used [WAMP-- an abbreviated name for the software stack Windows, Apache, MySQL, PHP](http://www.wampserver.com/en/).  

After setting up your WAMP, or LAMP or whatever and the local database + PHP + MySQL environment you want, 
create the database and table by running the *create_db.php* file. Open the local host (on WAMP it might be localhost/cc/create_db.php)
and see the echoed confirmation that database db_demo was created successfully.

Create the tables by running the *create_tblUser.php*. Open localhost/cc/create_tblUser.php and see if you have the success message that the
table is created. If not, troubleshoot. If the table is created, proceed to the next step.

Open db_config.php. This file handles the database connection. 
Notice that the default settings for the WAMP server *username: root* and *password: ""* are entered, as well as the name 
of the demo database and table. Changes to this will depend on your setup.

Time to test the database and connections by attempting to register as a volunteer on the home page "Volunteer Sign In" panel . 
You should get so far as the see the 'Success! 
We've sent an email to your-email-address.com. Please click on the confirmation link in the email to create your account" message.
However, in the debugging message you will see there is an email error. Read on...

##Settings within the files for the mailer and database

Mail settings in the class.user.php on lines 132-135 need to be set with the address and passwords of the email account
to be used with the app email verification system. The email address on line 132 and line 134 are the same.  On line
135 the $mail->AddReplyTo address needs to be different than the address on line 132 and 134. At least for me and the addresses
I used, they needed to be different. They also need to be real working addresses or the mailer will not work. 

##Testing the app
At this point you should be able to test if the mailer works and your database is correctly taking down info, querying properly, etc. 
Register a name and email address and see if the mail is sent to the address you entered. See on http://localhost/phpmyadmin 
if the information is correct in the database. That is all you can do on the local host-- the local host cannot 
receive the verification link in the sent email. 
If you want to see all the functionality of this app you must go live on the web so that the regstration
and verification links sent in the emails will work. Read below for that:

##If you want to use all functionality and go on live server: 
Set up the database with the host and then fix the links below.
*links to be changed so all features will work:* 
line 44 of forgot_pw.php needs to link back reset_pw.php on your live server.
line 126 in signup.php needs to link back to verify.php on your live server.

Errors should be accompanied by helpful messages if you have any problems because this app is set to debug mode. As well, 
the [Coding Cage tutorial]((http://www.codingcage.com/2015/08/how-to-send-e-mail-using-phpmailer-and.html) mentioned above was a 
main source for information when making this app. Visiting there will give you much more insight into PHP email and
email verification, as well other important web development topics.
