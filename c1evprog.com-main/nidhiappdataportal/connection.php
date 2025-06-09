<?php

$conn = "";


// $con = mysqli_connect("localhost","u844323284_Nidhi_AppU","NidhiApp@9312@@","u844323284_Nidhi_AppD");

try {
	$servername = "localhost";
	$dbname = "u844323284_Nidhi_AppD";
	$username = "u844323284_Nidhi_AppU";
	$password = "NidhiApp@9312@@";

	$conn = new PDO(
		"mysql:host=$servername; dbname=$dbname",
		$username, $password
	);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>
