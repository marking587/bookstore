<?php
/**
 * Created by PhpStorm.
 * User: robertkestel
 * Date: 29.01.17
 * Time: 19:30
 */
?>

<div  class="container">
    <div class="row">


        <?php


        foreach ($xml->book as $book){
            echo '<div class="col-sm-4"><div class="panel panel-primary">';
            echo '<div class="panel-heading">' . $book['Produkttitel'] . '</div>';
            echo '<div class="panel-body"><a href="./index.php?page=bookUI&ProductID='.$book['ProductID'].'"><img src="'. $book['LinkGrafikdatei'] .'" class="img-responsive img_book"  alt="Image"></a></div>';
            echo '<div class="panel-footer">'. $book['PreisBrutto'] .' €</div></div></div>';

        }
        ?>
</>
</div>
