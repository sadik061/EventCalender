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
    $queryy = "SELECT * FROM instructor where institute_id=".$row["institute_id"]." and Designation='mid_Faculty'";
    $statementt = $connect->prepare($queryy);
    $statementt->execute();
    $queryyy = "SELECT * FROM instructor where institute_id=".$row["institute_id"]." and Designation='SRHR'";
    $statementtt = $connect->prepare($queryyy);
    $statementtt->execute();
    $query4 = "SELECT * FROM instructor where institute_id=".$row["institute_id"]." and Designation='Principal'";
    $statement4 = $connect->prepare($query4);
    $statement4->execute();
    $query5 = "SELECT * FROM instructor where institute_id=".$row["institute_id"]." and Designation='Nursing'";
    $statement5 = $connect->prepare($query5);
    $statement5->execute();
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
      <p ">Dct. mid Faculty : '.$statementt->rowCount().'</p>
      <p >Dct. mid Faculty SRHR : '.$statementtt->rowCount().'</p>
      <p >Principal : '.$statement4->rowCount().'</p>
      <p >Nursing Faculty : '.$statement5->rowCount().'</p>
    </div>
    <div class="col-md-1">
    <button id="down'.$count.'" type="button" class="btn btn-secondary" id="remove" onclick="showdropdown('.$count.')"><span class="fa fa-angle-down"></span></button>
    <button id="up'.$count.'" style="display:none;"type="button" class="btn btn-secondary" id="remove" onclick="hidedropdown('.$count.')"><span class="fa fa-angle-up"></span></button>
    
    </div>
  </div>
  <div  style="display:none;" class="row instructorlist" id="details'.$count.'">

    <div class="col-md-12"><p style="color: #5aa25a">Dct. mid Faculty</p>';
    $count +=1;
    $statementt->execute();
    $resultt = $statementt->fetchAll();
    foreach ($resultt as $roww) {
        $queryy_ins = "SELECT count(*) as coun FROM participents where present=0 and instructor_id=" .$roww["instructor_id"];
        $statementt_ins = $connect->prepare($queryy_ins);
        $statementt_ins->execute();
        $resultt_ins = $statementt_ins->fetchAll();
        foreach ($resultt_ins as $roww_ins) {
          echo  '<div class="particepents_red"><div class="col-md-7">'.$roww["name"].
          '</div>
          <div class="col-md-3"><div class="tooltip">Assign
          <span class="tooltiptext"><button type="button" class="btn btn-secondary tbutton" style="margin-bottom: 2%;" onClick="assignResource('.$roww["instructor_id"].',\''.$roww["name"].'\')" >Add as a Resource Persion</button><br>
          <button type="button"  class="btn btn-secondary tbutton" onClick="assign('.$roww["instructor_id"].',\''.$roww["name"].'\')">Add as a participant</button></span></div>
          </div><div class="col-md-1">
          <i class="fa fa-calendar" onClick="showCalender('.$roww["instructor_id"].')"></i></div>
          <div class="col-md-1">
          '.$roww_ins["coun"].'</div></div>';
        }
        }
    echo '</div><div class="col-md-12"><p style="color: #5aa25a">Dct. mid Faculty SRHR</p>';
    $statementtt->execute();
    $resulttt = $statementtt->fetchAll();  
        foreach ($resulttt as $rowww) {
          $queryy_ins = "SELECT count(*) as coun FROM participents where present=0 and instructor_id=" .$rowww["instructor_id"];
        $statementt_ins = $connect->prepare($queryy_ins);
        $statementt_ins->execute();
        $resultt_ins = $statementt_ins->fetchAll();
        foreach ($resultt_ins as $roww_ins) {
          
            echo  '<div class="particepents_red"><div class="col-md-7">'.$rowww["name"].
            '</div>
            <div class="col-md-3"><div class="tooltip">Assign
            <span class="tooltiptext"><button type="button" class="btn btn-secondary tbutton" style="margin-bottom: 2%;" onClick="assignResource('.$rowww["instructor_id"].',\''.$rowww["name"].'\')" >Add as a Resource Persion</button><br>
            <button type="button"  class="btn btn-secondary tbutton" onClick="assign('.$rowww["instructor_id"].',\''.$rowww["name"].'\')">Add as a participant</button></span></div>
            </div><div class="col-md-1">
            <i class="fa fa-calendar" onClick="showCalender('.$rowww["instructor_id"].')"></i></div>
            <div class="col-md-1">
            '.$roww_ins["coun"].'</div></div>';
        }
      } 
    echo '</div><div class="col-md-12"><p style="color: #5aa25a">Principal</p>';
    $statement4->execute();
    $resulttt = $statement4->fetchAll();  
        foreach ($resulttt as $rowww) {
          $queryy_ins = "SELECT count(*) as coun FROM participents where present=0 and instructor_id=" .$rowww["instructor_id"];
        $statementt_ins = $connect->prepare($queryy_ins);
        $statementt_ins->execute();
        $resultt_ins = $statementt_ins->fetchAll();
        foreach ($resultt_ins as $roww_ins) {
          
            echo  '<div class="particepents_red"><div class="col-md-7">'.$rowww["name"].
            '</div>
            <div class="col-md-3"><div class="tooltip">Assign
            <span class="tooltiptext"><button type="button" class="btn btn-secondary tbutton" style="margin-bottom: 2%;" onClick="assignResource('.$rowww["instructor_id"].',\''.$rowww["name"].'\')" >Add as a Resource Persion</button><br>
            <button type="button"  class="btn btn-secondary tbutton" onClick="assign('.$rowww["instructor_id"].',\''.$rowww["name"].'\')">Add as a participant</button></span></div>
            </div><div class="col-md-1">
            <i class="fa fa-calendar" onClick="showCalender('.$rowww["instructor_id"].')"></i></div>
            <div class="col-md-1">
            '.$roww_ins["coun"].'</div></div>';
        }
      }
      echo '</div><div class="col-md-12"><p style="color: #5aa25a">Nursing Faculty</p>';
      $statement5->execute();
      $resulttt = $statement5->fetchAll();  
          foreach ($resulttt as $rowww) {
            $queryy_ins = "SELECT count(*) as coun FROM participents where present=0 and instructor_id=" .$rowww["instructor_id"];
          $statementt_ins = $connect->prepare($queryy_ins);
          $statementt_ins->execute();
          $resultt_ins = $statementt_ins->fetchAll();
          foreach ($resultt_ins as $roww_ins) {
            
              echo  '<div class="particepents_red"><div class="col-md-7">'.$rowww["name"].
              '</div>
              <div class="col-md-3"><div class="tooltip">Assign
              <span class="tooltiptext"><button type="button" class="btn btn-secondary tbutton" style="margin-bottom: 2%;" onClick="assignResource('.$rowww["instructor_id"].',\''.$rowww["name"].'\')" >Add as a Resource Persion</button><br>
              <button type="button"  class="btn btn-secondary tbutton" onClick="assign('.$rowww["instructor_id"].',\''.$rowww["name"].'\')">Add as a participant</button></span></div>
              </div><div class="col-md-1">
              <i class="fa fa-calendar" onClick="showCalender('.$rowww["instructor_id"].')"></i></div>
              <div class="col-md-1">
              '.$roww_ins["coun"].'</div></div>';
          }
        } 
 echo '</div></div>';
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