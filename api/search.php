<?php
/**
 * Created by PhpStorm.
 * User: robertkestel
 * Date: 30.01.17
 * Time: 19:22
 */
include_once "credentials.php";
$name = $_GET['name'];

if (mysqli_stat ($conn) === NULL)
    die("Error: Keine Verbindung möglich!");

$sql2="SELECT ProductID, Produkttitel, Autorname, Verlagsname, Kurzinhalt FROM buecher WHERE Produkttitel LIKE '%$name%' OR Autorname LIKE '%$name%' OR Verlagsname LIKE '%$name%' OR Kurzinhalt LIKE '%$name%'";
$result = mysqli_query($conn,$sql2);

for ($i = 0; $i < mysqli_num_rows($result) ; $i++) {
    $row2[$i] = mysqli_fetch_assoc($result);
}
    $result3 = $row2;
echo json_encode($result3);

?>