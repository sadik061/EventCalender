<?php
include 'database.php';


$query = "INSERT INTO test (name) VALUES ('abc')";

$statement = $connect->prepare($query);
$statement->execute();
// include 'database.php';

// $query = "SELECT * FROM events WHERE events.start_event LIKE ";
// $query .= "CONCAT(date(CURRENT_DATE+1),'%')";
// $statement = $connect->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();


// // echo json_encode($result);

// echo $result[0]['event_id'].'<br>';
// echo $result[0]['title'].'<br>';
// echo $result[0]['funded_by'].'<br>';
// echo $result[0]['Description'].'<br>';
// echo $result[0]['start_event'].'<br>';
// echo $result[0]['end_event'].'<br>';
// echo $result[0]['color'].'<br>';


// $query = "SELECT * FROM events NATURAL JOIN participents NATURAL JOIN instructor";
// $statement = $connect->prepare($query);
// $statement->execute();
// $result = $statement->fetchAll();



// Pear Mail Library
require_once "Mail-1.4.1/Mail.php";

$from = '<sanik141149@bscse.uiu.ac.bd>';
$to = '<saif.ahmed.anik.0@gmail.com>';
$subject = 'Hi!';
$body = "Hi,\n\nHow are you?";

// $headers = array(
//     'From' => $from,
//     'To' => $to,
//     'Subject' => $subject
// );

$smtp = @Mail::factory('smtp', array(
    'host' => 'ssl://smtp.gmail.com',
    'port' => '465',
    'auth' => true,
    'username' => 'sanik141149@bscse.uiu.ac.bd',
    'password' => '102030405060708090100'
));

$headers = array(
    "From" => $from,

    "To" => $to,
    "Subject" => $subject,
    "MIME-Version" => "1.0",
    "Content-type" => "text/html; charset=iso-8859-1"
);

$mail    = @$smtp->send($to, $headers, $body);


// $mail = $smtp->send($to, $headers, $body);

if (PEAR::isError($mail)) {
    echo ('<p>' . $mail->getMessage() . '</p>');
} else {
    echo ('<p>Message successfully sent!</p>');
}


// allow lesssecureapps
// https://myaccount.google.com/lesssecureapps

