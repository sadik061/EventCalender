<?php
$id = $_GET["event"];

include 'database.php';
$data = array();

$query = "SELECT * FROM instructor natural join participents where event_id=" . $id;
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
echo "<h5>List of participents</h5>";
foreach ($result as $row) {
    if($row["Designation"]=="Midwives"){
echo  '<div  style="border: 1px solid #dfd4d4;background-color: pink;border-radius: 8px;padding: 0px 0px;padding-left: 10px;">
            name:'.$row["name"].' <button type="button" style="float:right;font-size: small;padding: 0px 0px;" class="btn btn-secondary" onClick="remove('.$row["instructor_id"].')" >Remove</button>
        </div>';
    }else{
        echo  '<div  style="border: 1px solid #dfd4d4;background-color: #5aa25a;color:white;border-radius: 8px;padding: 0px 0px;padding-left: 10px;" >
            name:'.$row["name"].' <button type="button" style="float:right;font-size: small;padding: 0px 0px;" class="btn btn-secondary" onClick="remove('.$row["instructor_id"].')" >Remove</button>
        </div>';
    }

}

?>