<?php
$ename = "";
$fname = "";
$oname = "";
$vname = "";
$month = "";
$year = "";
$strt = "2001/01/01";
$end = "2099/12/31";
if (isset($_GET["ename"])) {
  $ename = $_GET["ename"];
}
if (isset($_GET["oname"])) {
  $oname = $_GET["oname"];
}
if (isset($_GET["vname"])) {
  $vname = $_GET["vname"];
}
if (isset($_GET["month"])) {
  //$strt += $_GET["month"];
}
if (isset($_GET["year"])) {
  if ($_GET["month"] != "") {
    //$strt += $_GET["month"];
    $strt = $_GET["year"] . "/" . $_GET["month"] . "/01";
    $end = $_GET["year"] . "/" . ($_GET["month"] + 2) . "/31";
  } else {
    $strt = $_GET["year"] . "/01/01";
    $end = $_GET["year"] . "/12/31";
  }
}
if (($_GET["fname"] == "select")) {
  $query = "SELECT * FROM events where title like '%" . $ename . "%' and organized_by like '%" . $oname . "%' and venu like '%" . $vname . "%' and start_event between  '" . $strt . "' and '" . $end . "'";
  }else{
    if (($_GET["fname"] != "undefined")) {
    $query = "SELECT * FROM events inner join funded_by on events.event_id=funded_by.event_id where title like '%" . $ename . "%' and funded_by.funder_id=" .$_GET["fname"]. " and organized_by like '%" . $oname . "%' and venu like '%" . $vname . "%' and start_event between  '" . $strt . "' and '" . $end . "'";
    }else{
      $query = "SELECT * FROM events where title like '%" . $ename . "%' and organized_by like '%" . $oname . "%' and venu like '%" . $vname . "%' and start_event between  '" . $strt . "' and '" . $end . "'";
    }
  }

include 'database.php';
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

<div class="row">
  <div class="col-md-5">
    <h4 style="padding-left:2%;"><b>'.$row["title"].'</b>
    </h4>
    <p><i class="fa fa-calendar"></i> '.date('d-m-y', strtotime($row["start_event"])).'</p>
    
  </div>
  <div class="col-md-4">
  <p>Funded By: ';
      $queryyy = "SELECT * FROM funded_by natural join funder where event_id=" . $row["event_id"];
$statementtt = $connect->prepare($queryyy);
$statementtt->execute();
$resulttt = $statementtt->fetchAll();
foreach ($resulttt as $rowww) {           
            echo '<div class="chip" style="    margin-bottom: 0rem;">' . $rowww["name"] . '</div>';
}
      echo '</p>
      </div>
  <div class="col-md-3">
  <p>Venu: <b>'.$row["venu"].'</b></p>
    <p>Organized by: <b>'.$row["organized_by"].'</b></p>
    <p>Participents: <b>'.$roww["numb"].'</b></p>
  </div>
 
</div>';
  echo '</div>
</div>
</div>';
}
}
?>