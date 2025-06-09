
<?php

$count_page_daily = ("daily_visitors.txt");
$hits_daily = file($count_page_daily);

echo $hits_daily[0]." Count set to 0";

$hits_daily[0]  = 0;
$fp_daily = fopen($count_page_daily , "w");
fputs($fp_daily , "$hits_daily[0]");
fclose($fp_daily);

echo "Count set to 0";

?>

