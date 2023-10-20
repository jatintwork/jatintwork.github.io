<?php
$conn =  mysqli_connect("localhost", "u844323284_root", "iamDev@9312", "u844323284_skyhaamburg");


if (!$conn) {
    die("Error: Failed to connect to database!");
}

if (!empty($_FILES['file'])) {

    $file_name = $_FILES['file']['name'];
    $file_temp = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];

    $exp = explode(".", $file_name);
    $ext = end($exp);
    $file = time() . '.' . $ext;
    $location = "uploadimg/" . $file;

    if ($file_size < 5242880) {
        move_uploaded_file($file_temp, $location);

        $sql = "INSERT INTO `apply` (  `cv`) VALUES ( '$file');";
        if (mysqli_query($conn, $sql)) {

            echo "Your CV has been Uploaded.";
        }
    } else {
        echo "Upload Your Resume.";
    }
} else {
    echo "Attach Your Resume Also.";
}
