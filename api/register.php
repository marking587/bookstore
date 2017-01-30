<?php
/**
 * Created by PhpStorm.
 * User: robertkestel
 * Date: 30.01.17
 * Time: 00:49
 */

include_once  "credentials.php";

if (isset($_POST['register-submit'])) {

    $inputUsername =  trim($_POST['username']);
    $passwordMD5 = md5(trim($_POST['password']));
    $confimPasswdMd5 = md5(trim($_POST['confirm-password']));
    $inputUseradresse = trim($_POST['user_adress']);

    if($passwordMD5 == $confimPasswdMd5){
        $sql_select = "SELECT username FROM user ";

        var_dump($sql_select);
        $sql = "INSERT INTO user (username, userpwmd5, useradresse) values ('$inputUsername', '$passwordMD5', '$inputUseradresse')";
        $result = mysqli_query($conn, $sql);

      //  header("Location: ./login.php");
        echo "ok";
    }

    else{
        echo 'Passwörter stimmen nicht überein!';
        header("Location: ../index.php?loginUI");
    }
}
?>