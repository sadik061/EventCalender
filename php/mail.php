<?php
include 'database.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$from = 'From: DGNM <info@snmp-dgnm.org>';
$to = 'saif.ahmed.anik.0@gmail.com';

$subject = 'DGNM Event Remainder';
$msg = '';

$header = "Reply-To: The Sender <info@snmp-dgnm.org>\r\n";
$header .= "Return-Path: The Sender <info@snmp-dgnm.org>\r\n";
$header .= "From: DGNM <info@snmp-dgnm.org>\r\n";
$header .= "Organization: UNFPA\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/plain; charset=iso-8859-1\r\n";
$header .= "X-Priority: 3\r\n";
$header .= "X-Mailer: PHP" . phpversion() . "\r\n";

// mail($to,$subject,$msg,$header);

$query = "SELECT * FROM events NATURAL JOIN participents NATURAL JOIN instructor WHERE events.start_event LIKE ";
$query .= "CONCAT(date(CURRENT_DATE+1),'%')";

$statement = $connect->prepare($query);
$statement->execute();
// echo $statement->rowCount();

if ($statement->rowCount() > 0) {
    $result = $statement->fetchAll();
    $n = $statement->rowCount();

    for ($i = 0; $i < $n; $i++) {
        $msg .=  "Dear " . $result[$i]['name'] . ",";
        $msg .= "\r\n";

        $msg .= "You have a event tomorrow.";
        $msg .= "\r\n";

        $msg .= "Event Information:";
        $msg .= "\r\n";

        $msg .= "Event name: " . $result[$i]['title'];
        $msg .= "\r\n";

        $msg .= "Time: " . $result[$i]['start_event'] . " to " . $result[$i]['end_event'];
        $msg .= "\r\n";

        mail($result[$i]['email'], $subject, $msg, $header);
    }
}


?>