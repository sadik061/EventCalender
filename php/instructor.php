<?php
    include 'database.php';
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
?>