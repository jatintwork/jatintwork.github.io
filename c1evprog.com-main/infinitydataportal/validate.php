<?php

include_once('connection.php');

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	echo $username.  "     ";
	echo $password;
	$stmt = $conn->prepare("SELECT * FROM login");
	$stmt->execute();
	$users = $stmt->fetchAll();
	
	foreach($users as $user) {
	    
	   // echo $user[1];
		
		if(($user['username'] == $username) &&
			($user['password'] == $password)) {
			    
			    	// echo "<script>alert(' INFORMATION')</script>";
			    session_start();
			    $_SESSION['is_login']=true;
			 //   echo "came here";
			 
				header("location: applicant_message/indexs.php");
		}
		else {
			echo "<script language='javascript'>";
			echo "alert('WRONG INFORMATION')";
			  echo "came here else";
				// header("location: index.php");
			echo "</script>";
// 			die();
		}
	}
}

?>
