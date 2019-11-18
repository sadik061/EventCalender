<?php
include 'database.php';
include 'mail.php';

$subject = 'DGNM Event Remainder';

$query = "SELECT * FROM events NATURAL JOIN participents NATURAL JOIN instructor WHERE events.start_event LIKE ";
$query .= "CONCAT(date(CURRENT_DATE+2),'%')";


$statement = $connect->prepare($query);
$statement->execute();
// echo $statement->rowCount();

if ($statement->rowCount() > 0) {
    $result = $statement->fetchAll();
    $n = $statement->rowCount();
    
    for ($i = 0; $i < $n; $i++) {
        $msg = '';

        $msg .=  "Dear " . $result[$i]['name'] . ",";
        $msg .= "\r\n";

        $msg .= "You have an event on ".$result[$i]['start_event'];
        $msg .= "\r\n";

        $msg .= "Event Information:";
        $msg .= "\r\n";

        $msg .= "Event name: " . $result[$i]['title'];
        $msg .= "\r\n";

        $msg .= "Time: " . $result[$i]['start_event'] . " to " . $result[$i]['end_event'];
        $msg .= "\r\n";

        sendEmail($email,$subject,$msg);

    }
}

?>
