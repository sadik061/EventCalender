<?php
$id = $_GET["search"];
if($_GET["search"]!=""){
    echo "Showing result for '".$_GET["search"]."'";
}
include 'database.php';
$data = array();

    $query = "SELECT * FROM institute where namee like '%".$id."%'";

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
    $query = "SELECT * FROM institute where namee like '%".$id."%' ORDER BY institute_id DESC LIMIT " . $this_page_first_result . "," .  $results_per_page;


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
    <div class="col-md-5">
      <h4 style="padding-left: 2%;"><b>
       '.$row["namee"].'</b>
      </h4>
      <p>'.$row["area"].'</p>
    </div>
    <div class="col-md-5">
      <p >Address: <b>'.$row["address"].'</b></p>
      <p >Address: <b>'.$row["contact"].'</b></p>
    </div>
    <div class="col-md-2">
    <div class=" pull-right hidden-sm hidden-xs">
    <button class="btn btn-xs" id="edit" onClick="edit('.$row["institute_id"].',\''.$row["namee"].'\',\''.$row["area"].'\',\''.$row["contact"].'\',\''.$row["address"].'\')" ><i class="fa fa-pencil "></i></button>
    <button class="btn btn-xs" id="remove" onClick="remove('.$row["institute_id"].')" ><i class="fa fa-trash-o"></i></button>
    </div>
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