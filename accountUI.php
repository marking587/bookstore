<?php
session_start();
if(isset($_SESSION['user_session_id'])=="")
{
    header("Location: loginUI.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>G10 Beleg</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default rounded borders and increase the bottom margin */
        .navbar {
            margin-bottom: 50px;
            border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }
    </style>
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
            <a class="navbar-brand" href="index.php">G10</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php">Products</a></li>
                <li><a href="#">Angular</a></li>
                <li><a href="#">NodeJS</a></li>
                <li><a href="http://141.56.131.108/ewa/g10/wordpress">WordPress</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="loginUI.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                <li  class="active"><a href="cartUI.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Sheena Shrestha</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Department:</td>
                                    <td>Programming</td>
                                </tr>
                                <tr>
                                    <td>Hire date:</td>
                                    <td>06/23/2013</td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td>01/24/1988</td>
                                </tr>

                                <tr>
                                <tr>
                                    <td>Gender</td>
                                    <td>Female</td>
                                </tr>
                                <tr>
                                    <td>Home Address</td>
                                    <td>Kathmandu,Nepal</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><a href="mailto:info@support.com">info@support.com</a></td>
                                </tr>
                                <td>Phone Number</td>
                                <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)
                                </td>

                                </tr>

                                </tbody>
                            </table>

                            <a href="#" class="btn btn-primary">Edit</a>
                            <a href="#" class="btn btn-primary">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>by R. Kestel & M.S. Däbritz</p>
    <!--    <form class="form-inline">Get deals:-->
    <!--        <input type="email" class="form-control" size="50" placeholder="Email Address">-->
    <!--        <button type="button" class="btn btn-danger">Sign Up</button>-->
    <!--    </form>-->
</footer>

</body>
</html>