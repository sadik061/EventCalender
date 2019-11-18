<?php
include 'database.php';
include 'mail.php';

$subject = 'DGNM Event';
$msg = '';
if(isset($_GET["subject"])){
    if($_GET["subject"]!=""){
    $subject = $_GET["subject"];}
}
if(isset($_GET["msg"])){
    if($_GET["msg"]!=""){
    $msg = $_GET["msg"];
    }
}

$query = "SELECT * FROM events NATURAL JOIN participents NATURAL JOIN instructor WHERE event_id=".$_GET["id"];

$statement = $connect->prepare($query);
$statement->execute();
// echo $statement->rowCount();

if ($statement->rowCount() > 0) {
    $result = $statement->fetchAll();
    $n = $statement->rowCount();

    for ($i = 0; $i < $n; $i++) {
        if($msg==""){
        $msg = '';
        $msg .=  "Dear " . $result[$i]['name'] . ",";
        $msg .= "\r\n";

        $msg .= "You have been added to an event '".$result[$i]['title']."'";
        $msg .= "\r\n\n";

        $msg .= "Event Information:";
        $msg .= "\r\n";

        $msg .= "Event name: " . $result[$i]['title'];
        $msg .= "\r\n";
        $msg .= "Organized by: " . $result[$i]['organized_by'];
        $msg .= "\r\n";
        $msg .= "Venu: " . $result[$i]['venu'];
        $msg .= "\r\n";

        $msg .= "Time: " . $result[$i]['start_event'] . " to " . $result[$i]['end_event'];
        $msg .= "\r\n";
        }

        sendEmail($result[$i]['email'],$subject,$msg);
        $msg = '';

    }
   
}
header('Location: ../insertparticipents.php?event_id='.$_GET["id"]);
