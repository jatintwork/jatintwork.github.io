<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);
    
    $resume_name =  mysqli_real_escape_string($con, $_POST['resumepostfile']);
    
     $receipt_name =  mysqli_real_escape_string($con, $_POST['receipt']);

    $query = "DELETE FROM presanction WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
         
      $resume_path = "../../nidhiapp/app_database_connection/files/".$resume_name;
       $receipt_path = "../../nidhiapp/app_database_connection/files/".$receipt_name;
      
      echo $resume_path;
        
           $statuss=unlink($receipt_path);    
        $status=unlink($resume_path);    
        
               
        if($status){  
        echo "File deleted successfully";    
        $_SESSION['message'] = "Applicant Deleted Successfully";
        header("Location: index.php");
        }
        
        
        $_SESSION['message'] = "Applicant Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Applicant Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    $query = "INSERT INTO message (name,email,phone,address,message) VALUES ('$name','$email','$phone','$address','$message')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Applicant Created Successfully";
        header("Location: student-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Applicant Not Created";
        header("Location: student-create.php");
        exit(0);
    }
}

?>