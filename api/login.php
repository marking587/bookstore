<?php
session_start();
include_once  "credentials.php";

if (isset($_POST['login-submit'])) {

    $inputUsername =  trim($_POST['username']);
    $passwordMD5 = md5(trim($_POST['password']));

        $sql = "SELECT userid, username, useranrede, useradresse
                          FROM user 
                          WHERE username = '$inputUsername' AND userpwmd5 = '$passwordMD5' ";
            $result = mysqli_query($conn, $sql);
            $userData = mysqli_fetch_row($result);
            $count = mysqli_num_rows($result);
            $_SESSION['cart'] = [];


        if($count == 1){
            $_SESSION['userid'] = $userData[0];
            $_SESSION['username'] = $userData[1];

            $_SESSION['useranrede'] = $userData[2];
            $_SESSION['useradresse'] = $userData[3];
            echo "ok";


        } else
        {
            echo "Du kommst hier nicht rein!";
        }

}
?>