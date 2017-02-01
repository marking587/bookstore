<?php
$servername = "localhost";
$username = "root";
$password = "MyNewPass";
$dbname = "g10";
$check = false;


$conn = mysqli_connect($servername, $username, $password, $dbname);
MYSQLI_SET_CHARSET($conn, 'utf8');

?>