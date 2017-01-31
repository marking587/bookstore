<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents('php://input'), true);
    $_SESSION['bill']['lastName'] = addslashes($data["lastName"]);
    $_SESSION['bill']['firstName'] = addslashes($data["firstName"]);
    $_SESSION['bill']['street'] = addslashes($data["street"]);
    $_SESSION['bill']['plz'] = addslashes($data["plz"]);
    $_SESSION['bill']['city'] = addslashes($data["city"]);
    $_SESSION['bill']['email'] = addslashes($data["email"]);
}
?>