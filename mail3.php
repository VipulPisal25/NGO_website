<?php

$name=$_POST['name'];
$email=$_POST['email'];
$msg=$_POST['message'];

$formcontent="from: $name \n message: $message";
$mailTo="paunikarmansi@gmail.com";
$subject="about the ";

$headers="from:paunikarmansi@gmail.com";
mail($mailTo,$subject,$formcontent,$headers) or die("error");
echo "thankyou";
?>