<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


function sendEmail($email,$subject,$msg)
{
    $header = "Reply-To: The Sender <info@snmp-dgnm.org>\r\n";
    $header .= "Return-Path: The Sender <info@snmp-dgnm.org>\r\n";
    $header .= "From: DGNM <info@snmp-dgnm.org>\r\n";
    $header .= "Organization: UNFPA\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/plain; charset=iso-8859-1\r\n";
    $header .= "X-Priority: 3\r\n";
    $header .= "X-Mailer: PHP" . phpversion() . "\r\n";

    mail($email, $subject, $msg, $header);
}



?>