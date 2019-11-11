<?php

//insert.php

include 'database.php';

if (isset($_POST["rname"])) {
    $query = "INSERT INTO resource_person (namee, organization, event_id) VALUES (:rname, :rorganization, :event_id)";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(
            ':rname'  => $_POST['rname'],
            ':rorganization'  => $_POST['rorganization'],
            ':event_id'  => $_POST['event_id'],
        )
    );
    echo($query);
}
?>
