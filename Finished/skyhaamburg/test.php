<?php
ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "supporat@skyhaamburg.com";
$to = "support@skyhaamburg.com";
$subject = "Checking PHP mail";
$message = "PHP mail works just finee";
$headers = "From:" . $from;
if(mail($to,$subject,$message, $headers)) {
    echo "The email message was sentt.";
} else {
    echo "The email message was not sent.";
}
?>