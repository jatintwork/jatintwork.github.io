<?php 

date_default_timezone_set('Asia/Kolkata');
$date = date('h:i a', time());


$count_page = ("visit.txt");
$hits = file($count_page);
$hits[0] ++;

$fp = fopen($count_page , "w");
fputs($fp , "$hits[0]");
fclose($fp);
// echo $hits[0];

//daily visitors only

$count_page_daily = ("daily_visitors.txt");
$hits_daily = file($count_page_daily);
$hits_daily[0] ++;

$fp_daily = fopen($count_page_daily , "w");
fputs($fp_daily , "$hits_daily[0]");
fclose($fp_daily);


// echo $hits[0]." ".$fp_daily;
     
?>