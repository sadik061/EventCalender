<?php

//delete.php

if(isset($_POST["id"]))
{
include 'database.php';
$query = "DELETE from resource_person WHERE id=:id";
$statement = $connect->prepare($query);
$statement->execute(
array(
    ':id' => $_POST['id']
));
}
echo $query;

?>