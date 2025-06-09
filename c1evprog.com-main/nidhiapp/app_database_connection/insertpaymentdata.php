<?php

include "config.php";

date_default_timezone_set('Asia/Kolkata');
$date = date('d/m/Y h:i', time());


if (isset($_FILES["files"])) {

    $phone = mysqli_real_escape_string($connect, $_POST['phone']);

    $rightjoin = time();
    // $uniqid = $current_timestamp;

    // substr returns the new string.
    $pdf_name = time();

    //directory to upload file
    $target_dir = "files/"; //create folder files/ to save file

    //taking the  extension of aadhar card
    $fileextention = $_FILES["files"]["name"];
    $ext = pathinfo($fileextention, PATHINFO_EXTENSION);
    $filename = $pdf_name . "Aadhar." . $ext;



    //taking the  extension of pan card
    $fileextention = $_FILES["file2_pan"]["name"];
    $ext_pan = pathinfo($fileextention, PATHINFO_EXTENSION);
    $filename_pan = $pdf_name . "Pan." . $ext_pan;

    move_uploaded_file($_FILES["file2_pan"]["tmp_name"], $target_dir . "/" . $filename_pan);





    //taking the  extension of photo card
    $fileextention = $_FILES["file1_photo"]["name"];
    $ext_photo = pathinfo($fileextention, PATHINFO_EXTENSION);
    $filename_photo = $pdf_name . "Photo." . $ext_photo;

    move_uploaded_file($_FILES["file1_photo"]["tmp_name"], $target_dir . "/" . $filename_photo);


    //taking the  extension of receipt
    $fileextention = $_FILES["file"]["name"];
    $ext_receipt = pathinfo($fileextention, PATHINFO_EXTENSION);

    $uniqid_for_receipt = uniqid();
    $pdfname_receipt = $uniqid_for_receipt . "." . $ext_receipt;
    $savereceipt = $target_dir . "/" . $uniqid_for_receipt . "." . $ext_receipt;





    $savefile = "$target_dir/$filename";


    // complete path to save receipt
    move_uploaded_file($_FILES["file"]["tmp_name"], $savereceipt);




    if (move_uploaded_file($_FILES["files"]["tmp_name"], $savefile)) {


        $name = mysqli_real_escape_string($connect, $_POST['name']);
        $email = mysqli_real_escape_string($connect, $_POST['email']);
        $phone = mysqli_real_escape_string($connect, $_POST['phone']);
        $aadhar_number = mysqli_real_escape_string($connect, $_POST['aadhar_number']);
        $nature_of_business = mysqli_real_escape_string($connect, $_POST['nature_of_business']);
        $nature_of_employee = mysqli_real_escape_string($connect, $_POST['nature_of_employee']);
        $monthly_income = mysqli_real_escape_string($connect, $_POST['monthly_income']);
        $pan_number = mysqli_real_escape_string($connect, $_POST['pan_number']);
        $loan_amount = mysqli_real_escape_string($connect, $_POST['loan_amount']);
        $address = mysqli_real_escape_string($connect, $_POST['address']);
        $loan_type = mysqli_real_escape_string($connect, $_POST['loan_type']);



        $query = "INSERT INTO `loan_account`( `name`, `email`, `phone`, `pan_number`, `aadhar_number`, `loan_amount`, `nature_of_business`, `nature_of_employmnt`, `monthly_income`, `resume_name`, `transcation_id`, `rightjoin`, `time`, `address`, `receipt`, `loan_type`,`applicant_photo`,`pancard`) VALUES ('$name','$email','$phone','$pan_number','$aadhar_number','$loan_amount','$nature_of_business','$nature_of_employee','$monthly_income' , '$filename','None','$pdf_name','$date', '$address', '$pdfname_receipt', '$loan_type','$filename_photo','$filename_pan')";
        $results = mysqli_query($connect, $query);
        $return["code"] = $results;




        $return["error"] = "No";
        $return["msg"] = "File Saved Successfully";
        //upload successful
    } else {
        $return["error"] = true;
        $return["msg"] = "Error during saving file.";
    }
} else {
    $return["error"] = true;
    $return["msg"] = "No file is sublitted.";
}
$return["error"] = $total_count;
header('Content-Type: application/json');
// tell browser that its a json data
echo json_encode($return);
//converting array to JSON string
