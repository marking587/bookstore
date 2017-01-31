<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>G10 BookStore</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
//////////////////////////////////////////////////////////////
// Author: Robert Kestel, 28.01.2017

//echo "<h1>Web Service Client: G10 BookStore - GetDeliveryTime</h1>";
function getDeliveryTime ($isbn)
{
//////////////////////////////////////////////////////////////
// WSDL and Web-Service addresses
    $wsdlAddr = 'http://141.56.131.108:8080/Reseller/BookTrade/?wsdl';
    $wsAddr = 'http://141.56.131.108:8080/Reseller/BookTrade/';
    //$wsAddr = 'http://141.56.131.108:8080/ewa/g10/bookstore/soa/soa_BookOrder.php';

//echo "Creating SOAP-Client for ".$wsAddr." with wsdl: ".$wsdlAddr."<br/><br/>";
//////////////////////////////////////////////////////////////


// Web Service Client
    $client = new SoapClient($wsdlAddr, array('location' => $wsAddr, 'trace' => 1));

// PHP: wrong xml encoding in Request (uses ISO-8859-1 instead of UTF-8, see http://stackoverflow.com/questions/5317858/nusoap-and-content-type)
    $client->soap_defencoding = 'UTF-8';
    $client->decode_utf8 = false;


// Create parameter array

    $param_arr = array('traderID' => "G10", 'ISBN' => $isbn);

// Call operation with parameter
    $response = $client->GetDeliveryTime($param_arr);

// Convert response to useable array
    $response_arr = objectToArray($response);

// Extract array from response structure
    $GetDeliveryTimeResult = $response_arr['GetDeliveryTimeResult'];
//echo "GetDeliveryTimeResult(...) returns: " . $GetDeliveryTimeResult . " d";
    return $GetDeliveryTimeResult;
//function to convert an object to an array

}
function objectToArray($d) {
    if(is_object($d)) {
        $d = get_object_vars($d);
    }

    if(is_array($d)) {
        return array_map(__FUNCTION__,$d);
    } else {
        return $d;
    }
}
?>
</body>
</html>