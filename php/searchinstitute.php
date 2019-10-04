<?php
$id = $_GET["search"];

include 'database.php';
$data = array();
$query = "SELECT * FROM institute where namee like '%".$id."%' LIMIT 0,5";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach ($result as $row) {
    echo '<a class="sugg" onCLick="$(\'#institute\').val(\''.$row["namee"].'\');$(\'#suggetions\').html(\'\');$(\'#instituteid\').val('.$row["institute_id"].');$(\'#einstitute\').val(\''.$row["namee"].'\');$(\'#esuggetions\').html(\'\');$(\'#einstituteid\').val('.$row["institute_id"].')">'.$row["namee"].'</a>';
}

?>