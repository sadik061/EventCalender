<?php

//insert.php

include 'database.php';
    $query = "
 INSERT INTO funded_by 
 (funder_id, event_id) 
 VALUES (:funder_id, :event_id)
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':funder_id'  => $_POST['funder_id'],
            ':event_id'  => $_POST['event_id'],
        )
    );
   

?>
