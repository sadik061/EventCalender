<?php
    include 'database.php';
    $query = "INSERT INTO instructor (name, institute_id, contact, Designation) VALUES (:namee, :id, :contact, :Designation)";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':namee'  => $_POST['namee'],
            ':id'  => $_POST['id'],
            ':contact' => $_POST['contact'],
            ':Designation' => $_POST['Designation'],
        )
    );
?>