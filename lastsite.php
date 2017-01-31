<?php

    ?>

    <h2>YOUR BILL</h2>

    <label> Name: <?php echo $_SESSION['bill']['lastName']; ?> </label><br>
    <label> Vorname: <?php echo $_SESSION['bill']['firstName']; ?> </label><br>
    <label> Straße: <?php echo $_SESSION['bill']['street']; ?> </label><br>
    <label> PLZ: <?php echo $_SESSION['bill']['plz']; ?> </label><br>
    <label> Stadt: <?php echo $_SESSION['bill']['city']; ?> </label><br>
    <label> Email: <?php echo $_SESSION['bill']['email']; ?> </label><br>
    <label> Kreditkartennummer: <?php echo $_SESSION['bill']['creditNumber']; ?> </label><br>


<h3>Your Items:</h3>

<div id="collapseOne" class="panel-collapse collapse in">
    <div class="panel-body">
        <div class="items">
            <div class="col-md-9">
                <?php
                if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) ) {
                $total = 0;
                foreach ($_SESSION['cart'] as $arr => $bla) {
                foreach ($books as $book) {
                if (intval($book['ProductID']) === intval($arr)) {

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
                                <li><?php echo $book['Produktcode']; ?></li>
                                <li><?php echo $book['Autorname']; ?></li>
                                <li><?php echo $book['Verlagsname']; ?></li>
                                <!--                                                                    <li>TODO: Menge einfügen</li>-->
                            </ul>
                        </td>
                        <td>
                            <b><?php echo $arr." x ".$book['PreisBrutto']." (".$book['PreisBrutto']*$arr.")"; $total += $book['PreisBrutto']*$arr;?></b>
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
            <div class="col-md-3">
                <div style="text-align: center;">
                    <h3>Order Total</h3>
                    <h3><span style="color:green;"><?php echo $total?> €</span></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<form action="api/logout.php" method="post">
    <button type="submit"><h3> Checkout </h3></button>
</form>

</div>
</div>
