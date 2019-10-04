<?php

//update.php

include 'database.php';

if (isset($_POST["id"])) {
    $query = "
 UPDATE institute 
 SET namee=:namee, area=:area, contact=:contact, address=:address
 WHERE institute_id=:id
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':id' => $_POST['id'],
            ':namee'  => $_POST['namee'],
            ':area' => $_POST['area'],
            ':contact' => $_POST['contact'],
            ':address'   => $_POST['address']
        )
    );
}
