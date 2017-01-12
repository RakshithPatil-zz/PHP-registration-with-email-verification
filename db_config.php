<?php
/**
 * Author: Anne Barrat
 * Assignment: PHP Web App for Perl, Python and PHP Class
 * Created by PhpStorm.
 * Date: 10/21/2016
 * Time: 8:54 AM
 * FILE TITLE: DB_CONFIG.PHP
 * This program controls the connections to the database on the server
 * THIS FILE ASSUMES A LOCAL SERVER WITH USERNAME 'ROOT' AND PASSWORD EMPTY STRING.
 */


class Database
{

    private $host = "localhost";
    private $db_name = "db_demo";
    private $username = "root";
    private $password = "";
    public $conn;

    public function dbConnection() 
    {

        $this->conn = null;
        try 
        {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $exception)
        {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>