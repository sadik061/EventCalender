<?php
include 'database.php';
$data = array();

$query = "SELECT * FROM funder";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
echo '<select class="form-control" id="fname" style="width:100%;display:inherit;"oninput="myFunction()"><option value="select">Select new Funder</option>';                                      
foreach ($result as $row) {
    echo '<option value="'.$row["funder_id"].'">'.$row["name"].'</option>';
}
echo '</select>';

?>