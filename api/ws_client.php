<?php
session_start();
$nummer = $_POST["KreditkartenNummer"];
  $options = array( 'location' => 'http://141.56.131.108/ewa/g10/bookstore/api/ws_server.php',
  'uri'=>'http://141.56.131.108/ewa/g10/bookstore/');

	 $SOAPClient = new SoapClient(null, $options);

	 $ergebnis = $SOAPClient->checkLuhn($nummer);

	if($ergebnis == true){
		echo 'Kreditkartennummer korrekt';
//        370306590295948
        $_SESSION['bill']['creditNumber'] = $_POST["KreditkartenNummer"];
		header('Location: ../index.php?page=lastsite');

	}
	else {
		echo 'Kreditkartennummer falsch';
		print '<a href="javascript:history.back()"><br>Back</a>';
	}

?>