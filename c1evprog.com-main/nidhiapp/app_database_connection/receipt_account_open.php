<?php 
// $return["error"] = false;
// $return["msg"] = "";
// $return["success"] = false;
//array to return

include "config.php";
echo "test";
date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y h:i', time());


if(isset($_FILES["files"]))
{
    
       $phone = mysqli_real_escape_string($connect, $_POST['phone']);
       
     if(move_uploaded_file($_FILES["files"]["tmp_name"], $savefile)) {
         
            $fileextention =$_FILES["files"]["name"] ; 
    
    $ext = pathinfo($fileextention, PATHINFO_EXTENSION);
         
         $pdf_name = substr($phone, 5);
         
          $filename =$pdf_name.".".$ext; 
        
        
        $query = "INSERT INTO `receipt_account_open`(`rightjoin`, `receipt_account_open`) VALUES ('$pdf_name','$filename')";
    $results = mysqli_query($connect, $query);
        
        
        
        
    }
}

 $return["phone"] = "$phone";

?>