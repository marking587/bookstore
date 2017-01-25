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
        body {
            margin-top: 20px;
        }
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
            <a class="navbar-brand" href="#">G10</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
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
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        <div class="row">
                            <div class="col-xs-6">
                                <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-sm btn-block">
                                    <span class="glyphicon glyphicon-share-alt"></span> Continue shopping
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                        </div>
                        <div class="col-xs-4">
                            <h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control input-sm" value="1">
                            </div>
                            <div class="col-xs-2">
                                <button type="button" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-2"><img class="img-responsive" src="http://placehold.it/100x70">
                        </div>
                        <div class="col-xs-4">
                            <h4 class="product-name"><strong>Product name</strong></h4><h4><small>Product description</small></h4>
                        </div>
                        <div class="col-xs-6">
                            <div class="col-xs-6 text-right">
                                <h6><strong>25.00 <span class="text-muted">x</span></strong></h6>
                            </div>
                            <div class="col-xs-4">
                                <input type="text" class="form-control input-sm" value="1">
                            </div>
                            <div class="col-xs-2">
                                <button type="button" class="btn btn-link btn-xs">
                                    <span class="glyphicon glyphicon-trash"> </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="text-center">
                            <div class="col-xs-9">
                                <h6 class="text-right">Added items?</h6>
                            </div>
                            <div class="col-xs-3">
                                <button type="button" class="btn btn-default btn-sm btn-block">
                                    Update cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row text-center">
                        <div class="col-xs-9">
                            <h4 class="text-right">Total <strong>$50.00</strong></h4>
                        </div>
                        <div class="col-xs-3">
                            <button type="button" class="btn btn-success btn-block">
                                Checkout
                            </button>
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