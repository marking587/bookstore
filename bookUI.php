<?php
include_once "api/books.php";

$productID = $_GET['ProductID'];

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
    <script src="js/bookUI.js"></script>
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

        /*bookDetail*/
        /*----------------------
Product Card Styles
----------------------*/
        .panel.panel--styled {
            background: #F4F2F3;
        }

        .panelTop {
            padding: 30px;
        }

        .panelBottom {
            border-top: 1px solid #e7e7e7;
            padding-top: 20px;
        }

        .btn-add-to-cart {
            background: #FD5A5B;
            color: #fff;
        }

        .btn.btn-add-to-cart.focus, .btn.btn-add-to-cart:focus, .btn.btn-add-to-cart:hover {
            color: #fff;
            background: #FD7172;
            outline: none;
        }

        .btn-add-to-cart:active {
            background: #F9494B;
            outline: none;
        }

        span.itemPrice {
            font-size: 24px;
            color: #FA5B58;
        }

        /*----------------------
        ##star Rating Styles
        ----------------------*/
        .stars {
            padding-top: 10px;
            width: 100%;
            display: inline-block;
        }

        span.glyphicon {
            padding: 5px;
        }

        .glyphicon-star-empty {
            color: #9d9d9d;
        }

        .glyphicon-star-empty, .glyphicon-star {
            font-size: 18px;
        }

        .glyphicon-star {
            color: #FD4;
            transition: all .25s;
        }

        .glyphicon-star:hover {
            transform: rotate(-15deg) scale(1.3);
        }

    </style>
</head>
<body>

<div class="jumbotron">
    <div class="container text-center">
        <h1>The Bookstore</h1>
        <p>Produkt. Information.</p>
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
                <li class="active"><a href="index.php">Products</a></li>
                <li><a href="#">Angular</a></li>
                <li><a href="#">NodeJS</a></li>
                <li><a href="http://141.56.131.108/ewa/g10/wordpress">WordPress</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="loginUI.php"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                <li><a href="cartUI.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default  panel--styled">
                <div class="panel-body">
                    <div class="col-md-12 panelTop">
                        <div class="col-md-4">
                            <?php
                            foreach ($books as $book) {
                                if (intval($book['ProductID']) === intval($productID)) {

                            echo '<img class="img-responsive" src="'.$book['LinkGrafikdatei'].'" alt=""/>';
                            ?>
                        </div>
                        <div class="col-md-8">
                            <h2><?php echo $book['Produkttitel'] ?></h2>
                            <p><?php echo $book['Kurzinhalt'] ?></p>
                        </div>
                    </div>

                    <div class="col-md-12 panelBottom">
                        <div class="col-md-4 text-center">
                            <button class="btn btn-lg btn-add-to-cart"><span
                                    class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
                            </button>
                        </div>
                        <div class="col-md-4 text-left">
                            <h5>Price <span class="itemPrice"><?php echo $book['PreisBrutto'] ?> €</span></h5>
                        </div>
                        <div class="col-md-4">
                            <div class="stars">
                                <div id="stars" class="starrr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
}
?>
</div>

<footer class="container-fluid text-center">
    <p>by R. Kestel & M.S. Däbritz</p>
</footer>

</body>
</html>