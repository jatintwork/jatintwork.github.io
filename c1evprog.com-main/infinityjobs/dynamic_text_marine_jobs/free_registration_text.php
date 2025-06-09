<?php

echo "";

$return["IntialWarning"] = "When you register yourself with this application then you will get these benefits. \n1) Free Medical Insurance\n2) Free STCW Training\n3) Free CDC & COC\n4) Early Departure\n\nIf you don't pay the registration fee now, then you won't get these benefits.";
$return["SubmitForm"] = "Free Registration quota has been exceeded that's why your free registration request cannot be completed. To register yourself Pay the registration fee.";
// $return["success"] = false;


header('Content-Type: application/json');
// tell browser that its a json data
echo json_encode($return);
//converting array to JSON string





?>