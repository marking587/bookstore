<?php

$productID = $_GET["ProductID"];
?>

<div class="container">
    <?php
    $bestand = null;
    foreach ($books as $book) {
        if (intval($book['ProductID']) === intval($productID)) {

            echo '<img class="img-responsive" src="' . $book['LinkGrafikdatei'] . '" alt=""/>';
            ?>
            <h2><?php echo $book['Produkttitel'] ?></h2>

            <p
                onclick="toggleNode(this.parentNode); return  false;">Mehr Informationen</p>
            <div style="display: none;" border="1px"><p><?php echo $book['Kurzinhalt'] ?></p><br></div>
            <p></p>
            <div class="col-md-4 text-left">
                <h5>Preis: <span class="itemPrice"><?php echo $book['PreisBrutto'] ?> €</span></h5>
                <?php $bestand = $book['Lagerbestand'] ?>
            </div>

        <?php }
    }
    if (isset($_SESSION['userid']) != '') {
        ?>
        <form action="api/addToCart.php" method="post">
            <input type="number" name="amount"
                   value="<?= isset($_SESSION['cart'][$productID]) ? $_SESSION['cart'][$productID] : 0 ?>" min="1"
                   max="<?php echo $bestand ?>">
            <button type="submit" class="btn btn-lg btn-add-to-cart"><span
                    class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
            </button>
            <input type="hidden" name="cartItemAdded" id="cartItemAdded" value='<?php echo $productID; ?>'>
        </form>
    <?php } else { ?>
        <a href="index.php?page=loginUI">
            <button type="submit" class="btn btn-lg btn-add-to-cart"> Log in
            </button>
        </a>

    <?php } ?>

</div>

