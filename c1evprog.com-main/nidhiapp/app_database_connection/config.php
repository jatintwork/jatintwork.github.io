
<?php
$username="u844323284_Nidhi_AppU";//change username 
$password="NidhiApp@9312@@"; //change password
$host="localhost";
$db_name="u844323284_Nidhi_AppD"; //change databasename

$connect=mysqli_connect($host,$username,$password,$db_name);

if(!$connect)
{
	echo json_encode("Connection Failed");
}

?>