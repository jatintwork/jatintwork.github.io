<?php 

$count_page = ("visit.txt");
$hits = file($count_page);

$count_page_daily = ("daily_visitors.txt");
$hits_daily = file($count_page_daily);

$count_all = $hits[0] ;

$count_daily = $hits_daily[0];


echo $count_all." (".$count_daily.")";

     
?>