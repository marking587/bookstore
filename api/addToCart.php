<?php
//add article to cart
session_start();

$productID = $_POST['cartItemAdded'];
$amount = $_POST['amount'];
$isbn = $_POST['Produktcode'];

$_SESSION['cart'][$productID] = $amount;
//$_SESSION['cart'][$productID][$amount] = $isbn;


header("Location: ../index.php?page=bookUI&ProductID=$productID");
?>

