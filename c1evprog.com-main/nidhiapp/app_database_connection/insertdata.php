<?php 
include "config.php";

date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y h:i', time());


// REGISTER USER

  
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $message = mysqli_real_escape_string($connect, $_POST['message']);
 
  
 
        $query = "INSERT INTO message (name, email,phone,address, message, time)
  			  VALUES('$name', '$email','$phone','$address','$message', '$date')";
    $results = mysqli_query($connect, $query);
    if($results>0)
    {
        echo "true";
    }
    
    
    ?>