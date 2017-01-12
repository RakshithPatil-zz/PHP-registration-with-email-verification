<?php
/**
 * Created by PhpStorm.
 * User: Anne
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password (or empty string)) */
$link = mysqli_connect("localhost", "root", "", "db_demo");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Attempt create table query execution
$sql = "CREATE TABLE tbl_users(userId INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, userName VARCHAR (100) NOT NULL, userEmail VARCHAR(100) NOT NULL,
 userPass VARCHAR(100) NOT NULL, userStatus enum('Y','N') NOT NULL DEFAULT 'N', tokencode VARCHAR (100) NOT NULL)";
if (mysqli_query($link, $sql)){
    echo "Table persons created successfully";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>


