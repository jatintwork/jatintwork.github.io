<?php

$conn = "";

// $con = mysqli_connect("localhost","u844323284_pandayan_work","JobApplication@9312","u844323284_InfinityJobs");

try {
	$servername = "localhost";
	$dbname = "u844323284_Infinity_JobD";
	$username = "u844323284_Infinity_JobU";
	$password = "JobApplication@9312";

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
