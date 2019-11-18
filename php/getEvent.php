<?php
$id = $_GET["search"];
if($_GET["search"]!=""){
    echo "Showing result for '".$_GET["search"]."'";
}
include 'database.php';
$data = array();

    $query = "SELECT * FROM events where title like '%".$id."%'";

$statement = $connect->prepare($query);
$statement->execute();
$results_per_page = 10;
$number_of_results = $statement->rowCount();
$number_of_pages = ceil($number_of_results/$results_per_page);
if (!isset($_GET['page'])) {
    $page = 1;
  } else {
    $page =$_GET['page'];
  }
$this_page_first_result = ($page-1)*$results_per_page;
    $query = "SELECT * FROM events where title like '%".$id."%' ORDER BY event_id DESC LIMIT " . $this_page_first_result . "," .  $results_per_page;


$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$from = $this_page_first_result + 1;
$to = $this_page_first_result + $results_per_page;
if($to > $number_of_results){
    $to = $number_of_results;
}

foreach ($result as $row) {

    echo '<div class="message-p pn">
 
  <div class="row">
    <div class="col-md-4 hidden-sm hidden-xs">
      <h4 style="padding-left: 2%;"><b> <a href="insertparticipents.php?event_id='.$row["event_id"].'"   >'.$row["title"].'
      </a></b></h4>
      <p><i class="fa fa-calendar"></i> '.date('d-m-y', strtotime($row["start_event"])).'</p>
     
    </div>
    <div class="col-md-3">
      
      <p>Funded By: ';
      $queryy = "SELECT * FROM funded_by natural join funder where event_id=" . $row["event_id"];
$statementt = $connect->prepare($queryy);
$statementt->execute();
$resultt = $statementt->fetchAll();
foreach ($resultt as $roww) {           
            echo '<div class="chip" style="    margin-bottom: 0rem;">' . $roww["name"] . '</div>';
}
      echo '</p>
      
    </div>
    <div class="col-md-3">
    <p>Venu: <b>'.$row["venu"].'</b></p>
    <p>Organized by: <b>'.$row["organized_by"].'</b></p>
    </div>
    <div class="col-md-2">
    <div class=" pull-right hidden-sm hidden-xs">
    <a class="btn btn-xs" href="insertparticipents.php?event_id='.$row["event_id"].'" id="edit"  ><i class="fa fa-pencil "></i> Edit</a>
    <button class="btn btn-xs" id="remove" onClick="remove('.$row["event_id"].')"><i class="fa fa-trash-o"></i></button>
    </div>
    </div>
  </div>
</div></a>'; 
}
echo '<div class="row-fluid">
<div class="span6">
  <div class="dataTables_info" id="hidden-table-info_info">Showing '.$from.' to '.$to .' of '.$number_of_results.' entries</div>
</div>
<div class="span6">
  <div class="dataTables_paginate paging_bootstrap pagination">
    <ul>';
for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<li><a href="event.php?page=' . $page . '&search='.$id.'">' . $page . '</a></li>';
}      
echo '</ul>
  </div>
</div>
</div>';
?>