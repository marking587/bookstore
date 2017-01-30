<?php
/**
 * Created by PhpStorm.
 * User: robertkestel
 * Date: 28.01.17
 * Time: 16:45
 */

session_start();
include_once './api/credentials.php';
include_once './api/books.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>G10 Beleg</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script src="./js/bookUI.js"></script>
    <script src="./js/loginUI.js"></script>
    <script src="./js/login_register.js"></script>
</head>
<body>

<div class="jumbotron">
    <div class="container text-center">
        <h1>The Bookstore</h1>
        <p>ich ewa. du ewa.</p>
    </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand" >G10</span>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php?page=angular">Angular</a></li>
                <li><a href="https://radiant-tor-87998.herokuapp.com">NodeJS</a></li>
                <li><a href="http://141.56.131.108/ewa/g10/wordpress">WordPress</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <?php

                if(isset($_SESSION['userid']) != '') {
                ?>
                    <li><a href="index.php?page=accountUI"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                <?php }
                elseif(!isset($_SESSION['userid'])){ ?>
                <li><a href="index.php?page=loginUI"><span class="glyphicon glyphicon-user"></span> Login</a></li>
                <?php } ?>

                <li><a href="index.php?page=cartUI"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>

            </ul>
        </div>
    </div>
</nav>
<div id= "seite_anzeigen" class="container">
    <?php
    include (isset ($_GET["page"]) ? $_GET["page"] : "defaultUI") . ".php";
    if(isset($_SESSION['userid']) == '') {


    }

    ?>
</div>



<footer class="container-fluid text-center">
    <p>by R. Kestel & M.S. Däbritz</p>
</footer>

</body>
</html>