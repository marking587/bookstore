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
                               <a href="./index.php"> <button  type="button" class="btn btn-primary btn-sm btn-block">
                                     <span class="glyphicon glyphicon-share-alt"></span> Continue shopping

                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <?php
                    if (is_array($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $arr => $bla) {
                            foreach ($books as $book) {
                                if (intval($book['ProductID']) === intval($arr)) {

                                    ?>
                            <div class="row">
                                <div class="col-xs-2"><img class="img-responsive" src="<?php echo $book['LinkGrafikdatei']; ?>">
                                </div>
                                <div class="col-xs-4">
                                    <h4 class="product-name"><strong><?php echo $book['Produkttitel']; ?></strong></h4><h4><small><?php echo $book['Kurzinhalt']; ?></small></h4>
                                </div>
                                <div class="col-xs-6">
                                    <div class="col-xs-6 text-right">
                                        <h6><strong><?php echo $book['PreisBrutto']; ?><span class="text-muted"> € x</span></strong></h6>
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="text" class="form-control input-sm" value="<?php echo $amount ?>">
                                    </div>
                                    <div class="col-xs-2">
<!--                                        TODO: remove items-->
                                        <button type="button" class="btn btn-link btn-xs">
                                            <span class="glyphicon glyphicon-trash"> </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                           <?php
                        }}}
                    }else{
                        echo "Ihr Einkaufswagen ist leer.";
                    }
                    ?>
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
