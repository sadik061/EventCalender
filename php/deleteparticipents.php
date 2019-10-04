<?php

if(isset($_POST["id"]))
{
include 'database.php';
$query = "DELETE from participents WHERE instructor_id=".$_POST['id']." and event_id=".$_POST['event'];
echo $query;
$statement = $connect->prepare($query);
$statement->execute();
}

?>