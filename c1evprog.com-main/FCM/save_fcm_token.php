<?php 
include "config.php";

date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y h:i', time());


// REGISTER USER

  
    $token = mysqli_real_escape_string($connect, $_POST['token']);

 
  
 
        $query = "INSERT INTO fcmtoken (`uniq_tokens`) VALUES('$token')";
    $results = mysqli_query($connect, $query);
    if($results>0)
    {
        echo "true";
    }
    
    
    ?>