<?php
//add article to cart
session_start();

$productID = $_POST['cartItemAdded'];
$amount = $_POST['amount'];

$_SESSION['cart'][$productID] = $amount;

header("Location: ../index.php?page=bookUI&ProductID=$productID");
?>

