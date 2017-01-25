<?php
if (session_status() ===  PHP_SESSION_NONE)  {
    session_start();
}

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_start();
    session_unset();
    session_destroy();
    header('location: ../index.php');
}


if (isset($_POST['login-submit'])) {

    $inputUsername = $_POST['username'];
    $passwordMD5 = md5($_POST['password']);

    include "credentials.php";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT `user`.`userid`, `user`.`username`, `user`.`userpwmd5`, `user`.`useranrede`, `user`.`useradresse`
                          FROM `$dbname`.`user` 
                          WHERE `user`.`username` = '$inputUsername' AND `user`.`userpwmd5` = '$passwordMD5';";

        $userData = $conn->query($sql);
        $userData = $userData->fetch(PDO::FETCH_ASSOC);


        $_SESSION['userid'] = $userData['userid'];
        $_SESSION['username'] = $userData['username'];
        $_SESSION['useranrede'] = $userData['useranrede'];


        header('location: ../accountUI.php');


    } catch (PDOException $e) {
        header('location: ../index.php');
    }

    $conn = null;

}