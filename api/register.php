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
    $anrede = trim($_POST['anrede']);

    if($passwordMD5 == $confimPasswdMd5){
        $sql_select = "SELECT username FROM user WHERE username = '$inputUsername'";
        $user_exist = mysqli_query($conn, $sql_select);
        $count = mysqli_num_rows($user_exist);


        if($count != 0){
            echo "Username existiert bereits";
        }
        else {
            $sql = "INSERT INTO user (username, userpwmd5, useradresse, useranrede ) values ('$inputUsername', '$passwordMD5', '$inputUseradresse', '$anrede')";
            $result = mysqli_query($conn, $sql);
            if($result == true) {
                $sql_login = "SELECT userid, username, useranrede, useradresse
                          FROM user 
                          WHERE username = '$inputUsername' AND userpwmd5 = '$passwordMD5' ";
                $result_login = mysqli_query($conn, $sql_login);
                $userData = mysqli_fetch_row($result_login);
                $count_login = mysqli_num_rows($result_login);
                $_SESSION['cart'] = [];


                if ($count_login == 1) {
                    $_SESSION['userid'] = $userData[0];
                    $_SESSION['username'] = $userData[1];

                    $_SESSION['useranrede'] = $userData[2];
                    $_SESSION['useradresse'] = $userData[3];
                    echo "ok";


                } else {
                    echo "Du kommst hier nicht rein!";
                }
            }
        }
    }

    else{
        echo 'Passwörter stimmen nicht überein!';
    }
}
?>