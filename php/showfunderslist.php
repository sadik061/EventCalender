<?php
include 'database.php';
$data = array();
$query = "SELECT * FROM funder";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
echo '<label for="recipient-name" class="col-form-label">All funders added in the database:</label><br>';
foreach ($result as $row) {
    echo '<div class="chip" >' .$row["name"] . '<i class="fa fa-times" onclick="removefunderfromdatabase('. $row["funder_id"] .')"></i></div>';
}
?>