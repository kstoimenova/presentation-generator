<?php

class Database
{
    private $connection;

    public function __construct() {

        try {
        $dbhost = "localhost";
        $dbName = "Presentations_generator";
        $userName = "root";
        $userPassword = "";

        $this->connection = new PDO("mysql:host=$dbhost;dbname=$dbName", $userName, $userPassword,
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            ]);

        } catch(PDOException $error) {
            die("Failed to connect to database");
        }
    }
    
    public function getConnection() {
        return $this->connection;
    }

}