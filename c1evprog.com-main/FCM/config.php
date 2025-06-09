
<?php
$username="u844323284_tokens";//change username 
$password="Toekns@1234"; //change password
$host="localhost";
$db_name="u844323284_FCM"; //change databasename

$connect=mysqli_connect($host,$username,$password,$db_name);

if(!$connect)
{
	echo json_encode("Connection Failed");
}

?>