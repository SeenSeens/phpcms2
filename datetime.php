<?php
date_default_timezone_set("Asia/Ho_Chi_Minh");
$currentTime = time();
$dateTime = strftime("%d-%m-%Y", $currentTime);
echo $dateTime;
?>