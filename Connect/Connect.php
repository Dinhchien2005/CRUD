<?php
$localName = 'localhost';
$username_db = 'root';
$password_db = '12345678';
$dbname = 'db_mysql1';
$conn = new mysqli($localName, $username_db, $password_db, $dbname);
if ($conn->connect_error) {
     die('Connect failed' . $conn->connect_error);
}

?>