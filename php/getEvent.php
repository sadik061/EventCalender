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
    <div class="col-md-2 centered hidden-sm hidden-xs">
      <img src="img/institute.png" class="img-circle" width="65">
    </div>
    <div class="col-md-9">
      <p>
        name:'.$row["title"].'
      </p>
      <p>Area:'.$row["funded_by"].'</p>
      <p class="message">Address:'.$row["Description"].'</p>
    </div>
    <div class="col-md-1 centered hidden-sm hidden-xs">
    <button type="button" class="btn btn-secondary" id="remove" onClick="remove('.$row["event_id"].')" >Remove</button>
    <button type="button" class="btn btn-secondary" id="edit" onClick="edit('.$row["event_id"].',\''.$row["title"].'\',\''.$row["funded_by"].'\',\''.$row["Description"].'\',\''.$row["color"].'\')" >Edit</button>
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
    echo '<li><a href="institute.php?page=' . $page . '&search='.$id.'">' . $page . '</a></li>';
}      
echo '</ul>
  </div>
</div>
</div>';
?>