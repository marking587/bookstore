<?php

// Order classes
include_once "soa.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>OnlineShop - Book Orders (Admin)</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h1>OnlineShop - Book Orders (Admin)</h1>
<table border="1" style="width:100%;text-align:left;">
    <tr>
        <th>Time</th>
        <th>Tracking ID</th>
        <th>Order ID</th>
        <th>Trader ID</th>
        <th>Customer</th>
        <th>Total price</th>
        <th>Positions</th>
        <th>Action</th>
    </tr>
    <?php
    foreach($_orders as $order)
    {
        ?>
        <tr>
            <td><?php echo $order->DateTime; ?></td>
            <td><?php echo $order->TrackingID; ?></td>
            <td><?php echo $order->OrderID; ?></td>
            <td><?php echo $order->TraderID; ?></td>
            <td><?php echo $order->Customer; ?></td>
            <td><?php echo $order->TotalPrice; ?></td>
            <td>
                <?php
                $orderPositions = correctArrayNesting($order->Positions['OrderPosition']);

                foreach($orderPositions as $position)
                {
                    ?>
                    <div><?php echo $position['ISBN']." (Quantity: ".$position['Quantity'].")"; ?></div>
                    <?php
                }
                ?>
            </td>
            <td>
                <?php if($order->State == OrderState::Open)
                {?>
                    <a href="<?php echo $_SERVER['PHP_SELF']."?accept=".$order->OrderID; ?>">Accept</a>
                    <?php
                }
                else
                {
                    ?>
                    <a>Accepted</a>
                    <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    //TODO
    // http://141.56.131.108/ewa/Reseller/Book-Order_View.php?traderID=G10
    //GET-Parameter ?traderID=Gxx
    ?>
</table>
</body>
</html>
