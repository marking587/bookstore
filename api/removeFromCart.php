<?php
/**
 * Created by IntelliJ IDEA.
 * User: siggi
 * Date: 31.01.17
 * Time: 16:02
 */
//remove article to cart
session_start();

$productID = $_POST['cartItemRemoved'];

unset($_SESSION['cart'][$productID]);

header("Location: ../index.php?page=cartUI");
?>
