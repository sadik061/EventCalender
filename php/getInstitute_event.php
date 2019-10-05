<?php
$id = "";
$area= "";
$type="";
if(isset($_GET["area"])){
    $area = $_GET["area"];
}
if(isset($_GET["type"])){
    $type = $_GET["type"];
}
if(isset($_GET["search"])){
    $id = $_GET["search"];
    echo "SHowing result for '".$_GET["search"]."'";
}
include 'database.php';
$data = array();

    $query = "SELECT * FROM institute where namee like '%".$id."%' and area like '%".$area."%'";
   
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
$query = "SELECT * FROM institute where namee like '%".$id."%' and area like '%".$area."%' LIMIT " . $this_page_first_result . "," .  $results_per_page;
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$from = $this_page_first_result + 1;
$to = $this_page_first_result + $results_per_page;
if($to > $number_of_results){
    $to = $number_of_results;
}
$count =0;
foreach ($result as $row) {
    $queryy = "SELECT * FROM instructor where institute_id=".$row["institute_id"]." and Designation='Midwives'";
    $statementt = $connect->prepare($queryy);
    $statementt->execute();
    $queryyy = "SELECT * FROM instructor where institute_id=".$row["institute_id"]." and Designation='Nurse'";
    $statementtt = $connect->prepare($queryyy);
    $statementtt->execute();
    echo '<div class="message-p pn">
  <div class="message-header">
  </div>
  <div class="row">
    <div class="col-md-2 centered hidden-sm hidden-xs">
      <img src="img/institute.png" class="img-circle" width="65">
    </div>
    <div class="col-md-5">
      <p>
        name:'.$row["namee"].'
      </p>
      <p>Area:'.$row["area"].'</p>
      <p class="message">Address:'.$row["address"].'</p>
    </div>
    <div class="col-md-4">
      <p style="color: #ec627a;">Midwives:'.$statementt->rowCount().'</p>
      <p style="color: #5aa25a">Nurse:'.$statementtt->rowCount().'</p>
    </div>
    <div class="col-md-1">
    <button id="down'.$count.'" type="button" class="btn btn-secondary" id="remove" onclick="showdropdown('.$count.')"><span class="fa fa-angle-down"></span></button>
    <button id="up'.$count.'" style="display:none;"type="button" class="btn btn-secondary" id="remove" onclick="hidedropdown('.$count.')"><span class="fa fa-angle-up"></span></button>
    
    </div>
  </div>
  <div  style="display:none;" class="row" id="details'.$count.'">
  <div class="col-md-2 centered hidden-sm hidden-xs">
    </div>
    <div class="col-md-5"><p style="color: #ec627a;">Midwives<p>';
    $count +=1;
    $statementt->execute();
    $resultt = $statementt->fetchAll();
    foreach ($resultt as $roww) {
        echo  '<div  style="border: 1px solid #dfd4d4;background-color: pink;border-radius: 8px;padding: 0px 0px;padding-left: 10px;">
            name:'.$roww["name"].'
            <button type="button" style="float:right;font-size: small;padding: 0px 0px;" class="btn btn-secondary" onClick="showCalender('.$roww["instructor_id"].')" >Calender</button> 
            <button type="button" style="float:right;font-size: small;padding: 0px 0px;" class="btn btn-secondary" onClick="assign('.$roww["instructor_id"].')" >Assign</button>
        </div>';
        
        }
    echo '</div><div class="col-md-5"><p style="color: #5aa25a">Nurse</p>';
    $statementtt->execute();
    $resulttt = $statementtt->fetchAll();  
        foreach ($resulttt as $rowww) {
            echo  '<div  style="border: 1px solid #dfd4d4;background-color: #5aa25a;color:white;border-radius: 8px;padding: 0px 0px;padding-left: 10px;" >
            name:'.$rowww["name"].' 
            <button type="button" style="float:right;font-size: small;padding: 0px 0px;" class="btn btn-secondary" onClick="showCalender('.$rowww["instructor_id"].')" >Calender</button>
            <button type="button" style="float:right;font-size: small;padding: 0px 0px;" class="btn btn-secondary" onClick="assign('.$rowww["instructor_id"].')" >Assign</button>
        </div>';
        }
      
    echo '</div>
    
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