<?php
$servername = "localhost";
$username = "G10";
$password = "wa78g";
$dbname = "g10";
$check = false;


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);


?>