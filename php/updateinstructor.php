<?php

//update.php

include 'database.php';

if (isset($_POST["id"])) {
    $query = "
 UPDATE instructor 
 SET name=:namee, Designation=:Designation, contact=:contact, institute_id=:instituteid, email=:email
 WHERE instructor_id=:id
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST['id'],
            ':namee'  => $_POST['namee'],
            ':Designation' => $_POST['Designation'],
            ':contact' => $_POST['contact'],
            ':instituteid'   => $_POST['instituteid'],
            ':email' => $_POST['email'],
        )
    );
}
