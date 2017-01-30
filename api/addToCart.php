<?php
//add article to cart
session_start();

$productID = $_POST['cartItemAdded'];
$amount = $_POST['amount'];

$_SESSION['cart'][$productID][$amount] += 1;


//$_SESSION['cart'][$amount] += 1;
header("Location: ../index.php?page=bookUI&ProductID=$productID");
?>

