<?php
include 'database.php';
$query = "DELETE from funded_by WHERE funder_id=:id and event_id=:event_id";
echo $query;
$statement = $connect->prepare($query);
$statement->execute(
array(
    ':id' => $_POST['id'],
    ':event_id' => $_POST['event_id']
));

?>