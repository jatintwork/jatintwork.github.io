
<?php
$username="u844323284_Infinity_JobU";//change username 
$password="JobApplication@9312"; //change password
$host="localhost";
$db_name="u844323284_Infinity_JobD"; //change databasename

$connect=mysqli_connect($host,$username,$password,$db_name);

if(!$connect)
{
	echo json_encode("Connection Failed");
}

?>