<?php
include 'database.php';
$id = $_GET["id"];
$data = array();
$query = "SELECT * FROM funded_by natural join funder where event_id=".$id;
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$array1= array();
$resultt = "";
foreach ($result as $row) {
    $resultt = $resultt. ",".$row["name"] . "," . $row["funder_id"];
}
echo $resultt;
?>