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

    public function addRecord($conn, $firstName, $lastName, $course, $specialty, $fn, $group_number, $birthday, $link, $motivation, $picture, $zodiacSign) {

	    $sql = "INSERT INTO students_info (first_name, last_name, course, specialty, fn, group_number, birth_date, link, motivation, picture, zodiac_sign)
	    		VALUES 
	    		( :firstName, :lastName, :course, :specialty, :fn, :group_number, :birth_date, :link, :motivation, :picture, :zodiac_sign)";

	    $stmt = $conn->prepare($sql) or die("failed!");
        $stmt->execute(['firstName' => $firstName, 'lastName' => $lastName, 'course' => $course, 'specialty' => $specialty, 'fn' => $fn, 
                        'group_number' => $group_number, 'birth_date' => $birthday, 'link' => $link, 
                        'motivation' => $motivation, 'picture' => $picture, 'zodiac_sign' => $zodiacSign]);
    }

}