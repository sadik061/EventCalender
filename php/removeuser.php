<?php

//delete.php

if(isset($_GET["id"]))
{
include 'database.php';
$query = "DELETE from user WHERE id=:id";
$statement = $connect->prepare($query);
$statement->execute(
array(
    ':id' => $_GET['id']
));
}
echo $query;
header("Location: ../settings.php");

?>