<?php

//insert.php

include 'database.php';
    $query = "
 INSERT INTO funder 
 (name) 
 VALUES (:name)
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':name'  => $_POST['name'],
        )
    );
   

?>
