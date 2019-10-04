<?php

//insert.php

include 'database.php';


    $query = "
 INSERT INTO participents 
 (instructor_id, event_id, present) 
 VALUES (:instructor_id, :event_id, :present)
 ";
 echo $query;
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':instructor_id'  => $_POST['instructor_id'],
            ':event_id'  => $_POST['event_id'],
            ':present' => $_POST['present'],
            
        )
    );



?>
