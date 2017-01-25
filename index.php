<?php
include_once "api/books.php";
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
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="index.php">Products</a></li>
                <li><a href="#">Angular</a></li>
                <li><a href="#">NodeJS</a></li>
                <li><a href="http://141.56.131.108/ewa/g10/wordpress">WordPress</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="accountUI.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                <li><a href="cartUI.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <?php
        foreach ($xml->book as $book){
            echo '<div class="col-sm-4"><div class="panel panel-primary">';
            echo '<div class="panel-heading">' . $book['Produkttitel'] . '</div>';
            echo '<div class="panel-body"><a href="bookUI.php?ProductID='.$book['ProductID'].'"><img src="'. $book['LinkGrafikdatei'] .'" class="img-responsive" style="width:100%" alt="Image"></a></div>';
            echo '<div class="panel-footer">'. $book['PreisBrutto'] .'</div></div></div>';
        }
        ?>
    </div>
</div><br>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">BLACK FRIDAY DEAL</div>
                <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">BLACK FRIDAY DEAL</div>
                <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">BLACK FRIDAY DEAL</div>
                <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
            </div>
        </div>
    </div>
</div><br><br>

<footer class="container-fluid text-center">
    <p>by R. Kestel & M.S. Däbritz</p>
<!--    <form class="form-inline">Get deals:-->
<!--        <input type="email" class="form-control" size="50" placeholder="Email Address">-->
<!--        <button type="button" class="btn btn-danger">Sign Up</button>-->
<!--    </form>-->
</footer>

</body>
</html>