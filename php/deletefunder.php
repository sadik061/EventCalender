<?php

//delete.php

if(isset($_POST["id"]))
{
include 'database.php';
$query = "DELETE from funder WHERE funder_id=:id";
$statement = $connect->prepare($query);
$statement->execute(
array(
    ':id' => $_POST['id']
));
}

?>