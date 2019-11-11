<?php 
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Name', 'Designation', 'Institute Name','Contact', 'Email', 'Area'));
// fetch the data
$search = "";
$designation= "";

if(isset($_GET["search"])){
    $search = $_GET["search"];
}
if(isset($_GET["designation"])){
    $designation = $_GET["designation"];
}

include 'database.php';
$query = "SELECT instructor.name,Designation,namee,instructor.contact,email,area FROM instructor inner join institute on institute.institute_id=instructor.institute_id where name like '%".$search."%' and Designation like '%".$designation."%'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$parent = array();
for ($i = 0; $i < $statement->rowCount(); $i++) {
  $n = 6;
  $child = array();
        for($j=0; $j<$n; $j++){
            array_push($child,$result[$i][$j]);
        }
        array_push($parent,$child);
    }
    
    
foreach ($parent as $row) {
     fputcsv($output, $row);
    }
