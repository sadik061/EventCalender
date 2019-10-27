<?php
$id = $_GET["search"];
if($_GET["search"]!=""){
    echo "SHowing result for '".$_GET["search"]."'";
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
    $query = "SELECT * FROM events where title like '%".$id."%' LIMIT " . $this_page_first_result . "," .  $results_per_page;


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
  <div class="message-header">
  </div>
  <div class="row">
    <div class="col-md-4 hidden-sm hidden-xs">
      <h5 style="color: '.$row["color"].';padding-left: 2%;">'.$row["title"].'
      </h5>
     
    </div>
    <div class="col-md-7">
      
      <p>Funded By: '.$row["funded_by"].'</p>
      <p class="message">Description: '.$row["Description"].'</p>
    </div>
    <div class=" pull-right hidden-sm hidden-xs">
    <a class="btn btn-xs" href="insertparticipents.php?event_id='.$row["event_id"].'" id="edit"  ><i class="fa fa-pencil "></i></a>
    <button class="btn btn-xs" id="remove" onClick="remove('.$row["event_id"].')"><i class="fa fa-trash-o"></i></button>
    </div>
  </div>
</div>'; 
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