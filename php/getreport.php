<?php
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
foreach ($result as $row) {
    $queryy = "SELECT count(*) as numb FROM participents where event_id=".$row["event_id"];
    $statementt = $connect->prepare($queryy);
    $statementt->execute();
    $resultt = $statementt->fetchAll();
    foreach ($resultt as $roww) {
    echo '<div class="message-p pn">
  <div class="message-header">
  </div>
  <div class="row">
    <div class="col-md-5">
      <p>
        Name: '.$row["title"].'
      </p>
      <p>Funded By: '.$row["funded_by"].'</p>
      <p>Participents: '.$roww["numb"].'</p>
    </div>
    <div class="col-md-4">
    <p>Venu: '.$row["venu"].'</p>
    <p>Organized By: '.$row["organized_by"].'</p>
    </div>
    <div class="col-md-3">
    <p>Start: '.$row["start_event"].'</p>
    <p>End: '.$row["end_event"].'</p>
    </div>
  </div>';
    echo '</div>
  </div>
</div>';
}
}

?>