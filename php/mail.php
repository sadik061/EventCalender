<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$from = 'info@theicthub.com';
$to = 'saif.ahmed.anik.0@gmail.com';

$subject = 'PHP Mail Sending Checking';
$msg = 'PHP Mail Works fine';
$header =  'From: '.$from;

mail($to,$subject,$msg,$header);

echo 'msg was sent successfully';

?>