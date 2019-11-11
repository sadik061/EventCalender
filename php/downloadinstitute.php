<?php 
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Institute List.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Name', 'Area', 'Address','Contact'));
// fetch the data
$search = "";
$designation= "";

if(isset($_GET["search"])){
    $search = $_GET["search"];
}


include 'database.php';
$query = "SELECT * FROM institute where namee like '%".$search."%'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$parent = array();
for ($i = 0; $i < $statement->rowCount(); $i++) {
  $n = 5;
  $child = array();
        for($j=1; $j<$n; $j++){
            array_push($child,$result[$i][$j]);
        }
        array_push($parent,$child);
    }
    
    
foreach ($parent as $row) {
     fputcsv($output, $row);
    }
