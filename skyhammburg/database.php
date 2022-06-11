<?php


// Establishing connection with server by passing "server_name", "user_id", "password".
$connection = mysqli_connect("localhost", "root", "", "skyhammburg");

if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$urls2 = $_POST['urls1'];


//Apply Page
if($urls2 == 'apply.html'){

$name2=$_POST['name1']; // Fetching Values from URL
$email2=$_POST['email1'];
$exp2=$_POST['exp1'];
$postt2=$_POST['postt1'];
$phone2=$_POST['phone1'];
$address2=$_POST['address1'];

$sql = "INSERT INTO `apply` ( `name`, `email`, `phone`, `experience`, `post`, `address`) VALUES ('$name2', '$email2', '$phone2','$exp2', '$postt2', '$address2');";

if(mysqli_query($connection, $sql)){
echo "Your Response Has Been Recorded.";
}


}


//Refund Page
elseif($urls2 == 'refund.html'){

$name2=$_POST['name1']; // Fetching Values from URL
$email2=$_POST['email1'];
$phone2=$_POST['phone1'];
$login2=$_POST['login1'];
$serial2=$_POST['serial1'];
$amount2=$_POST['amount1'];
$receiptno2=$_POST['receiptno1'];
$address2=$_POST['address1'];
$message2=$_POST['message1'];



$sql = "INSERT INTO `refund` ( `name`, `email`, `phone`, `login`, `serial`, `amount`, `receiptno`, `address`, `message`) VALUES ( '$name2', '$email2', '$phone2', '$login2', '$serial2', '$amount2', '$receiptno2', '$address2', '$message2');";

if(mysqli_query($connection, $sql)){
echo "Your Response Has Been Recorded.";
}


}


//Contact Page
elseif($urls2 == 'contact.html') {

$name2=$_POST['name1']; // Fetching Values from URL
$email2=$_POST['email1'];
$subject2=$_POST['subject1'];
$phone2=$_POST['phone1'];
$address2=$_POST['address1'];

$sql = "INSERT INTO `contactquery` ( `name`, `email`, `subject`, `message`, `phone`,`address`) VALUES ( '$name2', '$email2', '$subject2', '$message2', '$phone2', '$address2');";

if(mysqli_query($connection, $sql)){
echo "Your Response Has Been Recorded.";
}


}




mysqli_close($connection); // Connection Closed.
?>