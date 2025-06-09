<?php


 

$urls2 = $_POST['urls1'];
//echo $urls2;


//Apply Page
if($urls2 == 'apply.php'){

$name2=$_POST['name1']; // Fetching Values from URL
$email2=$_POST['email1'];
$exp2=$_POST['exp1'];
$postt2=$_POST['postt1'];
$phone2=$_POST['phone1'];
$address2=$_POST['address1'];

//$sql = "INSERT INTO `apply` ( `name`, `email`, `phone`, `experience`, `post`, `address`) VALUES ('$name2', '$email2', '$phone2','$exp2', '$postt2', '$address2');";

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



//$sql = "INSERT INTO `refund` ( `name`, `email`, `phone`, `login`, `serial`, `amount`, `receiptno`, `address`, `message`) VALUES ( '$name2', '$email2', '$phone2', '$login2', '$serial2', '$amount2', '$receiptno2', '$address2', '$message2');";

if(1==1){
 
         $to = "Support@aircrowns.com";
         $subject = "This is Refund Query From of $name2";
         
         $message = "<h1>Details of the Applicant <b> $name2 </b></h1>";
         $message .= "<h5>Name        : $name2</h5>";
         $message .= "<h5>Email       : $email2</h5>";
         $message .= "<h5>Mobile No   : $phone2</h5>";
         $message .= "<h5>Login No    : $login2</h5>";
         $message .= "<h5>Serial No.  : $serial2</h5>";
         $message .= "<h5>Amount      : $amount2</h5>";
         $message .= "<h5>Receipt No. : $receiptno2</h5>";
         $message .= "<h5>Address     : $address2</h5>";
         $message .= "<h5>Message     : $message2</h5>";
      
         
         
         $header = "From:Support@aircrowns.com \r\n";
        // $header .= "Cc:info@skyhaamburg.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Your Response Has Been Recorded..";
         }else {
            echo "Fill the form properly.";
         }



}


}


//Contact Page
elseif($urls2 == 'contact.html') {

$name2=$_POST['name1']; // Fetching Values from URL
$email2=$_POST['email1'];
$subject2=$_POST['subject1'];
$message2=$_POST['message1'];
$phone2=$_POST['phone1'];
$address2 =$_POST['address1'];
//$login2=$_POST['login1'];
//$serial2 =$_POST['serial1'];



//$sql = "INSERT INTO `contactquery` ( `name`, `email`, `subject`, `message`, `phone`,`address`) VALUES ( '$name2', '$email2', '$subject2', '$message2', '$phone2', '$address2');";

if(1==1){
    
         $to = "Support@aircrowns.com";
         $subject = "Contact/Complaint Query of $name2 ";
         
         $message = "<h1>Details of the Applicant <b> $name2 </b></h1>";
         $message .= "<h5>Name      : $name2</h5>";
         $message .= "<h5>Email     : $email2</h5>";
         $message .= "<h5>Mobile No : $phone2</h5>";
         $message .= "<h5>Address   : $address2</h5>";
         
        // $message .= "<h5>Login No  : $login2</h5>";
         //$message .= "<h5>Serial No : $serial2</h5>";
         
         
         $message .= "<h5>Subject   : $subject2</h5>";
         $message .= "<h5>Message   : $message2</h5>";
         
         $header = "From:Support@aircrowns.com \r\n";
        // $header .= "Cc:info@skyhaamburg.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Your Response Has Been Recorded..";
         }else {
            echo "Fill the form properly.";
         }
 
}


}




//mysqli_close($connection); // Connection Closed.
?>