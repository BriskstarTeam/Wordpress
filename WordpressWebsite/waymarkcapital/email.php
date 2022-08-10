<?php

$subject = 'New User Registration';
$message = 'Hi';
$email = 'ajay@1stop.io';
$headers[] = 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers[] = "X-Mailer: PHP \r\n";
$headers[] = 'From: Waymark Capital <ajay@1stop.io>' . "\r\n";

$email = wp_mail($email, $subject, $message, $headers);
if($email){
    echo "Success";
}else{
    echo "Error";
}

?>