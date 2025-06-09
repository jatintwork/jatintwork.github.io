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
    'title' => "sadsad",
    'body' => "sada",
     "image" => "https://infinityjobs.subseas7ind.com/files/567890.jpeg",
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
    // 'to' => '/topics/all'
    //'registration_ids' = ID ARRAY

    'to' => 'eRxu1s73SCiz2pq5-46xNa:APA91bFwSf-sFwuWrSIT_aFz_ncootBfhONzgQgjWRzVrhn-wfbzd8w-sJkThRg_Iuc09JAXuE638lPtJjhc21y5Sxx-I-GRJaFaemaxtFWpQq1XghgoR-EVNlN__Pw6fFYl-JeuXd9Z'
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



sendFCM();
 




?>