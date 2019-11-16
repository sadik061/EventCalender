<?php

//insert.php

include 'database.php';


    $query = "
 INSERT INTO participents 
 (instructor_id, event_id, present) 
 VALUES (:instructor_id, :event_id, :present)
 ";
    $statement = $connect->prepare($query);
    $result = $statement->execute(
        array(
            ':instructor_id'  => $_POST['instructor_id'],
            ':event_id'  => $_POST['event_id'],
            ':present' => $_POST['present'],
        )
    );
    if ($result) { //test if query generated results
        echo "Successfully added";
    }
    
    else {
        if($_POST['present']=='0'){
            echo "Please remove from resource person list first"; 
        }else{
            echo "Please remove from participant list first"; 
        }
         
    }



?>
