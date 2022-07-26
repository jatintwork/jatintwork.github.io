<?php

$name2=$_POST['name1']; 
$email2=$_POST['email1'];
$subject2=$_POST['subject1'];
$message2=$_POST['message1'];
$number2=$_POST['number1'];
$address2 =$_POST['address1'];


//echo "<script>alert('$name2');</script>";
//echo $name2, $email2, $subject2, $message2, $number2, $address2;


$to = "info@interiortimess.com";
$subject = "This is Enquiry of $name2 ";

$message = "<h1>Message from Mr./Mrs. <b> $name2 </b></h1>";
$message .= "<h5>Name      : $name2</h5>";
$message .= "<h5>Email     : $email2</h5>";
$message .= "<h5>Mobile No : $number2</h5>";
$message .= "<h5>Address   : $address2</h5>";

$message .= "<h5>Subject   : $subject2</h5>";
$message .= "<h5>Message   : $message2</h5>";


$header = "From:info@interiortimess.com \r\n";
// $header .= "Cc:info@interiortimess.com \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";

$retval = mail($to, $subject, $message, $header);

if ($retval == true) {
    echo "We've Received Your Response. We Will Contact You Soon.";
} else {
    
    echo "Fill the form properly.";

   // echo $message;

}




?>