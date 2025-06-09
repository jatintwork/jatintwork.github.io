<?php
function sendFCM() {
  // FCM API Url
  $url = 'https://fcm.googleapis.com/fcm/send';

  // Put your Server Key here
  $apiKey = "AAAAPvaa0nY:APA91bGR3F9ZBoFL2nlavrdTzD6jQe-n-4cfqi3XM6ImWeMf_adYgl66YSweTpfZwsUW9uyIQrSKim8SM-fFpfQ0zzSkXVmHzbQaNEInA_NqEtMeOh6zSLpZeNndRwg6kgeHf1JzQ8S0";

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

    'to' => 'dLKcxOwMQfe8JtXsW0PR2x:APA91bEY4CZc8bPmvN5cpddJMfkF19ZFj4VCPCT5jU1ZOSKAjYPLWiwIBiJuPcwKXOAfbOcUYYNKDpaBgXsj27kx5D_HKie-Y4KMIO12AJFY0S_1-TEwcOc23jovLYa487b4BInfMuHm','dLKcxOwMQfe8JtXsW0PR2x:APA91bEY4CZc8bPmvN5cpddJMfkF19ZFj4VCPCT5jU1ZOSKAjYPLWiwIBiJuPcwKXOAfbOcUYYNKDpaBgXsj27kx5D_HKie-Y4KMIO12AJFY0S_1-TEwcOc23jovLYa487b4BInfMuHm', 'dCv8ROaCQZWuSP5h_lHvzL:APA91bH99LRSVpcOCixsJWAVpOUdW56k_Dq14ffy1E3wOSDRIaM0rLMqMSIPBhJ-zbegAY_64d9xxq9jhWyN3mglzAmSzHZcyuLnbtk9MbmVKS9NNBZilINp7KrybRZLYuheBclYroC2'
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