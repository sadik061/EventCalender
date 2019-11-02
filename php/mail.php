<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$from = 'From: DGNM <info@theicthub.com>';
$to = 'saif.ahmed.anik.0@gmail.com';

$subject = 'PHP Mail Sending Checking';
$msg = 'PHP Mail Works fine';

$header = "Reply-To: The Sender <info@theicthub.com>\r\n";
$header .= "Return-Path: The Sender <info@theicthub.com>\r\n";
$header .= "From: The Sender <info@theicthub.com>\r\n";
$header .= "Organization: UNFPA\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$header .= "X-Priority: 3\r\n";
$header .= "X-Mailer: PHP". phpversion() ."\r\n";

mail($to,$subject,$msg,$header);

echo 'msg was sent successfully';

?>