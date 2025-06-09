<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h1 style="text-align: center">Send Notification</h1>

<div>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="fname">Enter title</label>
    <input type="text" id="title" name="title" placeholder="Title.." required />

    <label for="lname">Enter Description</label>
    <input type="text" id="desc" name="desc" placeholder="Description.." required />
    
      <label for="img">Select image:</label>
  <input type="file" id="image" name="image" accept="image/png,  image/jpeg, image/jpg" required />


    <!--<label for="country">Country</label>-->
    <!--<select id="country" name="country">-->
    <!--  <option value="australia">Australia</option>-->
    <!--  <option value="canada">Canada</option>-->
    <!--  <option value="usa">USA</option>-->
    <!--</select>-->
  
    <input type="submit" value="Send Notification">
  </form>
</div>


<?php
function sendFCM() {
  // FCM API Url
  $url = 'https://fcm.googleapis.com/fcm/send';

  // Put your Server Key here
  $apiKey = "AAAAnatX8JE:APA91bG3U6CUOwGpjQovGLTQLqGE3SikJ5RU60K59oy4Qo-m0TNxXIILCyIGtsrxx5Dlt7KGf_QCef8iZb8o_ip-5PZCp3vDJKKmz9n5F21kHs9yRb0He-w3nSBS8u8PqOe9uJGrce0e";

  // Compile headers in one variable
  $headers = array (
    'Authorization:key=' . $apiKey,
    'Content-Type:application/json'
  );

  // Add notification content to a variable for easy reference
  $notifData = [
    'title' => $_POST['title'],
    'body' => $_POST['desc'],
     "image" => "https://infinityjobs.subseas7ind.com/notification_image/job-opps_201904217699.jpg",
    'click_action' => "activities.NotifHandlerActivity" //Action/Activity - Optional
  ];

  $dataPayload = ['to'=> 'My Name', 
  'points'=>80, 
  'other_data' => 'This is extra payload'
  ];

  // Create the api body
  $apiBody = [
    'notification' => $notifData,
    'data' => $dataPayload, //Optional
    'time_to_live' => 600, // optional - In Seconds
    'to' => '/topics/all'
    //'registration_ids' = ID ARRAY

    // 'to' => 'dDmNaX6hSam101LyJb7eg9:APA91bGyV_FbjOa5sEiCeQeac5BOywT1eJg9O4juPvdl8l23IrUkyi5Vw7F_MUct1wPoAdEQzKiSm1GLHFoKMXP6MpYuLYnDh0q2Yi2u6K_mbvkhl6fR4fVA4re5Ni7CTZch3eqBUmVU'
    
  ];

  // Initialize curl with the prepared headers and body
  $ch = curl_init();
  curl_setopt ($ch, CURLOPT_URL, $url);
  curl_setopt ($ch, CURLOPT_POST, true);
  curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt ($ch, CURLOPT_POSTFIELDS, json_encode($apiBody));

  // Execute call and save result
  $result = curl_exec($ch);
  print($result);
  // Close curl after call
  curl_close($ch);

  return $result;
}

$title ="";
$desc = "";
$image="";
$filename = $_FILES["img"]["name"];
$tempname = $_FILES["img"]["tmp_name"];
$folder = "upload-images/".$filename;


if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"notification_image/".$file_name);
         
         $file_upload_name = "https://infinityjobs.subseas7ind.com/notification_image/".$file_name;
         echo $file_upload_name."<br>";
          sendFCM();
         echo "<br>"."Notification Has Been Sent !";
      }else{
         print_r($errors);
      }
   }
 




?>


</body>
</html>


