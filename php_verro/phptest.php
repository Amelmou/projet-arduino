<?php

if (isset($_GET["action"])){

	require("php_serial.class.php") ;
	$serial = new phpSerial();
	$serial-> deviceSet("COM3");
	$serial->confBaudRate(9600);

	$serial->deviceOpen();
     
	if ($_GET["action"]=="green0"){
		$serial->sendMessage(0);
		
	}
	if ($_GET["action"]=="green1"){
		$serial->sendMessage(1);
		
	}
// Read data
$read = $serial->readPort();	if ($ read)
	if ($read=="A"){
       echo "<script>alert(\"Quelqu'un est devant la porte !!\")</script>";
	}

$serial->deviceClose();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Arduino</title>
</head>
<body>
	<a href="phptest.php?action=green0">Fermer la porte </a>
	<a href="phptest.php?action=green1">Ouvrir la porte </a>
	<a >green Off</a>

</body>
</html>