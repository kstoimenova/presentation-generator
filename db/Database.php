<?php

namespace db;

class Database
{
    private $connection;

    public function __construct() {

        try {
        $dbhost = "localhost";
        $dbName = "Presentations_generator";
        $userName = "root";
        $userPassword = "";

        $this->connection = new \PDO("mysql:host=$dbhost;dbname=$dbName", $userName, $userPassword,
            [
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            ]);

        } catch(\PDOException $error) {
            echo "Problem with db query  - " . $error->getMessage(); //NOTE: only for debugging if needed. TODO: DELETE on the final version
            die("Failed to connect to database");
        }
    }
    
    public function getConnection() {
        return $this->connection;
    }

}