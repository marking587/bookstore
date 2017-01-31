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
