
<?php

$productID = $_GET["ProductID"];
?>

<div class="container">
    <?php
    foreach ($books as $book) {
    if (intval($book['ProductID']) === intval($productID)) {

    echo '<img class="img-responsive" src="'.$book['LinkGrafikdatei'].'" alt=""/>';
    ?>
    <h2><?php echo $book['Produkttitel'] ?></h2>
    <p><?php echo $book['Kurzinhalt'] ?></p>
        <div class="col-md-4 text-left">
            <h5>Preis: <span class="itemPrice"><?php echo $book['PreisBrutto'] ?> €</span></h5>
            <?php echo $book['Lagerbestand'] ?>
        </div>

    <?php }} ?>
    <?php
        if(isset($_SESSION['userid']) != '')

         {?>
        <form action="api/addToCart.php" method="post">
            <input type="number" name="amount" value="1" min="1" max="<?php echo $book['Lagerbestand'] ?>">
            <button type="submit" class="btn btn-lg btn-add-to-cart"><span
                        class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
            </button>
            <input type="hidden" name="cartItemAdded" id="cartItemAdded" value='<?php echo $productID; ?>'>
        </form>
    <?php } else { ?>
        <a href="loginUI.php"><button type="submit" class="btn btn-lg btn-add-to-cart"> Log in
            </button></a>

    <?php } ?>

</div>

