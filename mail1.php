<?php
$mailTo="paunikarmansi@gmail.com";
$subject="about the ";
$message="heydhduhde";
$headers="from:paunikarmansi@gmail.com";

if(mail($mailTo,$subject,$message,$headers)){
	echo "yes";
}else{
	echo "no";
}
?>