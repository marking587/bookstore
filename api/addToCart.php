<?php
//add article to cart
session_start();
$productID = $_POST['cartItemAdded'];
$_SESSION['cart'][$productID] += 1;
header("Location: ../bookUI.php?ProductID=$productID");
?>

