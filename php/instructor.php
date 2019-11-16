<?php
    include 'database.php';
    include 'mail.php';
    $query = "INSERT INTO instructor (name, institute_id, contact, Designation,email) VALUES (:namee, :id, :contact, :Designation, :email)";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':namee'  => $_POST['namee'],
            ':id'  => $_POST['id'],
            ':contact' => $_POST['contact'],
            ':Designation' => $_POST['Designation'],
            ':email' => $_POST['email'],
        )
    );
    $subject="DGNM data collection";
    $msg="You have been added to DGNM database";
    sendEmail($_POST['email'],$subject,$msg);
?>