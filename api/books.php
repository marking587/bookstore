<?php
/**
 * Created by IntelliJ IDEA.
 * User: siggi
 * Date: 23.01.17
 * Time: 22:21
 */

// setting up PDO
include_once "credentials.php";
// prepare all queries...
//$dbBuecher = $conn->prepare("SELECT * FROM buecher");

// fetch all artists
//$dbBuecher->execute();
//var_dump($dbBuecher);
//$books=$dbBuecher->fetchAll(PDO::FETCH_ASSOC);



if (mysqli_stat ($conn) === NULL)
    die("Error: Keine Verbindung möglich!");

$sql2="SELECT * FROM buecher ";
$result = mysqli_query($conn,$sql2);

for ($i = 0; $i < mysqli_num_rows($result) ; $i++) {
    $row2[$i] = mysqli_fetch_assoc($result);
}
$books = $row2;
//var_dump($books);
$x=new XMLWriter();
$x->openMemory();
$x->startDocument('1.0','UTF-8');
$x->startElement('buecher');

foreach ($books as $book) {
    $x->startElement('book');

    $x->writeAttribute('ProductID',$book['ProductID']);
    $x->writeAttribute('Produktcode',$book['Produktcode']);
    $x->writeAttribute('Produkttitel',$book['Produkttitel']);
    $x->writeAttribute('Autorname',$book['Autorname']);
    $x->writeAttribute('Verlagsname',$book['Verlagsname']);
    $x->writeAttribute('PreisNetto',$book['PreisNetto']);
    $x->writeAttribute('Mwstsatz',$book['Mwstsatz']);
    $x->writeAttribute('PreisBrutto',$book['PreisBrutto']);
    $x->writeAttribute('Lagerbestand',$book['Lagerbestand']);
    $x->writeAttribute('Kurzinhalt',$book['Kurzinhalt']);
    $x->writeAttribute('Gewicht',$book['Gewicht']);
    $x->writeAttribute('LinkGrafikdatei',$book['LinkGrafikdatei']);

    $x->endElement(); // book
} // foreach $books

$x->endElement(); // buecher
$x->endDocument();
$xml = $x->outputMemory();

$xml = utf8_encode($xml);
$xml = simplexml_load_string($xml);

