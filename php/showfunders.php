<?php
include 'database.php';
$data = array();

$query = "SELECT * FROM funder";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
echo '<select class="form-control" id="fund" style="width:90%;display:inherit;" oninput="addFunder()"><option>Select new Funder</option>';                                      
foreach ($result as $row) {
    echo '<option value="'.$row["funder_id"].'">'.$row["name"].'</option>';
}
echo '</select><a class="btn btn-xs" style="margin-top: -2px;    border-color: #d2d2d2;" onclick="showaddfund()" id="edit"><i class="fa fa-plus "></i></a>';

?>