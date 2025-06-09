<?php 
// $return["error"] = false;
$return["msg"] = "";
// $return["success"] = false;
//array to return

include "config.php";

date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y h:i', time());


if(isset($_FILES["files"])){
    
      $phone = mysqli_real_escape_string($connect, $_POST['phone']);
    
   $current_timestamp = time();
    // $uniqid = $current_timestamp;
    

 
        //directory to upload file
    $target_dir = "files/"; //create folder files/ to save file
        $fileextention =$_FILES["files"]["name"] ; 
    
    $ext = pathinfo($fileextention, PATHINFO_EXTENSION);
    
    
    
 
    $filename =$current_timestamp.".".$ext; 
    
    // //name of file
    //$_FILES["file"]["size"] get the size of file
    // //you can validate here extension and size to upload file.

    $savefile = "$target_dir/$filename";
    //complete path to save file
    
 
    if(move_uploaded_file($_FILES["files"]["tmp_name"], $savefile)) {
        
        
  
    
        
               
         
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $desired_job = mysqli_real_escape_string($connect, $_POST['desired_job']);
    $sal_expec = mysqli_real_escape_string($connect, $_POST['sal_expec']);
    $prev_sal = mysqli_real_escape_string($connect, $_POST['prev_sal']);
    $job_location = mysqli_real_escape_string($connect, $_POST['job_location']);
    $resume_name = mysqli_real_escape_string($connect, $_POST['resume_name']);
        $transcation_id = mysqli_real_escape_string($connect, $_POST['receipt_name']);

    
    //  $return["name"] = $name;
    //   $return["email"] = $email; 
    //   $return["phone"] = $phone;
    //   $return["message"] = "TMKOC";
      
  
  
    
 
        $query = "INSERT INTO `payment_not_done`( `name`, `email`, `phone`, `desired_job`, `sal_expec`, `prev_sal`, `job_location`, `resume_name`,  `time`) VALUES ('$name','$email','$phone','$desired_job','$sal_expec','$prev_sal','$job_location','$filename', '$date')";
    $results = mysqli_query($connect, $query);
       $return["code"] = $results;
    
        
 
    
    
        $return["error"] = "No";
          $return["msg"] =  "File Saved Successfully !!";
        //upload successful
    }else{
        $return["error"] = true;
        $return["msg"] =  "Error during saving file.";
    }
    
  
    

    
}else{
    $return["error"] = true;
    $return["msg"] =  "No file is sublitted.";
}
$return["error"] = $total_count;
header('Content-Type: application/json');
// tell browser that its a json data
echo json_encode($return);
//converting array to JSON string
?>