<?php 
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Event', 'Funded By', 'Organized By','Venu', 'Description', 'Start','End', 'Participants'));
// fetch the data
$ename = "";
$fname= "";
$oname="";
$vname="";
$month="";
$year="";
$strt = "2001/01/01";
$end = "2099/12/31";
if(isset($_GET["ename"])){
    $ename = $_GET["ename"];
}
if(isset($_GET["fname"])){
    $fname = $_GET["fname"];
}
if(isset($_GET["oname"])){
    $oname = $_GET["oname"];
}
if(isset($_GET["vname"])){
    $vname = $_GET["vname"];
}
if(isset($_GET["month"])){
    //$strt += $_GET["month"];
}
if(isset($_GET["year"])){
    if($_GET["month"]!=""){
        //$strt += $_GET["month"];
        $strt = $_GET["year"]."/".$_GET["month"]."/01";
        $end = $_GET["year"]."/".($_GET["month"]+2)."/31";
    }else{
        $strt = $_GET["year"] . "/01/01";
        $end = $_GET["year"] . "/12/31";
    }
}
include 'database.php';
$query = "SELECT * FROM events where title like '%".$ename."%' and funded_by like '%".$fname."%' and organized_by like '%".$oname."%' and venu like '%".$vname."%' and start_event between  '".$strt."' and '".$end."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$parent = array();
for ($i = 0; $i < $statement->rowCount(); $i++) {
  $n = sizeof($result[$i]) / 2;
  $child = array();
  $queryy = "SELECT count(*) as numb FROM participents where event_id=".$result[$i]['0'];
    $statementt = $connect->prepare($queryy);
    $statementt->execute();
    $resultt = $statementt->fetchAll();
    foreach ($resultt as $roww) {
        for($j=1; $j<$n-1; $j++){
            array_push($child,$result[$i][$j]);
        }
        array_push($child,$roww["numb"]);
    }
    array_push($parent,$child);
    }
foreach ($parent as $row) {
     fputcsv($output, $row);
    }
