<?php
/**
 * Created by PhpStorm.
 * User: robertkestel
 * Date: 29.01.17
 * Time: 13:58
 */
session_start();
unset($_SESSION['user_session_id']);
if(session_destroy())
{
    header("Location: ../index.php");
}