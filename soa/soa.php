<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>G10 BookStore</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php
//////////////////////////////////////////////////////////////
// Author: Robert Kestel, 28.01.2017

//echo "<h1>Web Service Client: G10 BookStore - GetDeliveryTime</h1>";
function getDeliveryTime($isbn)
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


function objectToArray($d)
{
    if (is_object($d)) {
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        return array_map(__FUNCTION__, $d);
    } else {
        return $d;
    }
}

class Order
{
    function __construct($orderID, $traderID, $customer, $totalPrice, $orderPositions)
    {
        $this->OrderID = $orderID;
        $this->TraderID = $traderID;
        $this->Customer = $customer;
        $this->TotalPrice = $totalPrice;
        $this->Positions = $orderPositions;
        $this->DateTime = date('Y-m-d H:i:s', time());
        $this->State = OrderState::Open;
        $this->TrackingID = "0";
    }

    public $OrderID;
    public $TraderID;
    public $Customer;
    public $TotalPrice;
    public $Positions;
    public $DateTime;
    public $State;
    public $TrackingID;
}

class OrderState
{
    const Open = 0;
    const Accepted = 1;
}

class OrderPosition
{
    public $ISBN;
    public $Quantity;
}


//////////////////////////////////////////////////////////////
// Read, accept and write orders from file
$_orders = readOrdersFromFile();

if (isset($_GET['accept']) && empty($_GET['accept']) == FALSE) {
    $orderID = $_GET['accept'];
    $orderToAccept = null;

    foreach ($_orders as $order) {
        if ($order->OrderID == $orderID) {
            $orderToAccept = $order;
        }
    }

    if ($orderToAccept != null && $orderToAccept->State == OrderState::Open) {
        try {
// Address for WSDL
            $wsdlAddr = 'http://141.56.131.108:8080/Reseller/BookTrade/?wsdl';
// Address for Web-Service Request
//$wsAddr = 'http://141.56.131.108:8080/<Gxx>/Shop-AcceptedOrder/';
            $wsAddr = 'http://141.56.131.108/ewa/g10/soa/soa_BookOrder.php';
            $client = new SoapClient($wsdlAddr, array('location' => $wsAddr, 'trace' => true));
            $client->soap_defencoding = 'UTF-8';
            $client->decode_utf8 = false;

            // Call operation with parameter
            $result = $client->DoOrder(array("orderID" => $orderToAccept->OrderID, "traderID" => $orderToAccept->TraderID, "customer" => $orderToAccept->Customer, "totalPrice" => $orderToAccept->TotalPrice, "positions" => correctArrayNesting($orderToAccept->Positions['OrderPosition'])));
            soapDebug($client);
            $orderToAccept->TrackingID = $result->DoOrderResult;
            $orderToAccept->State = OrderState::Accepted;
            writeOrdersToFile($_orders);

        } catch (SoapFault $exception) {
            //soapDebug($client);

            echo "<h3>Error</h3>";
            throw $exception;
        }
    }
}


//////////////////////////////////////////////////////////////
// Functions
function writeOrdersToFile($orders)
{
    $ser = '';
    foreach ($orders as $order) {
        $ser = $ser . serialize($order) . "\r\n";
    }

    file_put_contents('BookTrade-Orders.txt', $ser, LOCK_EX);
}

function readOrdersFromFile()
{
    $orders = array();

    $fileHandle = fopen("BookTrade-Orders.txt", "r");
    if ($fileHandle) {
        while (($line = fgets($fileHandle)) !== FALSE) {
            $order = unserialize($line);
            array_push($orders, $order);
        }

        fclose($fileHandle);

        return $orders;
    } else {
        echo "Unable to open BookTrade.txt";
        exit;
    }
}

// PHP doesn�t create an array for one-element in a list
function correctArrayNesting($arr)
{
    if (is_array($arr[key($arr)]) == FALSE) {
        $arr = array($arr);
    }

    return $arr;
}

function prettyXml($xmlText)
{
    $dom = new DOMDocument("1.0");
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xmlText);

    return $dom->saveXML();
}

function soapDebug($client)
{
    $requestHeaders = $client->__getLastRequestHeaders();
    $request = prettyXml($client->__getLastRequest());
    $responseHeaders = $client->__getLastResponseHeaders();
    $response = prettyXml($client->__getLastResponse());

    echo "<h3>Request</h3>";
    echo '<code>' . nl2br(htmlspecialchars($requestHeaders, true)) . '</code>';
    echo highlight_string($request, true) . "<br/>\n";

    echo "<h3>Response</h3>";
    echo '<code>' . nl2br(htmlspecialchars($responseHeaders, true)) . '</code>' . "<br/>\n";
    echo highlight_string($response, true) . "<br/>\n";
}
function DoOrder($orderID, $traderID, $customer, $totalPrice, $positions)
{
    if(preg_match("/^G\d{2}$/i", $traderID) == FALSE)
    {
        throw new Exception("TraderID is not valid. Please use your group id (Gxx).");
    }

    $order = new Order($orderID, $traderID, $customer, $totalPrice, $positions);
    $ser = serialize($order);
    file_put_contents('BookTrade-Orders.txt', $ser."\r\n", FILE_APPEND | LOCK_EX);

    return array("DoOrderResult" => $order->TrackingID);
}
?>
</body>
</html>