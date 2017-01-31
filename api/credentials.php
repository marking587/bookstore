<?php
$servername = "localhost";
$username = "root";
$password = "MyNewPass";
$dbname = "g10";
$check = false;


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);


?>