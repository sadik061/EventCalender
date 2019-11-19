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
    echo "Showing result for '".$_GET["search"]."'";
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
    $queryy = "SELECT * FROM instructor where institute_id=".$row["institute_id"]." and Designation='Midwifery Faculty'";
    $statementt = $connect->prepare($queryy);
    $statementt->execute();
    $queryyy = "SELECT * FROM instructor where institute_id=".$row["institute_id"]." and Designation='Midwifery Faculty (SRHR)'";
    $statementtt = $connect->prepare($queryyy);
    $statementtt->execute();
    $query4 = "SELECT * FROM instructor where institute_id=".$row["institute_id"]." and Designation='Principal/Incharge'";
    $statement4 = $connect->prepare($query4);
    $statement4->execute();
    $query5 = "SELECT * FROM instructor where institute_id=".$row["institute_id"]." and Designation='Nursing Faculty'";
    $statement5 = $connect->prepare($query5);
    $statement5->execute();
    echo '<div class="message-p pn white">
 
  <div class="row">
    
    <div class="col-md-5">
      <h6><b>'.$row["namee"].'
      </b></h6>
      <p style="margin-left: 0px;">'.$row["area"].'</p>
    </div>
    <div class="col-md-4">
      <p >Midwifery Faculty <b>(<i>'.$statementt->rowCount().'</i>)</b></p>
      <p >Midwifery Faculty (SRHR) <b>(<i>'.$statementtt->rowCount().'</i>)</b></p>
      <p >Principal/Incharge <b>(<i>'.$statement4->rowCount().'</i>)</b></p>
      <p >Nursing Faculty <b>(<i>'.$statement5->rowCount().'</i>)</b></p>
    </div>
    <div class="col-md-1">
    <button id="down'.$count.'" type="button" class="btn btn-secondary" id="remove" onclick="showdropdown('.$count.')"><span class="fa fa-angle-down"></span></button>
    <button id="up'.$count.'" style="display:none;"type="button" class="btn btn-secondary" id="remove" onclick="hidedropdown('.$count.')"><span class="fa fa-angle-up"></span></button>
    
    </div>
  </div>
  <div  style="display:none;" class="row instructorlist" id="details'.$count.'">

    <div class="col-md-12">';
    $count +=1;
    $statementt->execute();
    $resultt = $statementt->fetchAll();
    foreach ($resultt as $roww) {
        $queryy_ins = "SELECT count(*) as coun FROM participents where present=0 and instructor_id=" .$roww["instructor_id"];
        $statementt_ins = $connect->prepare($queryy_ins);
        $statementt_ins->execute();
        $resultt_ins = $statementt_ins->fetchAll();
        foreach ($resultt_ins as $roww_ins) {
          echo  '<div class="particepents_red"><div class="col-md-4">'.$roww["name"].
          '</div>
          <div class="col-md-4">(Midwifery Faculty)</div>
          <div class="col-md-2">
          <i class="fa fa-calendar" onClick="showCalender('.$roww["instructor_id"].')"></i> ('.$roww_ins["coun"].')</div>
          <div class="col-md-2"><div class="tooltip"><button style="border: 1px solid lightgray;">Assign</button><span class="tooltiptext">
          <button type="button" class="btn btn-secondary tbutton" style="margin-bottom: 2%;" onClick="assignResource('.$roww["instructor_id"].',\''.$roww["name"].'\')" >Add as a Resource Persion</button><br>
          <button type="button"  class="btn btn-secondary tbutton" onClick="assign('.$roww["instructor_id"].',\''.$roww["name"].'\')">Add as a participant</button></span></div>
          </div></div>';
        }
        }
    echo '</div><div class="col-md-12"><p style="color: #5aa25a">Midwifery Faculty (SRHR)</p>';
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
    echo '</div><div class="col-md-12"><p style="color: #5aa25a">Principal/Incharge</p>';
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
 echo '</div></div></div>';
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