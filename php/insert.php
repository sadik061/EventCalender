<?php

//insert.php

include 'database.php';

if (isset($_POST["title"])) {
    $query = "
 INSERT INTO events 
 (title, funded_by, organized_by, venu, Description, start_event, end_event, color) 
 VALUES (:title, :funded_by, :organized_by, :venu, :Description, :start_event, :end_event,:color)
 ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':title'  => $_POST['title'],
            ':funded_by'  => $_POST['fund'],
            ':organized_by' => $_POST['organize'],
            ':venu' => $_POST['venu'],
            ':Description' => $_POST['Description'],
            ':start_event' => $_POST['start'],
            ':end_event' => $_POST['end'],
            ':color' => $_POST['color'],
        )
    );
    echo($connect->lastInsertId());
}

?>
