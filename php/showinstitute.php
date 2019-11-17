<?php
include 'database.php';
$data = array();

$query = "SELECT * FROM institute";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
echo '<select class="form-control" id="sinstitute" style="width:100%;display:inherit;"oninput="myFunction()"><option>Select an Institute</option>';                                      
foreach ($result as $row) {
    echo '<option value="'.$row["namee"].'">'.$row["namee"].'</option>';
}
echo '</select>';

?>