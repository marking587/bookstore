<div class='container'>
    <div class='row' style='padding-top:25px; padding-bottom:25px;'>
        <div class='col-md-12'>
            <div id='mainContentWrapper'>
                <div class="col-md-8 col-md-offset-2">
                    <h2 style="text-align: center;">
                        Review Your Order & Complete Checkout
                    </h2>
                    <hr/>
                    <a href="index.php" class="btn btn-info" style="width: 100%;">Add More Products</a>
                    <hr/>
                    <div class="shopping_cart">
                        <form class="form-horizontal" role="form" action="" method="post" id="payment-form">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Review
                                                Your Order</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="items">
                                                <div class="col-md-9">
                                                    <?php

                                                    if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) ) {
                                                    $total = 0;
                                                    $array = [];
                                                    $i = 0;
                                                    foreach ($_SESSION['cart'] as $productID => $amount) {
                                                    foreach ($books as $book) {
                                                    if (intval($book['ProductID']) === intval($productID)) {
                                                        $i = $i + 1;
                                                       $array[$i]['productcode'] =  $book['Produktcode'];
                                                       $array[$i]['amount'] = $amount;

                                                       /* positions" => array(
                                                        "OrderPosition" => array(
                                                                   array("ISBN" => "123456789X", "Quantity" => 3),
                                                                    array("ISBN" => "456457456X", "Quantity" => 1)
                                                   )*/


                                                    ?>
                                                    <table class="table table-striped">
                                                        <!--                                                        //Item 1-->
                                                        <tr>
                                                            <td colspan="2">
                                                                <b>
                                                                    <?php echo $book['Produkttitel']; ?></b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul>
                                                                    <li>ISBN:   <?php echo $book['Produktcode']; ?></li>
                                                                    <li>Author: <?php echo $book['Autorname']; ?></li>
                                                                    <li>Verlag: <?php echo $book['Verlagsname']; ?></li>

                                                                </ul>
                                                            </td>
                                                            <td style=" text-align: right;">
                                                                <b><?php echo $amount." x ".$book['PreisBrutto']." € (".$book['PreisBrutto']*$amount." €)"; $total += $book['PreisBrutto']*$amount;?></b>
                                                            </td>
                                                        </tr>
                                                        <?php

                                                        }
                                                        }

                                                        }} else {
                                                            //TODO: das muss noch angezeigt werden , siehe if Bedingung
                                                            echo '<span> Nothing to order.</span>';
                                                        }
                                                        ?>
                                                    </table>
                                                </div>
                                                <?php
                                                include_once "../soa/soa_client.php";

                                                $customer = $_SESSION["username"];
                                                $totalPrice = $total;
                                                DoNewOrder( $customer, $totalPrice, $array);
                                                ?>
                                                <div class="col-md-3">
                                                    <div style="text-align: right; padding-right: 8px">
                                                        <h3>Total</h3>
                                                        <h3><span style="color:green; "><?php echo $total?> €</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <div style="text-align: center; width:100%;"><a style="width:100%;"
                                                                                        data-toggle="collapse"
                                                                                        data-parent="#accordion"
                                                                                        href="#collapseTwo"
                                                                                        class=" btn btn-success"
                                                                                        onclick="$(this).fadeOut(); $('#payInfo').fadeIn();">Continue
                                                to Billing Information»</a></div>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Contact
                                            and Billing Information</a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <b>please verify your billing information.</b>
                                        <br/><br/>
                                        <form>
                                        <table class="table table-striped" style="font-weight: bold;">
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_email" id="emailAlert">E-Mail:</label></td>
                                                <td>
                                                    <input class="form-control" id="email" name="email"
                                                           required="required" type="text" value="<?= $_SESSION['email']; ?>"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_first_name" id="firstNameAlert">First name:</label></td>
                                                <td>
                                                    <input class="form-control" id="firstName" name="firstName"
                                                           required="required" type="text" value="<?= $_SESSION['firstname']; ?>"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_last_name" id="lastNameAlert">Last name:</label></td>
                                                <td>
                                                    <input class="form-control" id="lastName" name="lastName"
                                                           required="required" type="text" value="<?= $_SESSION['lastname']; ?>"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_1" id="streetAlert">Address:</label></td>
                                                <td>
                                                    <input class="form-control" id="street"
                                                           name="street" required="required" type="text" value="<?= $_SESSION['useradresse']; ?>"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_city" id="cityAlert">City:</label></td>
                                                <td>
                                                    <input class="form-control" id="city" name="city"
                                                           required="required" type="text" value="<?= $_SESSION['city']; ?>" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label  for="id_postalcode" id="plzAlert">Postalcode:</label></td>
                                                <td>
                                                    <input class="form-control" id="plz" name="plz"
                                                           required="required" type="text" value="<?= $_SESSION['plz']; ?>" />
                                                </td>
                                            </tr>
                                        </table>
                                            <span id="message"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
<!--                                        data-parent="#accordion" href="#collapseThree"-->
                                        <div style="text-align: center;"><a data-toggle="collapse"
                                                                            class=" btn   btn-success" id="payInfo"
                                                                            style="width:100%;display: none;" onclick="validation(console.error(), bill);">Enter Payment Information »</a>
                                        </div></form>
                                    </h4>
                                </div>
                            </div>

                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
